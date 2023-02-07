<?php

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
<h3>Edit product "<?=$product->name()?>"</h3>
<hr>
<br>

<table>
    <tr>
        <th>Product</th>
        <th>Description</th>
        <th>Price</th>
        <th>Amount</th>
        <th>Edit</th>
        <th>Remove</th>
    </tr>
    <tr>
        <th><?=$product->name()?></th>
        <th><?=$product->description()?></th>
        <th><?=$product->price()?></th>
        <th><?=$product->stock()?></th>
        <th><a href="/index.php?action=add-to-cart&id=<?=$product->id()?>" style="color: forestgreen;">Add to Cart</a></th>
        <th><a href="/index.php?action=delete&id=<?=$product->id()?>" style="color: red;">Remove</a></th>
    </tr>
</table>
<hr>
<form action="/index.php?action=edit&id=<?=$product->id()?>" method="post">
    <label for="name">Product name:</label>
    <input placeholder="<?=$product->name()?>" value="<?=$product->name()?>" type="text" name="name"><br>
    <label for="description">Description:</label>
    <input placeholder="<?=$product->description()?>" value="<?=$product->description()?>" type="text" name="description"><br>
    <label for="price">Price:</label>
    <input placeholder="<?=$product->price()?>" value="<?=$product->price()?>" type="text" name="price"><br>
    <label for="amount">Stock Amount:</label>
    <input placeholder="<?=$product->stock()?>" value="<?=$product->stock()?>" type="number" name="stock"><br>
    <input type="submit" value="Edit Product">
</form>

</body>
</html>