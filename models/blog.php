<?php
require 'db.php';
class Blog extends Db
{
    public function createBlog($tieude, $noidung, $danhmuc,$hinh, $tacgia)
    {
        $sql = self::$connection->prepare('INSERT INTO blog(tieude, noidung, danhmuc, hinh, tacgia) VALUE (?,?,?,?,?)');
        $sql->bind_param("sssss", $tieude, $noidung, $danhmuc, $hinh, $tacgia);
        $sql->execute();
    }
    public function updateBlog($id, $tieude, $noidung, $danhmuc, $hinh)
    {
        if ($hinh == "") {
            $sql = self::$connection->prepare('UPDATE blog SET tieude = ?, noidung = ?, danhmuc = ? where id = ?');
            $sql->bind_param("sssi", $tieude, $noidung, $danhmuc, $id);
            $sql->execute();
        } else {
            $sql = self::$connection->prepare('UPDATE blog SET tieude = ?, noidung = ?, danhmuc = ?, hinh = ? where id = ?');
            $sql->bind_param("ssssi", $tieude, $noidung, $danhmuc, $hinh, $id);
            $sql->execute();
        }
    }
    public function getAllBlog()
    {
        $sql = self::$connection->prepare('SELECT * FROM blog');
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function delete($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `blog` WHERE `id` = ?");
        $sql->bind_param("i", $id);
        return $sql->execute();
    }
    public function getBlogById($id)
    {
        $sql = self::$connection->prepare('SELECT * FROM blog where id = ?');
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getBlogByKeyWord($keyword){
        $sql = self::$connection->prepare("SELECT * FROM blog where tieude like ?");
        $keywordnew = '%'.$keyword.'%';
        $sql->bind_param("s",$keywordnew);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getBlogByDanhMuc($danhmuc){
        $sql = self::$connection->prepare("SELECT * FROM blog where danhmuc like ?");
        $sql->bind_param("s",$danhmuc);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    function getBlogByPage($page, $perPage)
    {
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM blog LIMIT $firstLink, $perPage");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getTotalBlog(){
        $sql = self::$connection->prepare("SELECT COUNT(*) as 'get' FROM blog");
        $sql->execute();
        $result = $sql->get_result()->fetch_assoc();
        return $result['get'];
    }
    public function getTotalBlogByKeyWord($keyword){
        $sql = self::$connection->prepare("SELECT COUNT(*) as 'get' FROM blog where tieude like ?");
        $keywordnew = '%'.$keyword.'%';
        $sql->bind_param("s",$keywordnew);
        $sql->execute();
        $result = $sql->get_result()->fetch_assoc();
        return $result['get'];
    } 
    public function getDanhMuc(){
        $sql = self::$connection->prepare('SELECT DISTINCT danhmuc FROM blog');
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getTotalBlogByDanhMuc($danhmuc){
        $sql = self::$connection->prepare("SELECT COUNT(*) as 'get' FROM blog where danhmuc like ?");
        $sql->bind_param("s",$danhmuc);
        $sql->execute();
        $result = $sql->get_result()->fetch_assoc();
        return $result['get'];
    }
}
