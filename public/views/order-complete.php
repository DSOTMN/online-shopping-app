<?php
session_destroy();
?>

<h3>Congrats! Your order is completed successfully!</h3>
<div><a href="/index.php">Go back to homepage</a></div>
<div>
    <form action="/index.php?action=completed-orders" method="post">
        <input type="submit" value="View completed orders">
    </form>
</div>