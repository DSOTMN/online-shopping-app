<?php

namespace OnlineShopping\Actions\Cart;
use OnlineShopping\Model\Cart;

class UpdateCartQuantity
{
    public function handle()
    {
        require_once __DIR__ . '/../../../init.php';

        $id = (int)filter_input(INPUT_GET, 'id');
        $quantity = (int)filter_input(INPUT_POST, 'quantity');
        if($sessionCart === NULL){
            $cart = new Cart();
        }else{
            $cart = unserialize($sessionCart);
        }
        $productsInCart = $cart->productsInCart();

        $foundProductId = '';
        foreach ($productsInCart as $key => $singleProduct) {
            if ($singleProduct->product()->id() == $id) {
                $foundProductId = $key;
            }
        }

        $productsInCart[$foundProductId]->updateItemQuantity($quantity);

        $_SESSION['cart'] = serialize($cart);

        header('Location: /views/cart.php');
    }
}