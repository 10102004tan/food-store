<div class="page-wrapper flex-col justify-content-start p-3" style="overflow-y: scroll; overflow-x: hidden;">

    <div class="box-history">
        <button class="btn-order-back btn-pay-back mb-3">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </button>
        <h3 class="title-order text-center mb-4">
            Your history order
        </h3>

        <p class="text-center">Check the status of recent orders, manage returns, and discover similar products.</p>

        <div class="history">
            <?php
            if (isset($orders)) {
                foreach ($orders as $key => $order) {
            ?>
            <div class="history-item mb-3">
                <div class="head-item  d-flex align-items-center justify-content-between">
                    <span class="d-flex align-items-center justify-content-center">
                        <b>Order</b>
                        <b>#<?= $order["id"] ?></b>
                        <p class="date-order ml-2">Ordered on <?php
                                                                        $timestamp = strtotime($order["created_at"]);
                                                                        $formattedDate = date("F j, Y  H:i:s", $timestamp);
                                                                        echo $formattedDate;
                                                                        ?>
                        </p>
                    </span>
                    <div class="d-flex align-items-center justify-content-center">
                        <button class="history-order-btn">Manage Order</button>
                        <button class="history-order-btn">View Incoice</button>
                    </div>
                </div>
                <div class="content-item">
                    <?php
                            if (count($order["details"]) > 0) {
                                foreach ($order["details"] as $key => $orderDetail) {
                            ?>
                    <div class="item d-flex justify-content-between py-2"
                        style="gap: 16px; border-top: 1px solid rgba(0,0,0,0.2)">
                        <img src="public/storage/<?= $orderDetail["product"]["image"] ?>" alt="product image"
                            style="width: 200px; border-radius: 10px;">
                        <div class="details" style="flex: 1">
                            <b class="item-name"><?= $orderDetail["product"]["name"] ?></b>
                            <div class="item-more-details">
                                <p style="max-width: 400px;" class="mb-2">
                                    <?= $orderDetail["product"]["description"] ?>
                                </p>
                            </div>
                            <p class="item-price mb-3">x<?= $orderDetail["quantity"] ?></p>
                            <br>
                            <b class="item-price mb-3">
                                $<?= $orderDetail["product"]["price"] * $orderDetail["quantity"]  ?></b>
                        </div>
                        <div class="" style="flex: 1; width: fit-content;">
                            <p class="mb-2"><b>Payment status:</b>
                                <?php
                                        if ($order["payment_status"] == 1) {
                                            echo "<button class='btn btn-success'>paid</button>";
                                        }else {
                                            echo "<button class='btn btn-warning'>unpaid</button>";
                                        }
                                    ?>
                            </p>
                            <p><b>Delivery status:</b>
                                <?php
                                        if ($order["delivery_status"] == 1) {
                                            echo "<button class='btn btn-warning'>in transit</button>";
                                        }else if ($order["delivery_status"] == 0 ) {
                                            echo "<button class='btn btn-warning'>preparing</button>";
                                        }else {
                                            echo "<button class='btn btn-success'>delivered</button>";
                                        }
                                    ?>
                            </p>
                        </div>
                        <div class="btn-action d-flex align-items-center justify-content-center flex-col"
                            style="gap: 10px">
                            <button class="btn-buy-again">Buy again</button>
                        </div>
                    </div>
                    <?php
                                }
                            }
                            ?>

                </div>
            </div>
            <?php
                }
            }
            ?>

            <?php
                if (count($orders) <= 0) {
                ?>
            <img src="public/images/empty-cart.avif" alt="empty cart image" style="margin-left: 50%; width: 300px; height: auto;
                transform: translateX(-50%);
                ">
            <p class="text-center">You don't have any orders yet</p>
            <?php
                }
            ?>
        </div>
    </div>
</div>

<script>
const btnBack = document.querySelector(".btn-order-back");
btnBack.addEventListener("click", () => {
    window.location.href = "./"
})
</script>

$order["delivery_status"] == 1 ? "in transit" : $order["delivery_status"] == 0 ? "preparing the order" :