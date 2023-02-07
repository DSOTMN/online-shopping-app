<?php

namespace OnlineShopping\Model;

use DateTimeImmutable;

class Order
{
    /** @var Product[] */
    private array $products;
    private Cart $cart;
    private ?int $id;
    private mixed $completedAt;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
        $this->products = $cart->productsInCart();
        $this->id = NULL;
        $this->completedAt = NULL;
    }

    public function total()
    {
        $total = 0;
        foreach ($this->products as $product){
            $total += $product->product()->price() * $product->quantity();
        }
        return $total;
    }

    public function id():?int
    {
        return $this->id;
    }
    public function completedAt():?DateTimeImmutable
    {
        if(is_string($this->completedAt)){
            return new DateTimeImmutable($this->completedAt);
        }
        return new DateTimeImmutable("now");
    }
    public function items():array
    {
        return $this->cart->productsInCart();
    }

}