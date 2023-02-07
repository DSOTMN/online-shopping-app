<?php

namespace OnlineShopping\Actions\Order;

use OnlineShopping\Model\Cart;
use OnlineShopping\Model\Order;

class CreateOrder
{
    public function handle()
    {
        require_once __DIR__ . '/../../../init.php';

        if($sessionCart === NULL){
            $cart = new Cart();
        }else{
            $cart = unserialize($sessionCart);
        }

        if($cart->productsInCart() != NULL){
            $order = new Order($cart);
            $_SESSION['cart'] = serialize($cart);
            require_once __DIR__ . '/../../../public/views/order.php';
        }else{
            echo "You cannot place an empty order. <a href='/index.php'>Go back to homepage</a> and add something";
        }
    }
}