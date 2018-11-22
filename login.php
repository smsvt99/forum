<?php

include 'connection.php';

if (isset($_POST['submit'])){
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $usernameFound = false;
    
    if(!$username && !$password){
        echo "<li class='text-danger'>Please fill both fields</li>";
    } else {

        if($connection){
            $query = "SELECT * FROM userInfo";

            $allUsers = mysqli_query($connection, $query);
                    //below returns an assoc. array
            
            foreach($allUsers as $user){
                if ($user['username'] === $username && $user['password'] === $password){
                    echo '<li class="text-primary">login successful</li>';
                } else if ($user['username'] === $username && $user['password'] !== $password){
                    echo '<li class="text-danger">password incorrect, try again</li>';
                    $usernameFound = true;
                }
            }
            if(!$usernameFound){
                echo '<li class="text-danger">username not found</li>';
            }
        } else {
        die('connection failed');
        }
    }
}

?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="./style.css">
    </head>
    <body>
        <div class='text-center'>
            <h1>Login</h1>
        </div>
        <form action="login.php" method="post" class="box"> 
            <div class="form-group">
                <label for="username">Username: </label>
                <input name="username" id="username" type='text' class="form-control">
                <br>
                <label for="password">Password: </label>
                <input name="password" id="password" type='password' class="form-control">
                <br>
                <input name="submit" type='submit' class="btn btn-primary btn-block">
                <a href="forgotPassword.php"><p>Forgot your password?</p></a>
            </div>
        </form>
    </body>
</html>