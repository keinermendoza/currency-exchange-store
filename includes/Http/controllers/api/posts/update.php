<?php
namespace Http;
use Core\App;
use Core\Database;
use Http\Validator\ValidationException;
use Http\Validator\PostValidator;

header('Content-Type: application/json');

$id = $params["id"];
$db = App::resolve(Database::class);

$currency = $db->query("SELECT * FROM posts WHERE id = :id", [
    "id" => $id
])->fetch();

if(!$currency) {
    http_response_code(404);
    echo json_encode(["errors" => "Publicación no encontrada"]);
    exit();
}

try {
    $validator = new PostValidator($_POST);
} catch(ValidationException $e) {
    http_response_code(404);
    echo json_encode([
        "errors" => $e->getErrors()
    ]);
    exit();
}

$filename = null;
if (isset($_FILES["image"])) {
    $filename = handleUploadImage("image", $validator);
    if (!$filename) {
        http_response_code(400);
        echo json_encode(["errors" => $validator->getErrors()]);
        exit();
    }
    
    $validator->appendImage("image", $filename);
}


$cleanedData = $validator->getCleanedData();
$cleanedData["id"] = $id;
$sql = $validator->buildUpdateQuery();

$db = App::resolve(Database::class);

try {
    
    $db->query($sql, $cleanedData);
    $post = $db->query("SELECT * FROM posts WHERE id = :id", [
        "id" => $id
    ])->fetch();

    if (isset($post["image"])) {
        $post["image"] = "/".$post["image"];
    }


    http_response_code(201);
    echo json_encode([
        "message" => "publicación " . $post['title'] . " actualizada con exito!",
        "data" => $post
    ]);
    exit();


} catch(\PDOException $e) {
    http_response_code(400);
    echo json_encode([
        "errors" => "No fue posible actualizar la publicación",
    ]);
}

exit();