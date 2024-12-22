<?php 

use Core\Database;
use Core\App;
use Http\Validator\Validator;
use Core\Session;

$title = "New Note";
$rules = require base_path("Http/Validator/rules/CreateNote.php");
$validator = new Validator($_POST, $rules);

if(!$validator->validate()) {
    Session::flash("errors", $validator->getErrors());
    Session::flash("old", $_POST);
    redirect("/notes/create");
}

$db = App::resolve(Database::class);

$notes = $db->query("INSERT INTO notes(title, body, user_id) VALUES (:title, :body, :user_id)", [
    "title" => $_POST["title"],
    "body" => $_POST["body"],
    "user_id" => Session::get("user")["id"]
]);

redirect("/notes");