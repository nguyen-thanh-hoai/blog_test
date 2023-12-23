<?php
require 'db.php';
class User extends Db
{
    public function register($email, $password, $vitri)
    {
        $sql = self::$connection->prepare("INSERT INTO user (email, matkhau, vitri) VALUE (?,?,?)");
        $sql->bind_param("sss", $email, $password, $vitri);
        $sql->execute();
    }
    public function login($email, $password)
    {
        $sql = self::$connection->prepare("SELECT COUNT(*) as 'get' FROM user WHERE `email`=? AND `matkhau`=?");
        $sql->bind_param("ss", $email, $password);
        $sql->execute();
        $result = $sql->get_result()->fetch_assoc();
        return $result['get'];
    }
    public function getPassword($email)
    {
        $sql = self::$connection->prepare('SELECT * FROM user where email = ?');
        $sql->bind_param("s", $email);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getUserByEmail($email)
    {
        $sql = self::$connection->prepare('SELECT * FROM user where email = ?');
        $sql->bind_param("s", $email);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function checkEmail($email)
    {
        $sql = self::$connection->prepare("SELECT COUNT(*) as 'get' FROM user WHERE `email`=?");
        $sql->bind_param("s", $email);
        $sql->execute();
        $result = $sql->get_result()->fetch_assoc();
        return $result['get'];
    }
    public function updatePassword($email, $password)
    {
        $sql = self::$connection->prepare("UPDATE user set matkhau = ? where email = ?");
        $sql->bind_param('ss', $password, $email);
        $sql->execute();
    }
    public function getAllUser()
    {
        $sql = self::$connection->prepare("SELECT * FROM user");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function delete($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `user` WHERE `id` = ?");
        $sql->bind_param("i", $id);
        return $sql->execute();
    }
    public function updateUser($email, $password, $vitri, $id)
    {
        if ($password != '') {
            $sql = self::$connection->prepare("UPDATE `user` set email = ?, matkhau = ?, vitri = ? WHERE `id` = ?");
            $sql->bind_param("sssi",$email, $password, $vitri,$id);
            return $sql->execute();
        }
        else{
            $sql = self::$connection->prepare("UPDATE `user` set email = ?, vitri = ?  WHERE `id` = ?");
            $sql->bind_param("ssi",$email, $vitri , $id);
            return $sql->execute();
        }
    }
    public function getUserById($id)
    {
        $sql = self::$connection->prepare('SELECT * FROM user where id = ?');
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getUserByKeyWord($keyword)
    {
        $sql = self::$connection->prepare('SELECT * FROM user where email like ?');
        $keywordNew = '%'.$keyword.'%';
        $sql->bind_param("s", $keywordNew);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getTotalUser(){
        $sql = self::$connection->prepare("SELECT COUNT(*) as 'get' FROM user");
        $sql->execute();
        $result = $sql->get_result()->fetch_assoc();
        return $result['get'];
    } 
    public function getTotalUserByKeyWord($keyword){
        $sql = self::$connection->prepare("SELECT COUNT(*) as 'get' FROM user where email like ?");
        $keywordnew = '%'.$keyword.'%';
        $sql->bind_param("s",$keywordnew);
        $sql->execute();
        $result = $sql->get_result()->fetch_assoc();
        return $result['get'];
    } 
    public function getUSerByKeyWordPage($keyword, $page, $perPage){
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM user where email like ? ORDER BY update_at DESC LIMIT $firstLink, $perPage");
        $keywordnew = '%'.$keyword.'%';
        $sql->bind_param("s",$keywordnew);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getRole(){
        $sql = self::$connection->prepare('SELECT * FROM `role`');
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}
