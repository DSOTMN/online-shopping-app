<?php

namespace OnlineShopping\Factory;

use OnlineShopping\Repository\Product\ProductRepository;
use OnlineShopping\Repository\Product\ProductRepositoryPdo;

//use OnlineShopping\Repository\ProductRepositoryFilesystem;

class ProductFactory
{
    public static function make():ProductRepository
    {
        $pdo = require __DIR__ . '/../../connection/connection.php';
        return new ProductRepositoryPdo($pdo);
    }
}