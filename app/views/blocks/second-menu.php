<!-- Lunch -->
<?php foreach ($foods_second as $food_second): ?>
<section class="section-lunch bgwhite">
    <div class="header-lunch parallax0 parallax100" style="background-image: url(public/images/header-menu-01.jpg);">
        <div class="bg1-overlay t-center p-t-170 p-b-165">
            <h2 class="tit4 t-center">
                <?=$food_second['menu_name']?>
            </h2>
        </div>
    </div>

    <?php foreach ($food_second['data'] as $food) :?>
    <div class="container">
        <div class="row p-t-108 p-b-70">
            <div class="col-md-8 col-lg-12 m-l-r-auto food-grid">
               
                        <div class="blo3 flex-w flex-col-l-sm m-b-30">
                                <div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
                                    <a href="./detail?id=<?=$food['id'] ?>"><img src="public/storage/<?=$food['image'] ?>" alt="IMG-MENU"></a>
                                </div>

                                <div class="text-blo3 size21 flex-col-l-m">
                                    <a href="./detail?id= <?=$food['id'] ?>" class="txt21 m-b-3">
                                        <?=$food['name'] ?>
                                    </a>

                                    <span class="txt23">
                                    <?=$food['description'] ?>
                                    </span>

                                    <span class="txt22 m-t-20">
                                    <?=$food['price'] ?>
                                    </span>
                                </div>
                            </div>
            </div>
            
        </div>
    </div>
    <?php endforeach ?>
</section>
<?php endforeach ?>
