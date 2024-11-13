<?php

declare(strict_types=1);
class OrderRepository
{

    public function persistOrder(Order $order) : void
    {
        session_start();
        $_SESSION['order'] = $order;
    }

    public function getOrder(): Order {
        session_start();
        return $_SESSION['order'];
    }

}