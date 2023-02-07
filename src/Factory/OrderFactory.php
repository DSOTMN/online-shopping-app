<?php

namespace OnlineShopping\Factory;

use OnlineShopping\Repository\Order\OrderRepository;
use OnlineShopping\Repository\Order\OrderRepositoryPdo;

class OrderFactory
{
    public static function make():OrderRepository
    {
        $pdo = require_once __DIR__ . '/../../connection/connection.php';
        return new OrderRepositoryPdo($pdo);
    }
}