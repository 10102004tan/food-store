<div class="page-wrapper">
    <div class="box-payment">
        <button class="btn-pay-back">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </button>
        <h3 class="text-center mb-4 pay-title">Choose mothods to pay</h3>
        <div class="momo-payment mb-4">
            <span class="mb-2 d-block">
                <img src="public/images/MoMo_Logo.png" alt="Momo logo" style="width: 45px; height: 45px;">
                Pay with Momo
            </span>
            <div class="d-flex align-items-center justify-content-center">
                <form method="POST" enctype="application/x-www-form-urlencoded" action="momo_qr_payment.php"
                    class="mr-2">
                    <input type=" submit" name="momo" value="Pay with Momo QR code" class="btn btn-pay-with-momo">
                </form>
                <form method="POST" enctype="application/x-www-form-urlencoded" action="momo_atm_payment.php" class="">
                    <?php
                    if (!empty($order)) {
                    ?>
                    <input type="text" name="order_id" value="<?= $order["id"] ?>" hidden>
                    <?php
                    }
                    ?>
                    <?php
                    if (!empty($totalPay)) {
                    ?>
                    <input type="text" name="amount" value="<?= $totalPay ?>" hidden>
                    <?php
                    }
                    ?>
                    <input type="submit" name="momo" value="Pay with Momo ATM" class="btn btn-pay-with-momo">
                </form>
            </div>
        </div>
        <div class="vnpay-payment">
            <span class="mb-2 d-block">
                <img src="public/images/vn-pay-logo.png" alt="VN pay logo" style="width: 45px; height: 45px;">
                Pay with VN Pay
            </span>
            <div class="d-flex align-items-center justify-content-center">
                <form method="POST" enctype="application/x-www-form-urlencoded" action="momo_qr_payment.php"
                    class="mr-2">
                    <input type=" submit" name="momo" value="Pay with Momo QR code" class="btn btn-pay-with-vnpay">
                </form>
                <form method="POST" enctype="application/x-www-form-urlencoded" action="momo_atm_payment.php" class="">
                    <input type="submit" name="momo" value="Pay with Momo ATM" class="btn btn-pay-with-vnpay">
                </form>
            </div>
        </div>
    </div>
</div>