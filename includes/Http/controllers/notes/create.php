<?php 
use Core\Session;
$title = "New Note";

view("notes/create.view.php", [
    "title" => $title,
    "errors" => Session::get("errors")
]);
