<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 11/14/2016
 * Time: 7:51 PM
 */
    require_once 'includes/Functions.php';
    $database = new Functions();


    if(isset($_GET["id"])){

        $id = trim($_GET["id"]);
    }

    $id = intval($_GET["id"]);

    if(isset($_POST["submit"])){

        $firstname = trim($_POST["firstname"]);
        $lastname = trim($_POST["lastname"]);
        $email = trim($_POST["email"]);

        $result = $database->UpdateUser($id,$firstname,$lastname,$email);

        if($result != TRUE){

            header('location:index.php');

        }

    }else{
        $get = $database->GetSingleUser($id);

        if($get){

            $firstname = $get["firstname"];
            $lastname = $get["lastname"];
            $email = $get["email"];

        }
    }
?>

<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<div class="container">
    <h3>Edit User</h3>
    <form method="post">
        <div class="form-group">
            <label>First Name</label>
            <input type="text" class="form-control" name="firstname" value="<?php echo htmlentities($firstname); ?>"/>
        </div>

        <div class="form-group">
            <label>Last Name</label>
            <input type="text" class="form-control" name="lastname" value="<?php echo htmlentities($lastname); ?>"/>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email" value="<?php echo htmlentities($email); ?>"/>
        </div>
        <button class="btn btn-success" name="submit">Edit</button>
    </form>
</div>
</html>


