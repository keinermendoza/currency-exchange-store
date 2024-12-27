<?php
namespace Http;
use Core\App;
use Core\Database;

header('Content-Type: application/json');

$db = App::resolve(Database::class);
$infosite = $db->query("SELECT * FROM social_accounts LIMIT 1")->fetch();

if(!$infosite) {
    http_response_code(404);
    echo json_encode(["errors" => "no hay datos registrados"]);
    exit();
}

http_response_code(200);
echo json_encode($infosite);
exit();
