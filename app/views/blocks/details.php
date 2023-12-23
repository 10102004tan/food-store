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

       


        <div class="row">
            <div class="col-lg-6">
                <div class="box-img mb-3">
                    <img src="public/images/<?= $food['image'] ?>" alt="food image" />
                   
                </div>
                <div class="slide-image">

                    <div class="slide-container">
                        <div class="slide-wrapper">
                            <?php
                            $images = explode('~', $food['images']);
                            foreach ($images as $image): ?>
                                <div class="slide-item">
                                    <img src="public/storage/<?= $image ?>" />
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-6">
                <h3 class="title-food">
                    <?= $food['name'] ?>
                </h3>
                <div class="rate mb-3">
                    <span style="color: #fbc531"><ion-icon name="star"></ion-icon></span>
                    <span style="font-weight: 600">4.7</span>
                    <span style="font-size: 14px; color: #636e72">(300 feedback)</span>
                </div>
                <form action="shopping-cart.php" method="post">
                <input type="hidden" name="image" value="<?= $food['image'] ?>">
                <input type="hidden" name="name" value="<?= $food['name'] ?>">
                <input type="hidden" name="price" value="<?= $food['price'] ?>">
                    <div class="d-flex align-items-center">
                        <div class="price-box mb-3 mr-3">
                            <?= $food['price'] ?>
                        </div>

                        <div class="box-qty mb-3">
                            <div class="min">
                                <ion-icon name="remove"></ion-icon>
                            </div>
                            <div class="amount">
                                <label class="input-amount-food input-amount-label d-flex align-items-center justify-content-center mb-0">0</label>
                                <input type="hidden" name="quantity" value="0" id="input-amount-food"  />
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
                    <button name="id" type="submit" value="<?= $food['id'] ?>" class="btn-add-to-cart">
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

            <c:forEach items="${food_comments}" var="comment">
                <div class="user">
                    <img src="public/images/default-user-icon.png" alt="icon user" />
                    <div class="d-flex align-items-start justify-content-center flex-col">
                        <p class="username">${comment.getUsername()}</p>
                        <p class="comment">${comment.getComment()}</p>
                    </div>
                </div>
            </c:forEach>


            <form class="edit-comment" action="" method="POST">
                <input name="comment" type="text"
                    placeholder="Let everyone know their thoughts about this dish here..." />
                <input name="username" type="text" hidden value="${username}" />
                <input name="food_id" type="text" hidden value="${food_id}" />
                <button class="btn btn-danger">Send</button>
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
<script>

    const min = document.querySelector('.min');
    const max = document.querySelector('.max');
    const inputAmount = document.getElementById('input-amount-food');
    const inputAmoutLabel =document.querySelector('.input-amount-label');

    min.addEventListener('click', () => {
        let value = parseInt(inputAmount.value);
        if (!isNaN(value)) {
            inputAmount.value = Math.max(value - 1, 0);
            inputAmoutLabel.textContent =inputAmount.value;
        }
    });

    max.addEventListener('click', () => {
        let value = parseInt(inputAmount.value);
        if (!isNaN(value) && value < 30) {
            inputAmount.value = value + 1;
            inputAmoutLabel.textContent =inputAmount.value;
        }
        
    });



</script>