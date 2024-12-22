<?php
namespace Http;
use Core\App;
use Core\Database;
use Http\Validator\Validator;

header('Content-Type: application/json');

$json = file_get_contents('php://input');
$data = json_decode($json, true);

$rules = require base_path("Http/Validator/rules/Currency.php");
$validator = new Validator($data, $rules);

if(!$validator->validate()) {
    echo json_encode($validator->getErrors()); 
    exit();
}

$db = App::resolve(Database::class);
$success = $db->query("INSERT INTO currency(name, code, symbol) VALUES(:name, :code, :symbol)", [
    "name" => $data["name"],
    "code" => $data["code"], 
    "symbol" => $data["symbol"]
]);

if(!$success) {
    http_response_code(500);
    echo json_encode(["error" => "hubo un error al intentar guardar en la base de datos"]); 
    exit();
}

http_response_code(200);
echo json_encode($data);
exit();