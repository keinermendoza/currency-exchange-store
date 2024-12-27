<?php
namespace Http;
use Core\App;
use Core\Database;
use Http\Validator\Validator;

header('Content-Type: application/json');

$db = App::resolve(Database::class);
$infosite = $db->query("SELECT * FROM info_site LIMIT 1")->fetch();

if($infosite) {
    http_response_code(404);
    echo json_encode(["errors" => "no es posible registrar otro sitio, mejor intenta actualizar los datos del sitio"]);
    exit();
}

$json = file_get_contents('php://input');
$data = json_decode($json, true);

$rules = require base_path("Http/Validator/rules/CreateUpdateInfosite.php");

$validator = new Validator($data, $rules);

if(!$validator->validate()) {
    http_response_code(400);
    echo json_encode(["errors" => $validator->getErrors()]);
    exit();
}

$phone = "";
if (array_key_exists("phone_number", $data)){
    if (mb_strlen($data["phone_number"]) <= 20) {
        $phone = htmlspecialchars($data["phone_number"]);
    } else {
        $validator->addError("phone_number", "El numero de telefono no puede tener mas de 20 caracteres");
    }
}

$address = "";
if (array_key_exists("phone_number", $data)){
    if (mb_strlen($data["aaddress"]) <= 200) {
        $address = htmlspecialchars($data["address"]);
    } else {
        $validator->addError("address", "La deireccionno puede tener mas de 200 letras");
    }
}

if ($validator->hasErrors()) {
    http_response_code(400);
    echo json_encode(["errors" => $validator->getErrors()]);
    exit();
}

$db->query("INSERT INTO info_site (domain, email, address, phone_number, whatsapp_number) VALUES (:domain, :email, :address, :phone_number, :whatsapp_number) ", [
    "domain" => $data["domain"],
    "email" => $data["email"],
    "address" => $data["address"] ?? null,
    "phone_number" => $data["phone_number"] ?? null,
    "whatsapp_number" => $data["whatsapp_number"],
]);

echo json_encode(["message" => "sitio registrado con exito"]);
http_response_code(200);
exit();
