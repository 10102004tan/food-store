<?php
include '../../config/database.php';

$member = new Member();
if (isset($_COOKIE["username"]) && isset($_COOKIE["password"])) {
    $username = $_COOKIE["username"];
    $password = $_COOKIE["password"];
    $status = $member->login($username, $password);
    if ($status != 0) { // Double check if not admin
        header("location: index.php");
        exit();
    }
} else {
    header("location: index.php");
}


$template = new Template();
$reservation = new Reservation();
$page = 1;
$perPage = 5;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
$total = $reservation->getAllTotalReservations();
$reservations_data = $reservation->getAllReservationsLimit(($page - 1) * $perPage, $perPage);
$endPage = ceil($total / $perPage);
$data = [
    'title' => 'Manage Reservation',
    'slot' => $template->render('reservation-data', ['reservations_data' => $reservations_data, 'endPage' => $endPage, 'page' => $page])
];
$template->view("layout-admin", $data);
