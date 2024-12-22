<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);
$notes = $db->query("SELECT * FROM notes WHERE user_id = :userId", ["userId" => Session::get("user")["id"]])->fetchAll();

view("notes/index.view.php", [
    "title" => "My Notes",
    "notes" => $notes
]);