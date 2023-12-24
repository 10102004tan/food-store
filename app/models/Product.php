<?php
class Product extends Database
{

    public function getTotalProduct()
    {
        $sql = parent::$connection->prepare("SELECT count(*) as 'total' FROM `products`");
        return parent::select($sql)[0]['total'];
    }

    public function getAllProductLimit($page, $perPage)
    {
        $sql = parent::$connection->prepare("SELECT products.*, menus.name as 'menu_name' FROM `products` inner join menus on products.menu_id = menus.id  GROUP BY products.id DESC LIMIT ?,?;");
        $sql->bind_param('ii', $page, $perPage);
        return parent::select($sql);
    }

    public function getProductById($id)
    {
        $sql = parent::$connection->prepare("SELECT products.*, GROUP_CONCAT(product_images.name SEPARATOR '~')  as 'images' FROM `products` inner join product_images on product_images.product_id = products.id where products.id = ?");
        $sql->bind_param('i', $id);
        return parent::select($sql)[0];
    }

    public function store($name, $descripton, $price, $imageHashName, $menu_id)
    {
        $sql = parent::$connection->prepare('INSERT INTO `products`(`menu_id`, `image`, `name`, `description`, `price`) VALUES (?,?,?,?,?)');
        $sql->bind_param('isssi', $menu_id, $imageHashName, $name, $descripton, $price);
        return $sql->execute();
    }

    public function updateImageMain($id, $imageFoodNew)
    {
        $sql = parent::$connection->prepare('UPDATE `products` SET `image`= ? WHERE id = ?');
        $sql->bind_param('si', $imageFoodNew, $id);
        return $sql->execute();
    }


    public function getImagesProductById($id)
    {
        $sql = parent::$connection->prepare('SELECT product_images.name FROM `products` INNER JOIN product_images on products.id = product_images.product_id where products.id = ?');
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }

    public function update($id, $name, $description, $price, $menu_id, $imagesFoodHash)
    {
        $sql = parent::$connection->prepare('UPDATE `products` SET `menu_id`=?,`name`=?,`description`=?,`price`=? WHERE id = ?');
        $sql->bind_param("issii", $menu_id, $name, $description, $price, $id);
        $sql->execute();


        if (count($imagesFoodHash) > 0) {
            $sql = parent::$connection->prepare("DELETE FROM `product_images` WHERE product_id = ?");
            $sql->bind_param("i", $id);
            $sql->execute();
            $insertedImages = [];
            for ($i = 0; $i < count($imagesFoodHash); $i++) {
                array_push($insertedImages, $imagesFoodHash[$i], $id);
            }
            $values = str_repeat("(?,?),", (count($imagesFoodHash) - 1)) . "(?,?)";
            $type = str_repeat("si", count($imagesFoodHash));
            $sql = parent::$connection->prepare("INSERT INTO `product_images`(`name`, `product_id`) VALUES $values");
            $sql->bind_param($type, ...$insertedImages);
            return $sql->execute();
        }
    }

    public function destroy($id)
    {
        $sql = parent::$connection->prepare("DELETE FROM `product_images` WHERE product_id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();

        $sql = parent::$connection->prepare("DELETE FROM `product_comments` WHERE product_id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();

        $sql = parent::$connection->prepare("DELETE FROM `products` WHERE id = ?");
        $sql->bind_param("i", $id);
        return $sql->execute();
    }

    public function getTotalProductByKey($key)
    {
        $sql = parent::$connection->prepare("SELECT count(*) as total FROM `products` inner join menus on products.menu_id = menus.id where products.name like ? or products.id = ? or products.description like ?");
        $str_key = "%" . $key . "%";
        $sql->bind_param('sis', $str_key, $key, $str_key);
        return !empty($result) ? $result[0]['total'] : 0;
    }

    public function getAllProductByKeyLimit($key, $page, $perPage)
    {
        $sql = parent::$connection->prepare("SELECT products.*, menus.name as 'menu_name' FROM `products` inner join menus on products.menu_id = menus.id where products.name like ? or products.id = ? or products.description like ? LIMIT ?,?");
        $str_key = "%" . $key . "%";
        $sql->bind_param('sisii', $str_key, $key, $str_key, $page, $perPage);
        return parent::select($sql);
    }



    public function getAllProductInMenu($menu)
    {
        $sql = parent::$connection->prepare("SELECT products.*  FROM `products` INNER JOIN menus on menus.id = menu_id WHERE menus.name = ?");
        $sql->bind_param("s", $menu);
        return parent::select($sql);
    }
}
