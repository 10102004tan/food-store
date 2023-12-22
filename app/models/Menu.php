<?php 
class Menu extends Database {

    public function getAllMenu(){
        $sql = parent::$connection->prepare("SELECT * FROM `menus`");
        return parent::select($sql);
    }

    public function getAllMenuLimit($page,$perPage){
        $sql = parent::$connection->prepare("SELECT * FROM `menus`  ORDER by id DESC  limit ?,? ");
        $sql->bind_param("ii", $page, $perPage);
        return parent::select($sql);
    }

    public function getTotalMenu(){
        $sql = parent::$connection->prepare("select count(*) as 'total' FROM `menus`");
        return parent::select($sql)[0]['total'];
    }

    public function destroy($id){
        $sql = parent::$connection->prepare('DELETE FROM `menus` WHERE id = ?');
        $sql->bind_param("i",$id);
        return $sql->execute();
    }

    public function store($name,$description){
        $sql = parent::$connection->prepare("INSERT INTO `menus`(`name`, `description`) VALUES (?,?)");
        $sql->bind_param("ss", $name, $description);
        return $sql->execute();
    }

    public function getMenuById($id){
        $sql = parent::$connection->prepare("SELECT * FROM `menus`  where id = ?");
        $sql->bind_param("i",$id);
        return parent::select($sql)[0];
    }

    public function update($id,$name,$description){
        $sql = parent::$connection->prepare("UPDATE `menus` SET `name`= ?,`description`=? WHERE id = ?");
        $sql->bind_param("ssi",$name,$description,$id);
        return $sql->execute();
        
    }

    public function getAllMenuByKeyLimit($key,$page,$perPage){
        $sql = parent::$connection->prepare("SELECT * FROM `menus` WHERE name like ? limit ?,?");
        $key = "%" . $key ."%";
        $sql->bind_param("sii",$key,$page,$perPage);
        return parent::select($sql);
    }

    public function getTotalMenuByKey($key){
        $sql = parent::$connection->prepare("select count(*) as 'total' FROM `menus` WHERE name like ?");
        $key = "%" . $key ."%";
        $sql->bind_param("s",$key);
        return parent::select($sql)[0]['total'];
    }
}
