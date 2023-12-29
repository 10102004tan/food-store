<!-- Title Page -->
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15"
    style="background-image: url(public/images/bg-title-page-01.jpg);">
    <h2 class="tit6 t-center">
        Shopping Cart
    </h2>
</section>


<!-- Main menu -->
<section class="section-mainmenu p-t-110 p-b-70 bg1-pattern">
    <div class="container">
        <table class="table w-100 shopping-cart-table">
            <thead>
                <tr>
                    <th scope="col">Food name</th>
                    <th scope="col">Food image</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Price</th>
                    <th scope="col">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $item) : ?>
                <tr>
                    <td>
                        <?= $item['name'] ?>
                        </th>
                    <td><img src="public/storage/<?= $item['image'] ?>" style="max-width: 120px; border-radius: 10px"
                            alt="food image" /></td>
                    <td>
                        <?= $item['quantity'] ?>
                    </td>
                    <td>
                        <?= "$" . $item['price'] ?>
                    </td>
                    <td>
                        <a class="h3" href="./delete-shopping-cart.php?id=<?= $item["id"] ?>">
                            <ion-icon name="close-circle-outline"></ion-icon>
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <div class="text-right">
            <div>
                <b>Total: <?= (isset($total)) ? "$".$total : "0" ?></b>
            </div>
            <a href="./checkout.php">Checkout</a>
        </div>
    </div>
</section>
<!-- Sign up -->
<div class="section-signup bg1-pattern p-t-85 p-b-85">
    <form class="flex-c-m flex-w flex-col-c-m-lg p-l-5 p-r-5">
        <span class="txt5 m-10">
            Specials Sign up
        </span>

        <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
            <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="email-address" placeholder="Email Adrress">
            <i class="fa fa-envelope ab-r-m m-r-18" aria-hidden="true"></i>
        </div>

        <!-- Button3 -->
        <button type="submit" class="btn3 flex-c-m size18 txt11 trans-0-4 m-10">
            Sign-up
        </button>
    </form>
</div>