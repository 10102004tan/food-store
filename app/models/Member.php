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
                    $expires = time() + 86400;
                    setcookie('username', $username, $expires, '/');
                    setcookie('password', $password, $expires, '/');
                    $status = $member["role"];
                    break;
                }
            }
        }

        return $status; // 0 => admin , 1 => user
    }
}
