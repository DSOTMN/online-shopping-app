<?php

namespace OnlineShopping\Actions\Order;

use OnlineShopping\Factory\OrderFactory;
use OnlineShopping\Factory\ProductFactory;

class ListOrders
{
    public function handle(){
        $ordersRepository = OrderFactory::make();
        $orders = $ordersRepository->findAll();
        $productRepository = ProductFactory::make();
        $products = $productRepository->findAll();

        require_once __DIR__ . '/../../../public/views/completed-orders.php';
    }
}