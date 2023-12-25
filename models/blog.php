<?php
require 'db.php';
class Blog extends Db
{
    public function createBlog($tieude, $noidung, $danhmuc,$hinh, $tacgia, $the)
    {
        $sql = self::$connection->prepare('INSERT INTO blog(tieude, noidung, danhmuc, hinh, tacgia, the) VALUE (?,?,?,?,?,?)');
        $sql->bind_param("ssssss", $tieude, $noidung, $danhmuc, $hinh, $tacgia,$the);
        $sql->execute();
    }
    public function updateBlog($id, $tieude, $noidung, $danhmuc, $hinh, $the, $tacgia)
    {
        if ($hinh == "") {
            $sql = self::$connection->prepare('UPDATE blog SET tieude = ?, noidung = ?, danhmuc = ?, the = ?, tacgia = ? where id = ?');
            $sql->bind_param("sssssi", $tieude, $noidung, $danhmuc, $the, $tacgia, $id);
            $sql->execute();
        } else {
            $sql = self::$connection->prepare('UPDATE blog SET tieude = ?, noidung = ?, danhmuc = ?, hinh = ?, the = ? , tacgia = ? where id = ?');
            $sql->bind_param("ssssssi", $tieude, $noidung, $danhmuc, $hinh, $the, $tacgia, $id);
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
        $sql = self::$connection->prepare("SELECT * FROM blog ORDER BY update_at DESC LIMIT $firstLink, $perPage");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getBlogByDanhMucPage($danhmuc, $page, $perPage){
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM blog where danhmuc like ? ORDER BY update_at DESC LIMIT $firstLink, $perPage");
        $sql->bind_param("s",$danhmuc);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getBlogByKeyWordPage($keyword, $page, $perPage){
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM blog where tieude like ? ORDER BY update_at DESC LIMIT $firstLink, $perPage");
        $keywordnew = '%'.$keyword.'%';
        $sql->bind_param("s",$keywordnew);
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
    public function getAllTag(){
        $sql = self::$connection->prepare('SELECT DISTINCT the FROM blog');
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getTotalBlogByTag($tag){
        $sql = self::$connection->prepare("SELECT COUNT(*) as 'get' FROM blog where the = ?");
        $sql->bind_param("s",$tag);
        $sql->execute();
        $result = $sql->get_result()->fetch_assoc();
        return $result['get'];
    } 
    public function getBlogByTagPage($tag, $page, $perPage){
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM blog where the = ? ORDER BY update_at DESC LIMIT $firstLink, $perPage");
        $sql->bind_param("s",$tag);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function createComment($id_blog, $comment, $macmt)
    {
        $sql = self::$connection->prepare('INSERT INTO comment(id_blog, comment, macmt) VALUE (?,?,?)');
        $sql->bind_param("sss", $id_blog, $comment, $macmt);
        $sql->execute();
    }
    public function getAllComment($id_blog)
    {
        $sql = self::$connection->prepare('SELECT * FROM comment where id_blog = ?');
        $sql->bind_param("i", $id_blog);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}
