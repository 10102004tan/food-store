<?php
include 'config/database.php';
$template = new Template();
$product = new Product();
$name_Main = "Main";
$name_Starters = "Starters";
$name_Dinner = "Drinks";
$name_Dessert = "Dessert";
$name_Lunch = "Lunch";
//data main menu
$foods_main = [[
    "data" => $product->getAllProductInMenu($name_Main),
    "menu_name" => $name_Main
    ],
    [
        "data" => $product->getAllProductInMenu($name_Starters),
        "menu_name" => $name_Starters
    ],
];

$foods_second = [[
    "data" => $product->getAllProductInMenu($name_Dinner),
    "menu_name" => $name_Dinner
    ],
    [
        "data" => $product->getAllProductInMenu($name_Dessert),
        "menu_name" => $name_Dessert
    ],
    [
        "data" => $product->getAllProductInMenu($name_Lunch),
        "menu_name" => $name_Lunch
    ],
];

$slot = $template->render('main-menu', ["foods_main" => $foods_main]) . $template->render('second-menu',['foods_second'=>$foods_second]);
$data = [
    'title' => 'Home',
    'slot' => $template->render("menu",['slot'=>$slot])
];
$template->view("layout", $data);
