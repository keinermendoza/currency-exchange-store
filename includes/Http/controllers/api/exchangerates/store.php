<?php
namespace Http;
use Core\App;
use Core\Database;
use Http\Validator\Validator;

header('Content-Type: application/json');

$json = file_get_contents('php://input');
$data = json_decode($json, true);
echo json_encode($data);



// $rules = require base_path("Http/Validator/rules/Currency.php");
// $validator = new Validator($json, $rules);


// if(!$validator->validate()) {
//     echo json_encode($validator->getErrors()); 
//     exit();
// }

// $db = App::resolve(Database::class);
// $db->query("INSERT INTO currency(name, symbol, image) VALUES(:name, :symbol, :image)", [
//     "name" => $json["name"],
//     "symbol" => $json["symbol"],
//     "image" => $filename,
// ]);


// http_response_code(200);
// echo json_encode(["message" => "Moneda registrada con exito"]);
// exit();