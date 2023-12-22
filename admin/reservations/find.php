<?php 
include '../../config/database.php';
$template = new Template();
$reservation = new Reservation();
$page = 1;
$key = $_GET['key'];
$perPage = 5;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
$total = $reservation->getAllTotalReservationsByKey($key);
$reservations_data = $reservation->getAllReservationsLimitByKey($key,($page - 1)*$perPage, $perPage);
$endPage = ceil($total / $perPage);
$data = [
    'title' => 'Manage Reservation',
    'slot' => $template->render('reservation-data-search',['reservations_data'=>$reservations_data,
    'endPage'=> $endPage,'page'=>$page,'key'=>$key])
];
$template->view("layout-admin",$data);