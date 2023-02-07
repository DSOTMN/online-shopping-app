<?php

namespace OnlineShopping\Model;

use Exception;

class CartItem
{
    /** @var Product */
    private Product $product;
    private ?int $quantity;

    public function __construct(Product $product, $quantity = 1)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function product():Product
    {
        return $this->product;
    }

    public function quantity():?int
    {
        return $this->quantity;
    }
    public function updateItemQuantity($quantity):void
    {
        if($quantity > $this->product()->stock()){
            throw new Exception("That quantity is not available in stock.");
        }elseif ($quantity < 1){
            throw new Exception("Product quantity in cart cannot be less than 1.");
        }
        $this->quantity = $quantity;
    }
}