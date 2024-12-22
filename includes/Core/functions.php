<?php 

function dd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
}


function base_path($path) {
    return BASE_DIR . "includes/" . $path;
} 

function public_path($path) {
    return BASE_DIR . "public/" . $path;
} 

function isUrl($url) {
    $baseUrl = "/laracast";
    $compareUrl = $baseUrl . $url;
    return $_SERVER["REQUEST_URI"] === $compareUrl;
}
function forbidden() {
    http_response_code(403);
    require base_path("views/403.view.php");
    die();
}

function notFound() {
    http_response_code(404);
    require base_path("views/404.view.php");
    die();
}

function authorize($condition) {
    if(!$condition) forbidden();
}


function view($template, $context = []) {
    extract($context);
    require base_path("views/{$template}");
}


function redirect($url) {
    header("location: {$url}");
    exit();
}


function old($key, $default = '')
{
    return Core\Session::get('old')[$key] ?? $default;
}

function isDevMode() {
    $config = require base_path("config.php");
    return $config["debug"];
}

function getViteAssets(string $entryName): array {
    $manifestPath = public_path("static/manifest.json"); 

    if (!file_exists($manifestPath)) {
        throw new Exception('Manifest file not found.');
    }

    $manifest = json_decode(file_get_contents($manifestPath), true);

    if (isset($manifest[$entryName])) {
        return $manifest[$entryName]; 
    }

    throw new Exception("Entry {$entryName} not found in manifest.");
}

function handleUploadImage(
    string $field_name, 
    \Http\Validator\Validator $validator,
    string $error_message = "No fue posible adicionar la imagen"
) : bool | string {
    
    $file = $_FILES[$field_name];

    if ($file['error'] !== UPLOAD_ERR_OK) {
        $validator->addError($field_name, $error_message);
        return false;
    }

    $tmpName = $file['tmp_name'];
    $originalName = basename($file['name']); 
    $fileName = "media/" . uniqid() . "_" . $originalName; 
    $destination = public_path($fileName);

    if (move_uploaded_file($tmpName, $destination)) {
        return $fileName;
    } else {
        $validator->addError($field_name, $error_message);
        return false;
    }
}