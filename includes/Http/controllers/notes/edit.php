<?php

use Core\App;
use Core\Database;
use Core\Session;

$title = "Edit Note";

$db = App::resolve(Database::class);

$noteId = $params["id"];
$note = $db->query("SELECT * FROM notes WHERE id = :id", ["id" => $noteId])->fetchOr404();

authorize($note["user_id"] == Session::get("user")["id"]);

view("notes/edit.view.php", [
    "title" => $title,
    "note" => $note,
    "errors" => Session::get("errors")
]);
