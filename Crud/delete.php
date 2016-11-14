<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 11/14/2016
 * Time: 7:44 PM
 */
require_once 'includes/Functions.php';
$database = new Functions();

if(isset($_GET["id"])){

    $id = trim($_GET["id"]);

    $database->Delete($id);
    header('location:index.php');
}
?>