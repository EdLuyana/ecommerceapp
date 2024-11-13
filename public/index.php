<?php

require_once('../config/config.php');

require_once('../controller/OrderController.php');
require_once('../controller/ErrorController.php');

// récupère l'url actuelle
$requestUri = $_SERVER['REQUEST_URI'];

// découpe l'url actuelle pour ne récupérer que la fin
// si l'url demandée est "http://localhost:8888/piscine-ecommerce-app2/public/test"
// $enduri contient "test"
$uri = parse_url($requestUri, PHP_URL_PATH);
$endUri = str_replace('/ecommerce-app/ecommerce-app2/public/', '', $uri);
$endUri = trim($endUri, '/');

$OrderController = new OrderController();

// en fonction de la valeur de $endUri on charge le bon contrôleur
if ($endUri === "create-order") {
    $OrderController->createOrder();

} else if ($endUri === "add-product") {
    $OrderController->addProduct();

} else if ($endUri === "remove-product") {
    $OrderController->removeProduct();
// creating a new URL .../public/shipping-address
} else if ($endUri === "shipping-address") {
    // this URL will call shippingAddress method in the controller previously opened
    $OrderController->shippingAddress();
// creating a new URL for payment function
} else if ($endUri === "payment") {
    // this URL will call paymentProceed methid in the controller previously opened
    $OrderController->paymentProceed();

}else {
    $ErrorController = new NotFound();
    $ErrorController->errorNotFound();
}