<?php

/**
 * Created by PhpStorm.
 * User: asus
 * Date: 11/14/2016
 * Time: 5:53 PM
 */
class Connect{

    private $conn;


    function __construct(){

    }

    function connect(){

        $this->conn = new PDO('mysql:host=localhost;dbname=images','root','');
        return $this->conn;

    }

}