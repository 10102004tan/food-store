<?php
class Reservation extends Database{

    public function setPlace($date,$people,$name,$phone,$email){
        $sql = parent::$connection->prepare("INSERT INTO `reservation`(`date`, `people`, `name`, `phone`, `email`) VALUES (?,?,?,?,?)");
        $sql->bind_param("sisss",$date,$people,$name,$phone,$email);
        return $sql->execute();
    }

    public function getAllReservationsLimit($page,$perPage){
        $sql = parent::$connection->prepare("SELECT * FROM `reservation` GROUP BY id DESC limit ?,?");
        $sql->bind_param("ii",$page,$perPage);
        return parent::select($sql);
    }

    public function getAllTotalReservations(){
        $sql = parent::$connection->prepare("SELECT count(*) as 'total' FROM `reservation` ");
        return parent::select($sql)[0]['total'];
    }

    public function getReservationById($id){
        $sql = parent::$connection->prepare("SELECT * FROM `reservation` WHERE id = ?");
        $sql->bind_param("i",$id);
        return parent::select($sql)[0];
    }

    public function updateStatusReservation($id,$status){
        $sql = parent::$connection->prepare("UPDATE `reservation` SET `status`= ? WHERE id = ?");
        $sql->bind_param("ii",$status,$id);
        return $sql->execute();
    }


    public function getAllReservationsLimitByKey($key,$page,$perPage){
        $sql = parent::$connection->prepare("SELECT * FROM `reservation` WHERE date like ? or  name like ?  limit ?,?");
        $key = "%" .$key . "%";
        $sql->bind_param("ssii",$key,$key,$page,$perPage);
        return parent::select($sql);
    }

    public function getAllTotalReservationsByKey($key){
        $sql = parent::$connection->prepare("SELECT count(*) as 'total' FROM `reservation` WHERE date like ? or name like ? ");
        $key = "%" .$key . "%";
        $sql->bind_param("ss",$key,$key);
        return parent::select($sql)[0]['total'];
    }


    
}