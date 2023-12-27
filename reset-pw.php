<?php
// Kiểm tra xem token có hợp lệ không
$member = new Member();
$token;
$username;
if($member->checkToken($username,$token)) {
    //chuyen sang trang doi mk
} else {
   //thong tin sai
}
?>
