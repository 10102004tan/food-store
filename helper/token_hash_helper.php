<?php
function hashUserInfo($userId, $username, $password)
{
    $userInfoString = $userId . $username . $password;
    $hashedUserInfo = md5($userInfoString);
    return $hashedUserInfo;
}
