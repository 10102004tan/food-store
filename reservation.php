<?php
include 'config/database.php';
$template = new Template();

$data = [
    'title' => 'Reservation',
    'slot' => $template->render('reservation',[])
];
$template->view("layout",$data);