<?php
require_once __DIR__ . '/../../vendor/autoload.php';
use OnlineShopping\Model\Cart;

require_once __DIR__ . '/../../init.php';
if($sessionCart === NULL){
    $cart = new Cart();
}else{
    $cart = unserialize($sessionCart);
}

$productsInCart = $cart->productsInCart();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping app Cart</title>
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
<h3>Confirm order</h3>
<hr>
<br>

<?php
//var_dump($order);
?>

<ol>
    <h2>Order info:</h2>
    <?php foreach($productsInCart as $cartItem) : ?>
    <li>
        <h3 style="margin: 0;"><?=$cartItem->product()->name()?></h3>
        <p style="margin: 0;">Quantity: <?=$cartItem->quantity()?></p>
        <p style="margin: 0;">Price: $<?=$cartItem->product()->price()?></p>
    </li>
    <?php endforeach; ?>
</ol>
<h4>Total: $<?=$cart->total()?></h4>
<form action="/index.php?action=complete-order" method="post">
    <input type="hidden" name="order" value="<?='abc'?>">
    <input type="submit" style="padding: 5px 10px; background: lightgreen; color: #333; text-decoration: none;" value="Complete Order">
</form>


</body>
</html>
