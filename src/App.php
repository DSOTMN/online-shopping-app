<?php

declare(strict_types=1);

namespace OnlineShopping;
use OnlineShopping\Actions\Cart\AddToCart;
use OnlineShopping\Actions\Cart\RemoveFromCart;
use OnlineShopping\Actions\Cart\UpdateCartQuantity;
use OnlineShopping\Actions\HomeAction;
use OnlineShopping\Actions\Order\CompleteOrder;
use OnlineShopping\Actions\Order\CreateOrder;
use OnlineShopping\Actions\Order\ListOrders;
use OnlineShopping\Actions\Product\CreateProduct;
use OnlineShopping\Actions\Product\DeleteProduct;
use OnlineShopping\Actions\Product\EditProduct;
use OnlineShopping\Actions\Product\SingleProduct;

final class App
{
    public function start():void
    {
        $action = filter_input(INPUT_GET, 'action');
        match($action){
            NULL => (new HomeAction())->handle(),
            'create-product' => (new CreateProduct())->handle(),
            'single' => (new SingleProduct())->handle(),
            'edit' => (new EditProduct())->handle(),
            'delete' => (new DeleteProduct())->handle(),
            'add-to-cart' => (new AddToCart())->handle(),
            'update-quantity' => (new UpdateCartQuantity())->handle(),
            'remove-from-cart' => (new RemoveFromCart())->handle(),
            'create-order' => (new CreateOrder())->handle(),
            'complete-order' => (new CompleteOrder())->handle(),
            'completed-orders' => (new ListOrders())->handle(),
        };
/*
        if ($action === 'create-product') {
            (new CreateProduct())->handle();
        }elseif($action === 'single') {
            (new SingleProduct())->handle();
        }elseif($action === 'edit'){
            (new EditProduct())->handle();
        }elseif($action === 'delete') {
            (new DeleteProduct())->handle();
        }elseif($action === 'add-to-cart') {
            (new AddToCart())->handle();
        }elseif($action === 'update-quantity') {
            (new UpdateCartQuantity())->handle();
        }elseif($action === 'remove-from-cart') {
            (new RemoveFromCart())->handle();
        }elseif($action === 'create-order') {
            (new CreateOrder())->handle();
        }elseif($action === 'complete-order') {
            (new CompleteOrder())->handle();
        }elseif($action === 'completed-orders'){
            (new ListOrders())->handle();
        }elseif($action == ''){
            (new HomeAction())->handle();
        }*/
    }
}