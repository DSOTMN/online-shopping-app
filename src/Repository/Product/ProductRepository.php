<?php
namespace OnlineShopping\Repository\Product;
use OnlineShopping\Model\Product;

interface ProductRepository
{
    public function store(Product $product):void;
    /** @return Product[] */
    public function findAll():array;
    public function find($id):Product;
    public function delete($id):void;
}