<?php
include 'config/database.php';
$template = new Template();
$data = [
    'title' => 'Blog',
    'slot' => $template->render('blog',[])
];
$template->view("layout",$data);
