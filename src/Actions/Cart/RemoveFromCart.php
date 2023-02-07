<?php

namespace OnlineShopping\Actions\Cart;

use OnlineShopping\Model\Cart;

class RemoveFromCart
{
    public function handle():void
    {
        require_once __DIR__ . '/../../../init.php';
        $id = (int)filter_input(INPUT_GET, 'id');
        if($sessionCart === NULL){
            $cart = new Cart();
        }else{
            $cart = unserialize($sessionCart);
        }

        $cart->remove($id);

        $_SESSION['cart'] = serialize($cart);

        echo "<br>AFTER cart->remove<pre>";
        $productsInCart = $cart->productsInCart();
        echo "<pre>";
        var_dump($productsInCart);
        header('Location: /views/cart.php');
    }
}