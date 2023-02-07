<?php

namespace OnlineShopping\Repository\Order;

use OnlineShopping\Model\Order;

interface OrderRepository
{
    public function store(Order $order):void;
    public function findAll();
}