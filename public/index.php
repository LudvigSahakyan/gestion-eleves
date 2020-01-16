<?php

require __DIR__ . "/../vendor/autoload.php";

// use PHPInitiation\Controller\NotFound\NotFoundController;

$url = filter_input(INPUT_SERVER, "REDIRECT_URL");
$method = strtolower(filter_input(INPUT_SERVER, "REQUEST_METHOD"));
$routes = json_decode(file_get_contents(__DIR__ . "/../config/routes.json"));
$baseClassName = "GestionEleves\\Controller\\";
$baseUrl = "/gestion_eleves/public";

foreach ($routes as $value) {
    if ($url !== $baseUrl . $value->url) {
        continue;
    }
    $methods = explode(",", strtolower($value->method));
    if (!in_array($method, $methods)) {
        header("HTTP/1.1 405 Method Not Allowed");
        die("method not allowed");
    }
    $className = $baseClassName . str_replace(
        "/",
        "\\",
        $value->controller
    );
    $controller = new $className();
    $controller->{$value->action}();
    exit;
}
// header("HTTP/1.1 404 Page Not Found");
// $controller = new NotFoundController();
// $controller->read();


