<?php
namespace Http;
use Core\App;
use Core\Database;
use Http\Validator\OptionalValidator;


header('Content-Type: application/json');


$db = App::resolve(Database::class);
$infosite = $db->query("SELECT * FROM info_site LIMIT 1")->fetch();

if(!$infosite) {
    http_response_code(404);
    echo json_encode(["errors" => "no hay datos registrados"]);
    exit();
}

$json = file_get_contents('php://input');
$data = json_decode($json, true);

$optionalValidations = new OptionalValidator($data);
$domain = $optionalValidations->validateOptionalField(
    "domain",
    fn($field) => filter_var($field, FILTER_VALIDATE_URL),
    "Proporciona un dominio valido"
);

$phone = $optionalValidations->validateOptionalField(
    "phone_number",
    fn($field) =>  mb_strlen($field) <= 20,
    "El numero de telefono no puede tener mas de 20 digitos"
);

$email = $optionalValidations->validateOptionalField(
    "email",
    fn($field) => filter_var($field, FILTER_VALIDATE_EMAIL),
    "Proporciona una direccion email valida"
);

$address = $optionalValidations->validateOptionalField(
    "address",
    fn($field) =>  mb_strlen($field) <= 200,
    "La deirección no puede tener mas de 200 letras"
);

$whatsapp = $optionalValidations->validateOptionalField(
    "whatsapp_number",
    function($field) {
        $phone = preg_replace('/[^0-9]/', '', $field);
        return strlen($phone) >= 12 && strlen($phone) <= 14;
    },  
    "Proporciona un numero de telefono valido",
    fn($field) => preg_replace('/[^0-9]/', '', $field)
);


$message = $optionalValidations->validateOptionalField(
    "whatsapp_message",
    fn($field) =>  mb_strlen($field) <= 400,
    "El mensaje de Whatsapp no puede tener mas de 400 letras"
);


if ($optionalValidations->hasErrors()) {
    http_response_code(400);
    echo json_encode(["errors" => $optionalValidations->getErrors()]);
    exit();
}


$db->query("UPDATE info_site SET domain = :domain, email = :email, address = :address, phone_number = :phone_number, whatsapp_number = :whatsapp_number, whatsapp_message = :whatsapp_message  WHERE id = :id", [
    "domain" => $domain,
    "email" => $email,
    "address" => $address,
    "phone_number" => $phone,
    "whatsapp_number" => $whatsapp,
    "whatsapp_message" => $message,
    "id" => $infosite["id"],
]);

echo json_encode(["message" => "datos del sitio actualizados con exito"]);
http_response_code(200);
exit();
