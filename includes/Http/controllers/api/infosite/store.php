<?php
namespace Http;
use Core\App;
use Core\Database;
use Http\Validator\Validator;
use Http\Validator\OptionalValidator;


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

$optionalValidations = new OptionalValidator($data);

$phone = $optionalValidations->validateOptionalField(
    "phone_number",
    fn($field) =>  mb_strlen($field) <= 20,
    "El numero de telefono no puede tener mas de 20 digitos"
);

$email = $optionalValidations->validateOptionalField(
    "email",
    fn($field) => filter_var($field, FILTER_VALIDATE_EMAIL),
    "Proporciona una direccion email validaaaaaa"
);

$address = $optionalValidations->validateOptionalField(
    "address",
    fn($field) =>  mb_strlen($field) <= 200,
    "La deirección no puede tener mas de 200 letras"
);


if ($optionalValidations->hasErrors()) {
    http_response_code(400);
    echo json_encode(["errors" => $optionalValidations->getErrors()]);
    exit();
}

$db->query("INSERT INTO info_site (domain, email, address, phone_number, whatsapp_number) VALUES (:domain, :email, :address, :phone_number, :whatsapp_number) ", [
    "domain" => $data["domain"],
    "email" => $email,
    "address" => $address,
    "phone_number" => $phone,
    "whatsapp_number" => $data["whatsapp_number"],
]);

echo json_encode(["message" => "sitio registrado con exito"]);
http_response_code(200);
exit();
