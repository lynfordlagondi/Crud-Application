<?php

/**
 * Created by PhpStorm.
 * User: asus
 * Date: 11/14/2016
 * Time: 5:56 PM
 */
class Functions{

    private $conn;

    function __construct(){

        require_once 'Connect.php';
        $database = new Connect();
        $this->conn = $database->connect();
    }

    /**
     * Add User
     */
    public function AddUser($firstname,$lastname,$email){

        $sql = "INSERT INTO user(firstname,lastname,email)VALUES (?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array($firstname,$lastname,$email));
        $result = $stmt->fetch();
        return $result;

    }

    /**
     * Check User
     * @param $email
     */
    public function CheckUser($email){

        $sql = "SELECT * FROM user WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array($email));
        $result = $stmt->fetch();
        return $result;
    }

    /**
     * get all users
     */
    public function GetAllUser(){

        $sql = "SELECT * FROM user";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    /**
     * delete
     */
    public function Delete($id){

        $sql = "DELETE FROM user WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array($id));
        $result = $stmt->fetch();
        return $result;
    }

    /**
     * get single user
     */
    public function GetSingleUser($id){

        $sql = "SELECT * FROM user WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array($id));
        $result = $stmt->fetch();
        return $result;
    }

    /**
     * Update User
     */
    public function UpdateUser($id,$firstname,$lastname,$email){

        $sql = "UPDATE user SET firstname = ?, lastname = ?, email = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array($firstname,$lastname,$email,$id));
        $result = $stmt->fetch();
        return $result;
    }
}