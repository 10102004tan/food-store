<section class="section-mainmenu p-t-110 p-b-70 bg1-pattern">
    <div class="container">
        <div class="row">
            <?php foreach ($foods_main as $food_main) : ?>
                <div class="col-md-10 col-lg-6 p-l-35 p-l-15-lg m-l-r-auto">
                    <div class="wrap-item-mainmenu p-b-22">
                        <h3 class="tit-mainmenu tit10 p-b-25">
                            <?= $food_main['menu_name'] ?>
                        </h3>
                        <?php foreach ($food_main['data'] as $food_data) : ?>
                            <div class="item-mainmenu m-b-36">
                                <div class="flex-w flex-b m-b-3">
                                    <a href="details.php?id=<?= $food_data['id'] ?>" class="name-item-mainmenu txt21">
                                        <?= $food_data['name'] ?>
                                    </a>

                                    <div class="line-item-mainmenu bg3-pattern"></div>

                                    <div class="price-item-mainmenu txt22">
                                        <?= "$" . $food_data['price'] ?>
                                    </div>
                                </div>

                                <span class="info-item-main txt23">
                                    <?= $food_data['description'] ?>
                                </span>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>

            <?php endforeach ?>
        </div>
</section>