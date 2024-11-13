<?php

declare(strict_types=1);
require_once('../vendor/autoload.php');
require_once('../model/Order.php');
require_once('../model/OrderRepository.php');




class OrderController
{


    public function createOrder() : void
    {
        $message = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (key_exists('customerName', $_POST)) {

                try {
                    $order = new Order($_POST['customerName']);

                    $orderRepository = new OrderRepository();
                    $orderRepository->persistOrder($order);

                    $message = 'Commande créée';
                } catch (Exception $exception) {
                    $message = $exception->getMessage();
                }

            }
        }


        $loader = new \Twig\Loader\FilesystemLoader('../view');
        $twig = new \Twig\Environment($loader);

        echo $twig->render('create-order.twig', [
            'message' => $message,
        ]);
    }

    public function addProduct() : void
    {
        $message = null;

        $orderRepository = new OrderRepository();
        $order = $orderRepository->getOrder();

        try {
            $order->addProduct();

            $orderRepository->persistOrder($order);
            $message = "Produit ajoutée";

        } catch (Exception $exception) {
            $message = $exception->getMessage();
        }
        $loader = new \Twig\Loader\FilesystemLoader('../view');
        $twig = new \Twig\Environment($loader);

        echo $twig->render('addProduct.twig', [
            'message' => $message,
            'order' => $order,
            'product' => $product,
        ]);


    }

    public function removeProduct() : void
    {
        $message = null;

        $orderRepository = new OrderRepository();
        $order = $orderRepository->getOrder();

        try {
            $order->removeProduct();

            $orderRepository->persistOrder($order);
            $message = "Produit supprimé";

        } catch (Exception $exception) {
            $message = $exception->getMessage();
        }
        require_once('../view/add-product-view.php');


    }

// shipping address function:
    public function shippingAddress() : void
    {
// we start a new orderRepo to claim order's infos
        $orderRepository = new OrderRepository();
        $order = $orderRepository->getOrder();

        $message = null;
// if there is a method post we try to find the key 'shippingAddress'
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (key_exists('shippingAddress', $_POST)) {
// "setShippingAddress" method got the 'shippingAddress' from the post
                try {
                    $order->setShippingAddress($_POST['shippingAddress']);
                    $orderRepository->persistOrder($order);

                    $message = 'Adresse de livraison ajoutée';

                } catch (Exception $exception) {
                    $message = $exception->getMessage();
                }

            }
        }
        require_once('../view/shipping-address-view.php');
    }
// payment function:
    public function paymentProceed() : void
    {

        $message = null;
// creating a new orderRepository and we modify order with orderRepo's infos
        $orderRepository = new OrderRepository();
        $order = $orderRepository->getOrder();

        // We try to start method 'pay'
        try {
            $order->pay();

            $orderRepository->persistOrder($order);
            $message = "Commande payée";
// else if we can't pay:
        } catch (Exception $exception) {
            $message = $exception->getMessage();
        }
        require_once('../view/payment-view.php');
    }


}