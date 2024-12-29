<?php
namespace Http;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$sqlExchanges = require base_path("Http/controllers/api/exchangerates/sql.php");

$exchanges = $db->query($sqlExchanges)->fetchAll();
$infosite = $db->query("SELECT * FROM info_site LIMIT 1")->fetch();
$social = $db->query("SELECT * FROM social_accounts LIMIT 1")->fetch();

view("index.view.php", [
    "exchanges" => $exchanges,
    "infosite" => $infosite,
    "social" => $social,
    "title" => "Home"
]);