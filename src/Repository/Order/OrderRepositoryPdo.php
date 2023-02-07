<?php

namespace OnlineShopping\Repository\Order;

use OnlineShopping\Model\Order;
use PDO;

class OrderRepositoryPdo implements OrderRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function store(Order $order): void
    {
        $orderStmt = $this->pdo->prepare("INSERT INTO orders (id, total, completed_at) VALUES (:id, :total, :completedAt)");
        $orderId = uniqid('order-', true);
        $orderTotal = $order->total();
        $orderStmt->bindParam(':id', $orderId);
        $orderStmt->bindParam(':total', $orderTotal);

        $params = [
            ':id' => $orderId,
            ':total' => $order->total(),
            ':completedAt' => $order->completedAt()?->format('Y-m-d H:i:s')
        ];
        $orderStmt->execute($params);

        $orderItemsStmt = $this->pdo->prepare("INSERT INTO order_items (quantity, price, order_id, product_id) VALUES(:quantity, :price, :order_id, :product_id);");
        $orderItems = $order->items();
        foreach ($orderItems as $orderItem){
            $prodPrice = $orderItem->product()->price();
            $prodQuant = $orderItem->quantity();
            $productId = $orderItem->product()->id();
            $orderItemsStmt->bindParam(':quantity', $prodQuant);
            $orderItemsStmt->bindParam(':price', $prodPrice);
            $orderItemsStmt->bindParam(':order_id', $orderId);
            $orderItemsStmt->bindParam(':product_id', $productId);
            $orderItemsStmt->execute();
        }

    }

    public function findAll():array
    {
        $itemStmt = $this->pdo->query(<<<SQL
            SELECT orders.id, products.name, products.price, order_items.quantity, orders.total
            FROM order_items JOIN orders 
            ON order_items.order_id = orders.id 
            JOIN products 
            ON order_items.product_id = products.id 
            GROUP BY orders.id, order_items.product_id
            ORDER BY orders.id            
            SQL);
        $itemStmt->execute();
        $items = $itemStmt->fetchAll(PDO::FETCH_ASSOC);

        $productsByOrder = [];

        foreach($items as $item){
            $orderId = $item['id'];
            $productsByOrder[$orderId][] = [
                'name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'total' => $item['total']
            ];
        }
        return $productsByOrder;
    }
}