<?php
namespace Http;
use Core\App;
use Core\Database;

header('Content-Type: application/json');

$id = $params["id"];

$db = App::resolve(Database::class);
$post = $db->query("SELECT * FROM posts WHERE id = :id", [
    "id" => $id
])->fetch();

if(!$post) {
    http_response_code(404);
    echo json_encode(["errors" => "Moneda no encontrada"]);
    exit();
}

// if (!empty($post["image"]) && $post["image"] !== "null") {
//     $post["image"] = "/" . $post["image"];
// }

http_response_code(200);
echo json_encode($post);
exit();
