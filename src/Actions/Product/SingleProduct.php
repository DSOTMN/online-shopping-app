<?php

namespace OnlineShopping\Actions\Product;

use OnlineShopping\Factory\ProductFactory;
use OnlineShopping\Model\Cart;

class SingleProduct
{
    public function handle()
    {
        require_once __DIR__ . '/../../../vendor/autoload.php';
        require_once __DIR__ . '/../../../init.php';
        if($sessionCart === NULL){
            $cart = new Cart();
        }else{
            $cart = unserialize($sessionCart);
        }

        $productsInCart = $cart->productsInCart();

        $id = filter_input(INPUT_GET, 'id');
        $repo = ProductFactory::make();
        $product = $repo->find($id);

        require_once __DIR__ . '/../../../public/views/single.php';
    }
}