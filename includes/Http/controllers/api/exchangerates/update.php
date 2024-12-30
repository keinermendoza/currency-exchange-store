<?php
namespace Http;
use Core\App;
use Core\Database;
use Http\Validator\Validator;

header('Content-Type: application/json');

$id = $params["id"];
$db = App::resolve(Database::class);
$exchange = $db->query("SELECT * FROM exchangerate WHERE id = :id", [
    "id" => $id
])->fetch();

if(!$exchange) {
    http_response_code(404);
    echo json_encode(["errors" => ["Tipo de Cambio no encontrado"]]);
    exit();
}

$rules = require base_path("Http/Validator/rules/UpdateExchange.php");


$json = file_get_contents('php://input');
$data = json_decode($json, true);

$validator = new Validator($data, $rules);

if(!$validator->validate()) {
    http_response_code(400);
    echo json_encode(["errors" => $validator->getErrors()]);
    exit();
}

$rate = bcdiv($data["target_amount"], $data["base_amount"], 6);

$db->query("UPDATE exchangerate SET base_amount = :base_amount, target_amount = :target_amount, rate = :rate WHERE id = :id", [
    "base_amount" => $data["base_amount"],
    "target_amount" => $data["target_amount"],
    "rate" => $rate,
    "id" => $id
]);

http_response_code(200);
echo json_encode(["message" => "Tipo de Cambio actualizado con exito"]);
exit();
