<?php
// Reusable cart sidebar (JS controls open/close and rendering)
?>
<div id="cart-overlay" class="cart-overlay" hidden></div>
<aside id="cart-sidebar" class="cart-sidebar" aria-hidden="true">
    <div class="cart-sidebar-header">
        <h2 class="cart-sidebar-title">CART</h2>
        <button type="button" id="cart-close" class="cart-close" aria-label="Close cart">&times;</button>
    </div>

    <div class="cart-row">
        <span class="cart-item cart-header cart-column">ITEM</span>
        <span class="cart-price cart-header cart-column">PRICE</span>
        <span class="cart-quantity cart-header cart-column">QTY</span>
    </div>

    <div class="cart-items"></div>

    <div class="cart-total">
        <strong class="cart-total-title">Total</strong>
        <span class="cart-total-price">Rs0</span>
    </div>

    <a href="checkout.php" class="btn btn-primary btn-purchase" type="button">checkout</a>
</aside>
