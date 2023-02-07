<?php

namespace OnlineShopping\Repository\Product;

use OnlineShopping\Model\Product;
use PDO;

class ProductRepositoryPdo implements ProductRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function store(Product $product): void
    {
        $stmt = $this->pdo->prepare($this->storeQuery($product));
        $params = [
            ':name' => $product->name(),
            ':description' => $product->description(),
            ':price' => $product->price(),
            ':stock' => $product->stock(),
        ];
        if($product->id()){
            $params[':id'] = $product->id();
        }
        $stmt->execute($params);
    }

    private function storeQuery(Product $product):string
    {
        if($product->id()){
            return "UPDATE products SET name=:name, description=:description, price=:price,stock=:stock WHERE id=:id";
        }
        return "INSERT INTO products(name, description, price, stock) VALUES(:name, :description, :price, :stock)";
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->query("SELECT id, name, description, price, stock FROM products");
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Product::class);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**@return Product*/
    public function find($id):Product
    {
        $stmt = $this->pdo->prepare("SELECT id, name, description, price, stock FROM PRODUCTS WHERE id=:id");
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Product::class);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function delete($id):void
    {
        $stmt = $this->pdo->prepare("DELETE FROM products WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}