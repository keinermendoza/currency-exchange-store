<?php
namespace Http;
use Core\App;
use Core\Database;
use Http\Validator\OptionalValidator;

header('Content-Type: application/json');

$db = App::resolve(Database::class);
$social = $db->query("SELECT * FROM social_accounts LIMIT 1")->fetch();

if($social) {
    http_response_code(404);
    echo json_encode(["errors" => "no es posible registrar otro grupo de redes sociales, mejor intenta actualizando las informaciones."]);
    exit();
}

$json = file_get_contents('php://input');
$data = json_decode($json, true);


// due to all fields are optional the validation is made manually
$validator = new OptionalValidator($data);

$testValidation = function($field) {
    return mb_strlen($field) <= 300 && filter_var($field, FILTER_VALIDATE_URL);;
};

$message = "proporciona una direccion valida que no sobrepase los 300 caracteres";

// change the behavior of conditional
$tiktok = $validator->validateOptionalField(
    "tiktok",
    $testValidation,
    $message
);

$instagram = $validator->validateOptionalField(
    "instagram",
    $testValidation,
    $message
);

$facebook = $validator->validateOptionalField(
    "facebook",
    $testValidation,
    $message
);

$twitter = $validator->validateOptionalField(
    "twitter",
    $testValidation,
    $message
);

$trheads = $validator->validateOptionalField(
    "trheads",
    $testValidation,
    $message
);

$youtube = $validator->validateOptionalField(
    "youtube",
    $testValidation,
    $message
);

if($validator->hasErrors()) {
    http_response_code(400);
    echo json_encode(["errors" => $validator->getErrors()]);
    exit();
}


$db->query("INSERT INTO social_accounts (tiktok, instagram, facebook, twitter, trheads, youtube) VALUES (:tiktok, :instagram, :facebook, :twitter, :trheads, :youtube) ", [
"tiktok" => $tiktok,
"instagram" => $instagram,
"facebook" => $facebook,
"twitter" => $twitter,
"trheads" => $trheads,
"youtube" => $youtube,
]);



echo json_encode(["message" => "redes sociales registradas con exito"]);
http_response_code(200);
exit();
