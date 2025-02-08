<?php
namespace Http;
use Core\App;
use Core\Database;
use Http\Validator\Validator;

header('Content-Type: application/json');

$rules = require base_path("Http/Validator/rules/Currency.php");
$validator = new Validator($_POST, $rules);

if(!$validator->validate()) {
    http_response_code(400);
    echo json_encode(["errors" => $validator->getErrors()]); 
    exit();
}

if (!isset($_FILES["image"])) {
    http_response_code(404);
    echo json_encode([
        "errors" => [
            "image" => "debe proporcionar una imagen para la moneda"
        ]
    ]);
    exit();
}

$filename = handleUploadImage("image", $validator);
if (!$filename) {
    http_response_code(400);
    echo json_encode(["errors" => $validator->getErrors()]);
    exit();
}

$db = App::resolve(Database::class);

try {
    $db->query("INSERT INTO currency(name, symbol, image) VALUES(:name, :symbol, :image)", [
        "name" => $_POST["name"],
        "symbol" => $_POST["symbol"],
        "image" => $filename,
    ]);
    
    $insertedId = $db->lastId();


    $newCurrency = $db->query("SELECT * FROM currency WHERE id = :id", [
        "id" => $insertedId
    ])->fetch();

    $newCurrency["image"] = "/".$newCurrency["image"];

    http_response_code(201);
    echo json_encode([
        "message" => "moneda " . $newCurrency['name'] . " registrada con exito!",
        "data" => $newCurrency
    ]);
    exit();


} catch(\PDOException $e) {
    http_response_code(400);
    echo json_encode([
        "errors" => "No fue posible registrar la moneda",
    ]);
}

exit();