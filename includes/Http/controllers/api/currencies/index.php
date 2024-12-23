<?php
namespace Http;
use Core\App;
use Core\Database;
// use Http\Validator\Validator;
use Core\Authenticator;


// $rules = require base_path("Http/Validator/rules/UserCreate.php");
// $validator = new Validator($_POST, $rules);

// if($validator->validate()) {
$db = App::resolve(Database::class);
$currencies = $db->query("SELECT * FROM currency")->fetchAll();

array_walk($currencies, function(&$currency) {
    if (isset($currency["image"])) {
        $currency["image"] = "/" . $currency["image"];
    }
}); 

header('Content-Type: application/json');
http_response_code(200);
echo json_encode($currencies);
exit();


//     if (!$user) {
//         $hashed_password = password_hash($_POST["password"], PASSWORD_BCRYPT);  
//         $db->query("INSERT INTO users(username, email, password) VALUES(:username, :email, :password)" ,[
//             "username" => $_POST["username"],
//             "password" => $hashed_password,
//             "email" => $_POST["email"],
//         ]);

//         $user_id = $db->lastId();
//         var_dump($user_id);
//         Authenticator::login([
//             "email" => $_POST["email"],
//             "id" => $user_id
//         ]);

//         redirect("/");
//     }

//     $validator->addError("email", "There is an account already registered with that email");
// // }

// view("account/register.view.php", [
//     "title" => "Create an Acount",
//     "errors" => $validator->getErrors(),
// ]);

// redirect('/laracast/login');

