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

// $rate = bcdiv($data["target_amount"], $data["base_amount"], 6);

$db = App::resolve(Database::class);

$is_default = !$db->query("SELECT * FROM exchangerate LIMIT 1")->fetch();

try {
    $db->query("INSERT INTO exchangerate(rate, base_currency_id, target_currency_id, base_amount, target_amount, is_default) VALUES(:rate, :base_currency, :target_currency, :base_amount, :target_amount, :is_default)", [
        "rate" => $data["rate"],
        "base_currency" => $data["base_currency"],
        "target_currency" => $data["target_currency"],
        "base_amount" => $data["base_amount"],
        "target_amount" => $data["target_amount"],
        "is_default" => (int)$is_default  
    ]);

    $insertedId = $db->lastId();

    # geting full joined data
    $sql = require base_path("Http/controllers/api/exchangerates/sql.php");
    $sql .= " WHERE exchangerate.id = $insertedId";
    $newExchangerate = $db->query($sql)->fetch();

    # appending missed slash to images
    if (isset($newExchangerate["base_image"])) {
        $newExchangerate["base_image"] = "/" . $newExchangerate["base_image"];
    }
    if (isset($newExchangerate["target_image"])) {
        $newExchangerate["target_image"] = "/" . $newExchangerate["target_image"];
    }

    http_response_code(201);
    echo json_encode([
        "message" => "Tipo de cambio registrado con exito!",
        "data" => $newExchangerate
    ]);

    exit();


} catch (\PDOException $e) {
    http_response_code(400);
    $validator->addError("base_currency", "ya existe un tipo de cambio con estas monedas");

    echo json_encode(["errors" => $validator->getErrors()]); 
    exit();
}

$insertedId = $db->lastId();

$newExchangerate = $db->query("SELECT * FROM currency WHERE id = :id", [
    "id" => $insertedId
])->fetch();

http_response_code(201);
echo json_encode([
    "message" => "Tipo de cambio registrado con exito!",
    "data" => $newExchangerate
]);

exit();