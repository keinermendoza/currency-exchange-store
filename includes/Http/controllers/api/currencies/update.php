<?php
namespace Http;
use Core\App;
use Core\Database;
use Http\Validator\Validator;

header('Content-Type: application/json');

$id = $params["id"];
$db = App::resolve(Database::class);
$currency = $db->query("SELECT * FROM currency WHERE id = :id", [
    "id" => $id
])->fetch();

if(!$currency) {
    http_response_code(404);
    echo json_encode(["errors" => "Moneda no encontrada"]);
    exit();
}

$rules = require base_path("Http/Validator/rules/Currency.php");
$validator = new Validator($_POST, $rules);

if(!$validator->validate()) {
    http_response_code(400);
    echo json_encode(["errors" => $validator->getErrors()]);
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
} 

$newData = [
    "name" => $_POST["name"],
    "symbol" => $_POST["symbol"],
    "image" => $filename ?? $currency["image"],
    "id" => $id
];

try {
    $db->query("UPDATE currency SET name = :name, symbol = :symbol, image = :image WHERE id = :id", $newData);


    if (isset($newData["image"])) {
        $newData["image"] = "/" . $newData["image"];
    }

    // if ($filename) {
    //     $newData["image"] = "/".$newData["image"];
    // }
    
    echo json_encode([
        "message" => "Moneda actualizada con exito!",
        "data" => $newData 
    ]);
    http_response_code(200);
    exit();
} catch(\PDOException $e) {
    http_response_code(400);
    echo json_encode([
        "errors" => "No fue posible actualizar la moneda",
    ]);
}

exit();
