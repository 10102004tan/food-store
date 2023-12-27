<?php
class Member extends Database
{

    public function register($username, $password, $email)
    {
        $hash_pw = password_hash($password, PASSWORD_DEFAULT);
        $sql = parent::$connection->prepare("INSERT INTO `members`(`username`, `password`, `email`) VALUES (?,?,?)");
        $sql->bind_param("sss", $username, $hash_pw, $email);
        return $sql->execute();
    }

    public function login($username, $password)
    {
        $sql = parent::$connection->prepare("SELECT * FROM `members` WHERE username = ?");
        $sql->bind_param("s", $username);
        $members = parent::select($sql);
        $status = -1; // false => login failed
        foreach ($members as $key => $member) {
            if (!empty($member)) {
                if (password_verify($password, $member["password"])) {
                    $token = hashUserInfo($member["username"], $member["password"], $member["id"]);
                    $this->saveToken($member["id"], $token); // Save token to database
                    $expires = time() + 86400;
                    setcookie('token', $token, $expires, '/');
                    setcookie('username', $member["username"], $expires, '/');
                    $status = $member["role"];
                    break;
                }
            }
        }

        return $status; // 0 => admin , 1 => user
    }

    public function saveToken($userId, $token)
    {
        $sql = parent::$connection->prepare("UPDATE `members` SET `token`= ? WHERE id = ?");
        $sql->bind_param("si", $token, $userId);
        return $sql->execute();
    }

    public function getUserByToken($token)
    {
        $sql = parent::$connection->prepare("SELECT * FROM `members` WHERE `token` = ?");
        $sql->bind_param("s", $token);
        return parent::select($sql)[0];
    }
}
