<?php
namespace Http;
use Core\App;
use Core\Database;

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

if(isset($currency["image"])) $currency["image"] = "/".$currency["image"];

http_response_code(200);
echo json_encode($currency);
exit();
