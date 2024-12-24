<?php
namespace Http;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$sql = require base_path("Http/controllers/api/exchangerates/sql.php");

$exchangerates = $db->query($sql)->fetchAll();

array_walk($exchangerates, function(&$exchange) {
    if (isset($exchange["base_image"])) {
        $exchange["base_image"] = "/" . $exchange["base_image"];
    }
    if (isset($exchange["target_image"])) {
        $exchange["target_image"] = "/" . $exchange["target_image"];
    }
}); 

header('Content-Type: application/json');
http_response_code(200);
echo json_encode($exchangerates);
exit();

