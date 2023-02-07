<?php

namespace OnlineShopping\Model;

class Cart
{
    /** @var CartItem[] */
    private array $cartItems;

    public function __construct(CartItem $cartItem = NULL)
    {
       $this->cartItems = [];
       if($cartItem != NULL){
           $this->add($cartItem);
       }
    }

    public function add($cartItem):void
    {
        $this->cartItems[] = $cartItem;
    }

    public function productsInCart():array
    {
        return $this->cartItems;
    }

    public function total():float
    {
        $total = 0;
        foreach ($this->productsInCart() as $item) {
            $total += $item->product()->price() * $item->quantity();
        }
        return $total;
    }

    public function remove($id):array
    {
        $foundItemKey = '';
        foreach($this->productsInCart() as $key => $singleProduct){
            if($singleProduct->product()->id() == $id){
                $foundItemKey = $key;
            }
        }
        unset($this->cartItems[$foundItemKey]);
        return $this->cartItems;
    }
}