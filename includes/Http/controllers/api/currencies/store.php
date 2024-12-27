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

if (isset($_FILES["image"])) {
    $filename = handleUploadImage("image", $validator);
    if (!$filename) {
        http_response_code(400);
        echo json_encode(["errors" => $validator->getErrors()]);
        exit();
    }
} 

$db = App::resolve(Database::class);
$db->query("INSERT INTO currency(name, symbol, image) VALUES(:name, :symbol, :image)", [
    "name" => $_POST["name"],
    "symbol" => $_POST["symbol"],
    "image" => $filename,
]);


http_response_code(200);
echo json_encode(["message" => "Moneda registrada con exito"]);
exit();