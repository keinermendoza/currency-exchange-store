<?php
namespace Http;
use Core\App;
use Core\Database;
use Http\Validator\ValidationException;
use Http\Validator\PostValidator;

header('Content-Type: application/json');

if (!isset($_FILES["image"])) {
    http_response_code(404);
    echo json_encode([
        "errors" => [
            "image" => "debe proporcionar una imagen para la publicacion"
        ]
    ]);
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

$filename = handleUploadImage("image", $validator);
if (!$filename) {
    http_response_code(400);
    echo json_encode(["errors" => $validator->getErrors()]);
    exit();
}

$validator->appendImage("image", $filename);
$cleanedData = $validator->getCleanedData();
$sql = $validator->buildInsertQuery();

$db = App::resolve(Database::class);

try {
    
    $db->query($sql, $cleanedData);
    $insertedId = $db->lastId();

    $newCurrency = $db->query("SELECT * FROM posts WHERE id = :id", [
        "id" => $insertedId
    ])->fetch();

    $newCurrency["image"] = "/".$newCurrency["image"];

    http_response_code(201);
    echo json_encode([
        "message" => "publicación " . $newCurrency['title'] . " registrada con exito!",
        "data" => $newCurrency
    ]);
    exit();


} catch(\PDOException $e) {
    http_response_code(400);
    echo json_encode([
        "errors" => "No fue posible registrar la publicación",
    ]);
}

exit();