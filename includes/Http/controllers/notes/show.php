<?php 

use Core\App;
use Core\Database;
use Core\Session;


$db = App::resolve(Database::class);
$noteId = $params['id'];
$note = $db->query("SELECT * FROM notes WHERE id = :id", ["id" => $noteId])->fetch();

authorize($note["user_id"] == Session::get("user")["id"]);

$user = $db->query("SELECT * FROM users WHERE id = :id", ["id" => $note["user_id"]])->fetch();

$title = $note['title'];

view("notes/show.view.php", [
    "title" => $title,
    "user" => $user,
    "note" => $note
]);