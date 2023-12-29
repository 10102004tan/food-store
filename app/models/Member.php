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
        $status = -2; // false => login failed
        foreach ($members as $key => $member) {
            if (!empty($member)) {
                if (password_verify($password, $member["password"])) {

                    if ($member['role'] == 0) {
                        $status = 1;
                        $expires = time() + 86400;
                        setcookie('username', $username, $expires, '/');
                        setcookie('password', $password, $expires, '/');
                    } else if ($member['role'] == 1) {
                        if ($member['status'] == 0) {
                            $status = -1;
                        } else {
                            $status = 0;
                            $expires = time() + 86400;
                            setcookie('username', $username, $expires, '/');
                            setcookie('password', $password, $expires, '/');
                        }
                    }
                    break;
                }
            }
        }

        //status : 
        /*
        - -2 no account
        - -1 accoutn no veri
        -  0 account user
        -  1 accout admin
        */
        return $status;

    }

    public function checkUsername($username)
    {
        $sql = parent::$connection->prepare("SELECT * FROM members where username = ?");
        $sql->bind_param("s", $username);
        return count(parent::select($sql));
    }

    public function getMemberByUsername($username)
    {
        $sql = parent::$connection->prepare("SELECT * FROM members where username = ?");
        $sql->bind_param("s", $username);
        if (count(parent::select($sql)) > 0)
            return parent::select($sql)[0];
    }

    public function insertCodeToMember($code, $username)
    {
        $sql = parent::$connection->prepare("UPDATE `members` SET `code`= ? WHERE username = ?");
        $sql->bind_param("is", $code, $username);
        return $sql->execute();
    }

    public function updatePassword($username, $password)
    {
        $sql = parent::$connection->prepare("UPDATE `members` SET `password`= ? WHERE username = ?");
        $sql->bind_param("ss", $password, $username);
        return $sql->execute();
    }

    public function checkEmail($email, $username)
    {
        $sql = parent::$connection->prepare("SELECT email,username,`status` from members");
        $emails = parent::select($sql);
        foreach ($emails as $item) {
            if ($item['email'] == $email || $item['username'] == $username) {
                return $item['status'];
            }

        }
        return -1;

    }
    public function activeMember($username)
    {
        $sql = parent::$connection->prepare("UPDATE `members` SET `status`= 1 WHERE username = ?");
        $sql->bind_param("s", $username);
        return $sql->execute();
    }
}

