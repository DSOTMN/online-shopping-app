<?php

namespace OnlineShopping\Actions\Cart;

use InvalidArgumentException;
use OnlineShopping\Factory\ProductFactory;
use OnlineShopping\Model\Cart;
use OnlineShopping\Model\CartItem;

class AddToCart
{
    public function handle()
    {
        require_once __DIR__ . '/../../../init.php';
        $id = filter_input(INPUT_GET, 'id');
        $repository = ProductFactory::make();
        $product = $repository->find($id);
        $cartItem = new CartItem($product, 1);

        if($sessionCart === NULL){
            $cart = new Cart();
        }else{
            $cart = unserialize($sessionCart);
        }

        foreach($cart->productsInCart() as $productInCart){
            if($productInCart->product()->id() == $cartItem->product()->id()){
                throw new InvalidArgumentException("Product is already in the cart. Try adding more quantity inside the cart.");
            }
        }
        $cart->add($cartItem);




        $_SESSION['cart'] = serialize($cart);

        header('Location: /index.php');
    }
}