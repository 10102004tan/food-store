<!-- Title Page -->
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15"
    style="background-image: url(public/images/bg-title-page-01.jpg);">
    <h2 class="tit6 t-center">
        Food Detail
    </h2>
</section>
<!-- Main menu -->
<section class="section-mainmenu p-t-110 p-b-70 bg1-pattern">
    <div class="container">
        <?php if (isset($_SESSION['notify-success'])) : ?>
        <div class="alert alert-success mt-3">
            <?php echo $_SESSION['notify-success'];
                unset($_SESSION['notify-success']); ?>
        </div>
        <?php endif ?>

        <?php if (isset($_SESSION['notify-fail'])) : ?>
        <div class="alert alert-danger mt-3">
            <?= $_SESSION['notify-fail'];
                unset($_SESSION['notify-fail']); ?>
        </div>
        <?php endif ?>
        <div class="row">
            <div class="col-lg-6">
                <div class="box-img mb-3">
                    <img src="public/storage/<?= $food['image'] ?>" alt="food image" />
                </div>
                <div class="slide-image">

                    <div class="slide-container">
                        <div class="slide-wrapper">
                            <?php
                            $images = explode('~', $food['images']);
                            array_push($images, $food["image"]);

                            foreach ($images as $image) { ?>
                            <?php
                                if ($image != "") {
                                ?>
                            <div class="slide-item">
                                <img src="public/storage/<?= $image ?>" />
                            </div>
                            <?php
                                }
                                ?>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-6">
                <h3 class="title-food">
                    <?= $food['name'] ?>
                </h3>
                <div class="rate mb-3">
                    <span style="color: #fbc531">
                        <ion-icon name="star"></ion-icon>
                    </span>
                    <span style="font-weight: 600">4.7</span>
                    <span style="font-size: 14px; color: #636e72">(300 feedback)</span>
                </div>
                <form action="" method="post" id="form-add-to-cart">
                    <input hidden name="food_id" value="<?= $food['id'] ?>">
                    <input hidden name="image" value="<?= $food['image'] ?>">
                    <input hidden name="name" value="<?= $food['name'] ?>">
                    <input hidden name="price" value="<?= $food['price'] ?>">
                    <div class="d-flex align-items-center">
                        <div class="price-box mb-3 mr-3">
                            <?= $food['price'] ?>
                        </div>

                        <div class="box-qty mb-3">
                            <div class="min">
                                <ion-icon name="remove"></ion-icon>
                            </div>
                            <div class="amount">
                                <label
                                    class="input-amount-food input-amount-label d-flex align-items-center justify-content-center mb-0">0</label>
                                <input hidden name="quantity" value="0" id="input-amount-food" />
                            </div>
                            <div class="max">
                                <ion-icon name="add"></ion-icon>
                            </div>
                        </div>
                    </div>
                    <div class="box-desc mb-3">
                        <h4>Description</h4>
                        <p>
                            <?= $food['description'] ?>
                        </p>
                    </div>
                    <button type="button" class="btn-add-to-cart">
                        Add to Cart
                        <ion-icon name="cart"></ion-icon>
                    </button>
                </form>

            </div>
        </div>
    </div>

    <div class="feed-back" style="text-align: center">
        <span class="txt5 m-10 mb-2 d-block">
            Comments
        </span>
        <div class="box-comment container p-4 bg-white rounded">

            <?php
            if ($comments != null) {
                foreach ($comments as $key => $comment) {
            ?>
            <div class="user">
                <img src="public/images/default-user-icon.png" alt="icon user" />
                <div class="d-flex align-items-start justify-content-center flex-col">
                    <p class="username">
                        <?= $comment["username"] ?>
                    </p>
                    <p class="comment"> <?= $comment["comment"] ?></p>
                </div>
            </div>
            <?php
                }
            }
            ?>

            <form class="edit-comment" action="./admin/comments/create.php" method="POST">
                <input name="comment" type="text"
                    placeholder="Let everyone know their thoughts about this dish here..." />
                <input name="username" type="text" hidden
                    value="<?php echo isset($_COOKIE["username"]) ? $_COOKIE["username"] : "" ?>" />
                <input name="food_id" type="text" hidden value="<?= $food["id"] ?>" />
                <button class="btn btn-danger btn-edit-comment" type="button">Send</button>
            </form>
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
<script type="text/javascript">
const mainDisplayImage = document.querySelector(".box-img img");
const slideImageItem = document.querySelectorAll(".slide-item img");
const btnDecAmount = document.querySelector(".min");
const btnIncAmount = document.querySelector(".max");
const displayAmount = document.querySelector(".amount label");
const formAddToCart = document.querySelector("#form-add-to-cart");
const inputAmount = document.querySelector("#input-amount-food");
const btnAddToCart = document.querySelector(".btn-add-to-cart");
const formEditComment = document.querySelector(".edit-comment");
const btnEditComment = document.querySelector(".btn-edit-comment");
const inputUsername = document.querySelector("input[name=username]");
const inputFoodId = document.querySelector("input[name=food_id]");
const inputComment = document.querySelector("input[name=comment]");
let amount = 0;

slideImageItem.forEach((img) => {
    img.addEventListener("click", () => {
        mainDisplayImage.src = img.src;
    })
})

displayAmount.textContent = amount;

btnDecAmount.addEventListener("click", () => {
    if (amount > 0) {
        amount--;
    }
    displayAmount.textContent = amount;
})

btnIncAmount.addEventListener("click", () => {
    amount++;
    displayAmount.textContent = amount;
})


btnAddToCart.addEventListener("click", () => {
    if (amount > 0) {
        inputAmount.value = amount;
        formAddToCart.submit();
    } else {
        alert("Amount food must be than more 0");
    }
});

btnEditComment.addEventListener("click", () => {
    if (inputUsername.value !== "") {
        if (inputComment.value !== "") {
            formEditComment.submit();
        }
    } else {
        location.href = "./login.php";
    }
});
</script>