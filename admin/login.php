<?php include('../config/constants.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Login Deepkundali</title>
</head>
<body>
    <div class="wrapper center border">
        <div>
            <div class="msg">
                <?php 
                    if (isset($_SESSION['login'])) {
                        echo $_SESSION['login']; //Dispalying Session Message
                        unset($_SESSION['login']); // Removing Session Message
                    }
                ?>
            </div>
            <br>
            <div class="form-container center bg-secondary-color">
                <form action="" method="POST" class=" bg-secondry-color primary-color shadow border">
                    <div class="form-group">
                        <label for="Username">Username </label><br>
                        <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password </label><br>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                    </div>
                <button type="submit" name="login" value="Update Admin" class="btn-primary secondry-color btn-border shadow-3">Login</button>
                </form>
            </div>
        </div>
    </div>
        <?php
            if(isset($_POST['login'])){
                //GET the data from form 
                $username = $_POST['username'];
                $password = md5($_POST['password']);
                //SQL query to get user datails from database 
                $sql = "SELECT * FROM loginadmin WHERE username= '$username' AND password= '$password'";
                //EXEcute the SQl query 
                $res = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($res);
                if ($row==TRUE){
                    $_SESSION['login'] = "Welcome $username ";
                    header('location:'.SITEURL."/admin");
                }
                else{
                    $_SESSION['login'] = "<div class='error'>Username & Password is Invalid !!</div>";
                    header('location:'.SITEURL."/admin/login.php");
                }
            }
                            
        ?>
</body>
</html>