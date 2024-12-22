<?php 

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);
$note_id = $params["id"];

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    "id" => $note_id
])->fetchOr404();

authorize($note["user_id"] == Session::get("user")["id"]); 

// DELETE IMAGE FILE
if ($note["image"]) {
    $file_path = public_path($note["image"]);

    // echo "Ruta del archivo: " . $file_path;
    // exit();
    if (file_exists($file_path)) {
        unlink($file_path);
    }
}


$db->query("DELETE FROM notes WHERE id = :id", [
    "id" => $note_id
]);

redirect("/notes");