<?php

const ADMIN = "admin";
const GUEST = "guest"; 

$router = new \Core\AltoRouter();

$router->get("/", "index.php");
$router->get("/contact", "contact.php");

$router->get("/about", "about.php");


$router->get("/notes", "notes/index.php", permission: ADMIN);
$router->post("/notes", "notes/store.php", permission: ADMIN);

$router->get("/note/[i:id]", "notes/show.php", permission: ADMIN);
$router->delete("/note/[i:id]", "notes/destroy.php", permission: ADMIN);
$router->patch("/note/[i:id]", "notes/update.php", permission: ADMIN);


$router->get("/notes/create", "notes/create.php", permission: ADMIN);
$router->get("/note/edit/[i:id]", "notes/edit.php", permission: ADMIN);

$router->get("/account/register", "account/create.php", permission: GUEST);
$router->post("/account/register", "account/store.php", permission: GUEST);

$router->get("/login", "session/create.php", permission: GUEST);
$router->post("/login", "session/store.php", permission: GUEST);
$router->delete("/logout", "session/destroy.php", permission: ADMIN);

$router->get("/admin[*]", "admin.php", permission: ADMIN);

$router->get("/api/currencies", "api/currencies/index.php");
$router->post("/api/currencies", "api/currencies/store.php");
$router->get("/api/currencies/[i:id]", "api/currencies/show.php");
$router->put("/api/currencies/[i:id]", "api/currencies/update.php");
$router->delete("/api/currencies/[i:id]", "api/currencies/destroy.php");


$router->get("/api/exchangerates", "api/exchangerates/index.php");
$router->post("/api/exchangerates", "api/exchangerates/store.php");
$router->get("/api/exchangerates/[i:id]", "api/exchangerates/show.php");
$router->put("/api/exchangerates/[i:id]", "api/exchangerates/update.php");
$router->delete("/api/exchangerates/[i:id]", "api/exchangerates/destroy.php");







return $router;



// // map homepage
// $router->map( 'GET', '', function() use ($router) {
//     $nota = "me encataría agradecer a todos los que leen esto";
//     $content =  __DIR__ . '/views/pages/home.php';
//     require __DIR__ . '/views/base.php';
// }, 'home');