<?php 

use Core\Authenticator;
use Http\Validator\Validator;
use Core\Session;

$rules = require base_path("Http/Validator/rules/UserLogin.php");
$validator = new Validator($_POST, $rules);


if ($validator->validate()) {
    if (Authenticator::attempt($_POST["email"], $_POST["password"])) {
        redirect('admin/');
    }
}

if (!$validator->hasErrors()) {
    $validator->addError("email", "usuario o contraseña incorrectos");
}

Session::flash("errors", $validator->getErrors());
redirect('login');


exit();