<?php 

use Core\Database;
use Core\App;
use Core\Session;
use Http\Validator\Validator;

$title = "New Note";
$db = App::resolve(Database::class);

$noteId = $params["id"];
$note = $db->query("SELECT * FROM notes WHERE id = :id", ["id" => $noteId])->fetchOr404();
authorize($note["user_id"] == Session::get("user")["id"]);


$rules = require base_path("Http/Validator/rules/UpdateNote.php");
$validator = new Validator($_POST, $rules);

if(!$validator->validate()) {
    Session::flash("errors", $validator->getErrors());
    Session::flash("old", $_POST);
    redirect("/note/edit/{$noteId}");
}

// Manejo de Imagen
if (isset($_FILES['image'])) {
    $filename = handleUploadImage("image", $validator);
    if (!$filename) {
        Session::flash("errors", $validator->getErrors());
        Session::flash("old", $_POST);
        redirect("/note/edit/{$noteId}");
        exit();
    }
}

$db->query("UPDATE notes SET title = :title, body = :body, image = :image WHERE id = :id", [
    "title" => $_POST["title"],
    "body" => $_POST["body"],
    "image" => $filename,
    "id" => $noteId
]);

redirect("/note/{$noteId}");