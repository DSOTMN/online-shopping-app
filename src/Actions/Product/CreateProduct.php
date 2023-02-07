<?php

namespace OnlineShopping\Actions\Product;

use OnlineShopping\Factory\ProductFactory;
use OnlineShopping\Model\Product;

class CreateProduct
{
    public function handle():void
    {
        $product = new Product(
            name: filter_input(INPUT_POST, 'name'),
            description: filter_input(INPUT_POST, 'description'),
            price: filter_input(INPUT_POST, 'price'),
            stock: filter_input(INPUT_POST, 'stock'),
        );

        $repository = ProductFactory::make();
        $repository->store($product);

        header('Location: /index.php');
    }
}