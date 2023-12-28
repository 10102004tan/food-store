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

    public function checkUsername($username){
        $sql = parent::$connection->prepare("SELECT * FROM members where username = ?");
        $sql->bind_param("s", $username);
        return count(parent::select($sql));
    }

    public function getMemberByUsername($username) {
        $sql = parent::$connection->prepare("SELECT * FROM members where username = ?");
        $sql->bind_param("s", $username);
        return parent::select($sql)[0];
    }

    public function insertCodeToMember($code,$username) {
        $sql = parent::$connection->prepare("UPDATE `members` SET `code`= ? WHERE username = ?");
        $sql->bind_param("is",$code,$username);
        return $sql->execute();
    }

    public function updatePassword($username,$password)
    {
        $sql = parent::$connection->prepare("UPDATE `members` SET `password`= ? WHERE username = ?");
        $sql->bind_param("ss",$password,$username);
        return $sql->execute();
    }

    public function checkEmail($email,$username){
        $sql = parent::$connection->prepare("SELECT email,username from members");
        $emails = parent::select($sql);
        foreach ($emails as $item) {
            if ($item['email'] == $email || $item['username'] == $username){
                return false;
            }

        }

        return true;
        
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

