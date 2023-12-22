<?php
class Member extends Database {

    public function register($username,$password,$email) {
        $hash_pw = password_hash($password,PASSWORD_DEFAULT);
        $sql = parent::$connection->prepare("INSERT INTO `members`(`username`, `password`, `email`) VALUES (?,?,?)");
        $sql->bind_param("sss",$username,$hash_pw,$email);
        return $sql->execute();
    }

    public function login($username,$password) {
        $sql = parent::$connection->prepare("SELECT * FROM `members` WHERE username = ?");
        $sql->bind_param("s",$username);
        $member = parent::select($sql)[0];
        $status = -1;
        if (!empty($member)) {
            if (password_verify($password,$member["password"])) {
                $status = $member['role'];
            }
        }

        return $status;
    }
}