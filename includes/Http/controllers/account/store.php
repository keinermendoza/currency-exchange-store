<?php
namespace Http;
use Core\App;
use Core\Database;
use Http\Validator\Validator;
use Core\Authenticator;

// echo "creation disallowed";
// exit();



$rules = require base_path("Http/Validator/rules/UserCreate.php");
$validator = new Validator($_POST, $rules);

if($validator->validate()) {

    $db = App::resolve(Database::class);
    $user = $db->query("SELECT * FROM users WHERE email = :email", [
        "email" => $_POST['email']
    ])->fetch();

    if (!$user) {
        $hashed_password = password_hash($_POST["password"], PASSWORD_BCRYPT);  
        $db->query("INSERT INTO users(username, email, password) VALUES(:username, :email, :password)" ,[
            "username" => $_POST["username"],
            "password" => $hashed_password,
            "email" => $_POST["email"],
        ]);

        $user_id = $db->lastId();
        var_dump($user_id);
        Authenticator::login([
            "email" => $_POST["email"],
            "id" => $user_id
        ]);

        redirect("/");
    }

    $validator->addError("email", "There is an account already registered with that email");
}

view("account/register.view.php", [
    "title" => "Create an Acount",
    "errors" => $validator->getErrors(),
]);
exit();

// redirect('/laracast/login');

