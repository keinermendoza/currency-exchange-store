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

// currencies
$router->get("/api/currencies", "api/currencies/index.php", permission: ADMIN);
$router->post("/api/currencies", "api/currencies/store.php", permission: ADMIN);
$router->get("/api/currencies/[i:id]", "api/currencies/show.php", permission: ADMIN);
$router->put("/api/currencies/[i:id]", "api/currencies/update.php", permission: ADMIN);
$router->delete("/api/currencies/[i:id]", "api/currencies/destroy.php", permission: ADMIN);

// exchangerates
$router->get("/api/exchangerates", "api/exchangerates/index.php", permission: ADMIN);
$router->post("/api/exchangerates", "api/exchangerates/store.php", permission: ADMIN);
$router->get("/api/exchangerates/[i:id]", "api/exchangerates/show.php", permission: ADMIN);
$router->put("/api/exchangerates/[i:id]", "api/exchangerates/update.php", permission: ADMIN);
$router->delete("/api/exchangerates/[i:id]", "api/exchangerates/destroy.php", permission: ADMIN);

// infosite
$router->post("/api/infosite", "api/infosite/store.php", permission: ADMIN);
$router->get("/api/infosite", "api/infosite/show.php", permission: ADMIN);
$router->put("/api/infosite", "api/infosite/update.php", permission: ADMIN);
$router->delete("/api/infosite", "api/infosite/destroy.php", permission: ADMIN);

// socialaccounts
$router->post("/api/socialaccounts", "api/socialaccounts/store.php", permission: ADMIN);
$router->get("/api/socialaccounts", "api/socialaccounts/show.php", permission: ADMIN);
$router->put("/api/socialaccounts", "api/socialaccounts/update.php", permission: ADMIN);
$router->delete("/api/socialaccounts", "api/socialaccounts/destroy.php", permission: ADMIN);

return $router;



