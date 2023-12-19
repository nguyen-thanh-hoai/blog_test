<?php
class User extends Db{
    public function register($email, $password){
        $sql = self::$connection->prepare("INSERT INTO user (email, matkhau) VALUE (?,?)");
        $sql->bind_param("ss", $email, $password);
        $sql->execute();
    }
    public function login($email, $password){
        $sql = self::$connection->prepare("SELECT COUNT(*) as 'get' FROM user WHERE `email`=? AND `matkhau`=?");
        $sql->bind_param("ss", $email, $password);
        $sql->execute();
        $result = $sql->get_result()->fetch_assoc();
        return $result['get'];
    }
    public function getPassword($email){
        $sql = self::$connection->prepare('SELECT * FROM user where email = ?');
        $sql->bind_param("s", $email);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}
?>