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
}
?>