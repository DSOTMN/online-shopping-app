<?php

namespace OnlineShopping\Actions;
use OnlineShopping\Factory\ProductFactory;
use OnlineShopping\Model\Cart;

class HomeAction
{
    public function handle(){
        require_once __DIR__ . '/../../init.php';
        $productsRepository = ProductFactory::make();
        $ordersRepository = ProductFactory::make();
        $products = $productsRepository->findAll();
        $orders = $ordersRepository->findAll();

        if($sessionCart === NULL){
            $cart = new Cart();
        }else{
            $cart = unserialize($sessionCart);
        }

        require_once __DIR__ . '/../../public/views/home.php';
    }
}