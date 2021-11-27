<?php
$cartItem = $shoppingCart->getMemberCartItem($member_id);
if (! empty($cartItem)) {
    $item_quantity = 0;
    $item_price = 0;
    if (! empty($cartItem)) {
        foreach ($cartItem as $item) {
            $item_quantity = $item_quantity + $item["quantity"];
            $item_price = $item_price + ($item["price"] * $item["quantity"]);
        }
    }
}
?>
    <div id="shopping-cart">
        <div class="txt-heading">
            <div class="txt-heading-label">Shopping Cart</div>

            <a id="btnEmpty" href="index.php?action=empty"><img
                    src="empty-cart.png" alt="empty-cart" title="Empty Cart"
                    class="float-right" /></a>
            <div class="cart-status">
                <div>Total Quantity: <?php echo $item_quantity; ?></div>
                <div>Total Price: <?php echo $item_price; ?></div>
            </div>
        </div>
        <?php
        if (! empty($cartItem)) {
            ?>
            <div class="shopping-cart-table">
                <div class="cart-item-container header">
                    <div class="cart-info title">Title</div>
                    <div class="cart-info">Quantity</div>
                    <div class="cart-info price">Price</div>
                </div>
                <?php
                foreach ($cartItem as $item) {
                    ?>
                    <div class="cart-item-container">
                        <div class="cart-info title">
                            <?php echo $item["name"]; ?>
                        </div>

                        <div class="cart-info quantity">
                            <div class="btn-increment-decrement" onClick="decrement_quantity(<?php echo $item["cart_id"]; ?>)">-</div><input class="input-quantity"
                                                                                                                                             id="input-quantity-<?php echo $item["cart_id"]; ?>" value="<?php echo $item["quantity"]; ?>"><div class="btn-increment-decrement"
                                                                                                                                                                                                                                               onClick="increment_quantity(<?php echo $item["cart_id"]; ?>)">+</div>
                        </div>

                        <div class="cart-info price">
                            <?php echo "$".$item["price"]; ?>
                        </div>


                        <div class="cart-info action">
                            <a
                                href="index.php?action=remove&id=<?php echo $item["cart_id"]; ?>"
                                class="btnRemoveAction"><img
                                    src="icon-delete.png" alt="icon-delete"
                                    title="Remove Item" /></a>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        }
        ?>
    </div>
<?php require_once "product-list.php"; ?>