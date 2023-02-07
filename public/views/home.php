<?php
require_once __DIR__ . '/../../vendor/autoload.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping app home</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
<h3>Add a new product to the shop:</h3>
<form action="/index.php?action=create-product" method="post">
    <label for="name">Product name:</label>
    <input type="text" name="name"><br>
    <label for="description">Description:</label>
    <input type="text" name="description"><br>
    <label for="price">Price:</label>
    <input type="text" name="price"><br>
    <label for="stock">Stock Amount:</label>
    <input type="number" name="stock"><br>
    <input type="submit" value="Create Product">
</form>
<br>
<hr>
<br>

<div>
    <?php if($cart->productsInCart()): ?>
    <p>Items in cart: <b><?=count($cart->productsInCart())?></b></p>
    <a href="/views/cart.php">View Cart</a>
    <?php else: ?>
    <p>No items in cart. Add some!</p>
    <?php endif; ?>
</div>
<div>
    <?php if(isset($orders)): ?>
        <br><hr>
        <a href="/index.php?action=completed-orders">Orders History</a>
    <?php endif; ?>
</div>

<br>
<hr>
<br>

<h3>Items in Shop</h3>
<table>
    <tr>
        <th>Product</th>
        <th>Description</th>
        <th>Price</th>
        <th>Amount Available</th>
        <th>Add to Cart</th>
        <th>Edit</th>
        <th>Remove</th>
    </tr>
    <?php foreach($products as $product) : ?>
    <tr>
        <th><?=$product->name()?></th>
        <th><?=$product->description()?></th>
        <th>$<?=$product->price()?></th>
        <th><?=$product->stock()?></th>
        <th><a href="/index.php?action=add-to-cart&id=<?=$product->id()?>" style="color: forestgreen;">Add to cart</a></th>
        <th><a href="/index.php?action=single&id=<?=$product->id()?>" style="color: dodgerblue;">Update</a></th>
        <th><a href="/index.php?action=delete&id=<?=$product->id()?>" style="color: red;">Remove</a></th>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>