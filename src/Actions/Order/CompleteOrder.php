<?php

namespace OnlineShopping\Actions\Order;

use OnlineShopping\Factory\OrderFactory;
use OnlineShopping\Model\Cart;
use OnlineShopping\Model\Order;

class CompleteOrder
{
    public function handle()
    {
        require_once __DIR__ . '/../../../init.php';

        if($sessionCart === NULL){
            $cart = new Cart();
        }else{
            $cart = unserialize($sessionCart);
        }

        $productsInCart = $cart->productsInCart();
        $order = new Order($cart);

        $repository = OrderFactory::make();
        $repository->store($order);

        require_once __DIR__ . '/../../../public/views/order-complete.php';
    }
}