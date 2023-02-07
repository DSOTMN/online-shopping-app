<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../init.php';

use OnlineShopping\Model\Cart;

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
<h3>Shopping Cart</h3>
<hr>
<br>

<table>
    <tr>
        <th>Product</th>
        <th>Description</th>
        <th>Price</th>
        <th>Amount</th>
        <th>Quantity</th>
        <th>Remove from cart</th>

    </tr>


    <?php foreach ($productsInCart as $item) : ?>
        <tr>
            <th><?=$item->product()->name()?></th>
            <th><?=$item->product()->description()?></th>
            <th>$<?=$item->product()->price()?></th>
            <th><?=$item->product()->stock()?></th>
            <th>
                <form action="/index.php?action=update-quantity&id=<?=$item->product()->id()?>" method="POST">
                    <input type="number" name="quantity" min="1" max="<?=$item->product()->stock()?>" value="<?=$item->quantity()?>">
                    <input type="submit" name="update-quantity" value="Update quantity">

                </form>
            </th>
            <th><a href="/index.php?action=remove-from-cart&id=<?=$item->product()->id()?>" style="color: forestgreen;">Remove</a></th>
        </tr>
    <?php endforeach; ?>
    <tr>
        <th>Total amount: $<?=$cart->total()?></th>
    </tr>

</table>
<br>


<?php
if($productsInCart != null) : ?>
<div>
    <a href="/index.php?action=create-order" style="border: 1px solid #c2c2f3; border-radius: 3px; padding: 5px 15px; color: #FFF; background: #c2c2f3; font-size: 16px; font-weight: bold;">Proceed to Checkout</a>
</div>
<?php else: ?>
    <div>
        <a href="/index.php" style="border: 1px solid #c2c2f3; border-radius: 3px; padding: 5px 15px; color: #FFF; background: #c2c2f3; font-size: 16px; font-weight: bold;">Go back and add some products to cart</a>
    </div>
<?php endif; ?>


</body>
</html>
