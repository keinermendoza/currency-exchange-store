<?php
namespace Http;
use Core\App;
use Core\Database;
use Http\Validator\Validator;

header('Content-Type: application/json');

$json = file_get_contents('php://input');
$data = json_decode($json, true);

$rules = require base_path("Http/Validator/rules/CreateExchange.php");
$validator = new Validator($data, $rules);

if(!$validator->validate()) {
    http_response_code(400);
    echo json_encode(["errors" => $validator->getErrors()]); 
    exit();
}

if ($data["base_currency"] === $data["target_currency"]) {
    http_response_code(400);
    $validator->addError("target_currency", "selecciona dos monedas diferentes");
    echo json_encode(["errors" => $validator->getErrors()]); 
    exit();
}

$rate = bcdiv($data["target_amount"], $data["base_amount"], 6);

$db = App::resolve(Database::class);

try {
    $db->query("INSERT INTO exchangerate(rate, base_currency_id, target_currency_id, base_amount, target_amount) VALUES(:rate, :base_currency, :target_currency, :base_amount, :target_amount)", [
        "rate" => $rate,
        "base_currency" => $data["base_currency"],
        "target_currency" => $data["target_currency"],
        "base_amount" => $data["base_amount"],
        "target_amount" => $data["target_amount"],
    ]);
} catch (\PDOException $e) {
    http_response_code(400);
    $validator->addError("base_currency", "ya existe un tipo de cambio con estas monedas");
    $validator->addError("error", "ya existe un tipo de cambio con estas monedas");

    echo json_encode(["errors" => $validator->getErrors()]); 
    exit();
}

http_response_code(200);
echo json_encode($data);
