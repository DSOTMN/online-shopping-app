<?php

namespace OnlineShopping\Actions\Product;

use OnlineShopping\Factory\ProductFactory;
use OnlineShopping\Model\Cart;
use OnlineShopping\Model\Product;

class EditProduct
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
        $product = new Product(
            $id,
            filter_input(INPUT_POST, 'name'),
            filter_input(INPUT_POST, 'description'),
            filter_input(INPUT_POST, 'price'),
            filter_input(INPUT_POST, 'stock'),
        );

        foreach ($productsInCart as $item){
            if($item->product()->id() == $id){
                echo "Please remove product from cart before editing its data. <a href='/index.php'>Go back</a>";
                return;
            }
        }
        $repo->store($product);

        header('Location: /index.php');
    }
}