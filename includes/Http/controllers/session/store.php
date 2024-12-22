<?php 

use Core\Authenticator;
use Http\Validator\Validator;

$rules = require base_path("Http/Validator/rules/UserLogin.php");
$validator = new Validator($_POST, $rules);


if ($validator->validate()) {
    if (Authenticator::attempt($_POST["email"], $_POST["password"])) {
        redirect('/');
    }
}

$validator->addError("email", "email or password dosen't match");

view("session/create.view.php", [
    "title" => "Login",
    "errors" => $validator->getErrors()
]);
exit();