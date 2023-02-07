<?php

namespace OnlineShopping\Actions\Product;

use OnlineShopping\Factory\ProductFactory;

class DeleteProduct
{
    public function handle():void
    {
        $id = filter_input(INPUT_GET, 'id');

        $repo = ProductFactory::make();
        $repo->delete($id);
        header('Location: /index.php');
    }
}