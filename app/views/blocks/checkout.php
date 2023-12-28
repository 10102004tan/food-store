<!-- Title Page -->
<!-- <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15"
    style="background-image: url(public/images/bg-title-page-01.jpg);">
    <h2 class="tit6 t-center">
        Checkout
    </h2>
</section> -->


<!-- Main menu -->
<section class="section-mainmenu p-t-110 p-b-70 bg1-pattern">
    <div class="container">
        <div class="row checkout-wrapper">
            <form class="box-add-infor col" action="" method="POST" enctype="multipart/form-data">
                <h3 class="title-box">CHECKOUT</h3>
                <div class="contact-information">
                    <div class="box-contact">
                        <h3 class="box-contact-title">
                            Contact Information
                        </h3>
                        <div class="box-field">
                            <input placeholder="Email" type="email" name="email" class="field-contact">
                        </div>
                    </div>
                    <div class="box-contact">
                        <h3 class="box-contact-title">
                            Shopping address
                        </h3>
                        <div class="box-field mutil-field">
                            <input type="text" class="field-contact" placeholder="First name" name="firstname">
                            <input type="text" class="field-contact" placeholder="Last name" name="lastname">
                        </div>
                        <div class="box-field">
                            <input type="text" class="field-contact" placeholder="Address" name="address">
                        </div>
                        <div class="box-field">
                            <input type="text" class="field-contact" placeholder="Phone" name="phone">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn-checkout">
                    Go to payment page
                </button>
            </form>
            <div class="box-product col">
                <div class="products">
                    <?php
                    if (!empty($products)) {
                        foreach ($products as $key => $product) {
                    ?>
                            <div class="product-item">
                                <img src="public/storage/<?= $product["image"] ?>" alt="product image">
                                <div class="product-infor">
                                    <h3 class="product-name"><?= $product["name"] ?></h3>
                                    <p class="product-quantity">x<?= $product["quantity"] ?></p>
                                    <p class="product-price">
                                        $<?= $product["price"] ?>
                                    </p>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <span class="total-pay"><b>Total: </b><?= $total ? $total : 0 ?>$</span>
            </div>
        </div>
    </div>
</section>