<?php
require_once __DIR__ . '/../../init.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Completed orders</title>
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
<a href="/index.php">Go back to homepage</a>
<br>
<h3>Product orders</h3>
<hr>
<br>


<?php foreach($orders as $id => $order) :?>
    <h3>Order ID: <?=$id?></h3>
    <table>
        <tr>
            <th>Product</th>
            <th>quantity</th>
            <th>Price</th>
        </tr>
<?php foreach ($order as $item) :?>
        <tr>
            <th><?= $item['name'] ?></th>
            <th><?= $item['quantity'] ?></th>
            <th>$<?= $item['price'] ?></th>
        </tr>

<?php endforeach;?>
        <tr>
            <th></th>
            <th></th>
            <th>Total: $<?=$item['total'] ?></th>
        </tr>
    </table>
<br>
<?php endforeach;?>

</body>
</html>