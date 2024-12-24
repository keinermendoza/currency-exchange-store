<?php
namespace Http;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$sql = require base_path("Http/controllers/api/exchangerates/sql.php");

$exchangerate = $db->query("$sql WHERE exchangerate.id = :id", [
    "id" => $params["id"]
])->fetch();

if(!$exchangerate) {
    http_response_code(404);
    echo json_encode(["errors" => "Tipo de cambio no encontrado"]);
    exit();
}

if (isset($exchangerate["base_image"])) {
    $exchangerate["base_image"] = "/" . $exchangerate["base_image"];
}
if (isset($exchangerate["target_image"])) {
    $exchangerate["target_image"] = "/" . $exchangerate["target_image"];
}

header('Content-Type: application/json');
http_response_code(200);
echo json_encode($exchangerate);
exit();
