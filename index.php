<?php
include 'config/database.php';
$template = new Template();
$data = [
    'title' => 'Home',
    'slot' => $template->render('home',[])
];
$template->view("layout",$data);
