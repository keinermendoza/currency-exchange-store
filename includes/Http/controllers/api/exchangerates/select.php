<?php
namespace Http;
use Core\App;
use Core\Database;

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

$db->query("UPDATE exchangerate SET is_default = 0");

$db->query("UPDATE exchangerate SET is_default = 1 WHERE id = :id", [
    "id" => $id
]);

http_response_code(200);
echo json_encode(["message" => "Cambio escogido como primero en mostrarse"]);
exit();