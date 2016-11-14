<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 11/14/2016
 * Time: 3:04 PM
 */

require_once 'includes/Functions.php';
$database = new Functions();
$message = "";

$result = $database->GetAllUser();



if(isset($_POST["submit"])){

    $firstname = trim($_POST["firstname"]);
    $lastname = trim($_POST["lastname"]);
    $email = trim($_POST["email"]);

    if($database->CheckUser($email)){

        $message = "Email already used";
    }else{

        $user = $database->AddUser($firstname,$lastname,$email);
        if($user != TRUE){

           header('location:index.php');
            exit();
        }else{
            $message = "Unable to insert user, there is something error in the server.";
        }
    }
}
?>

<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

<div class="jumbotron text-center">
    <h2>My Crud Application with bootstrap</h2>
    <p>Create,Read,Update and Delete</p>
</div>

    <!-- Trigger the modal with a button -->
    <div class="container">

        <p>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i> Add</button>
        </p>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Create new User</h4><br>
                        <h4><?php echo $message; ?></h4>
                    </div>
                    <div class="modal-body">
                        <form method="post">

                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="firstname" required/>
                            </div>

                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="lastname" required/>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" required/>
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-warning" name="submit">Save</button>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>


    <div class="container">

        <?php if(count($result)>0): ?>


        <table class="table table-striped">
            <thead>
            <tr>

                <th>Id</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($result as $row): ?>
            <tr>

                <td><?php echo htmlentities($row["id"])?></td>
                <td><?php echo htmlentities($row["firstname"])?></td>
                <td><?php echo htmlentities($row["lastname"])?></td>
                <td><?php echo htmlentities($row["email"])?></td>
                <td>
                    <a class="btn btn-success" href="edit.php?id=<?php echo htmlentities($row["id"]);?>" onclick="return confirm('are you sure you want to edit?');"><i class="glyphicon glyphicon-edit"></i></a>

                    <a class="btn btn-danger" href="delete.php?id=<?php echo htmlentities($row["id"]);?>" onclick="return confirm('are you sure you want to delete?');"><i class="glyphicon glyphicon-remove"></i></a>
                </td>
            </tr>
            </tbody>
            <?php endforeach ?>
        </table>

        <?php endif ?>
    </div>
</html>
