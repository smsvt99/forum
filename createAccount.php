<?php

include 'connection.php';

if (isset($_POST['submit'])){

    // print_r($_POST);

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $posting = true;

    if (strlen($username) < 5 || strlen($username) > 16){
        echo "<li class='text-danger alerts'>User name must be 6-16 characters in length</li>";
        $posting = false;
    }

    if (strlen($password) < 5 || strlen($password) > 16){
        echo "<li class='text-danger alerts'>Password must be 6-16 characters in length</li>";
        $posting = false;
    }
    
    if (!preg_match('/[a-z]/', $password) ||
        !preg_match('/[A-Z]/', $password) || 
        !preg_match('/[0-9]/', $password)){
            echo "<li class='text-danger alerts'>Password must be a mixture of numbers, lowercase letters, and uppercase leters.</li>";
            $posting = false;
    }

    if (!preg_match('/\./', $email) ||
        !preg_match('/\@/', $email) ||
        strlen($email) < 10){
            echo "<li class='text-danger alerts'>Please enter a valid email address</li>";
            $posting = false;
        }

    $allUsers = mysqli_query($connection, 'SELECT * FROM userInfo');
    foreach($allUsers as $user){
        if ($user['email'] === $email){
            echo "<li class='text-danger alerts'>an account with that email address is already registered</li>";
            $posting = false;
        } if ($user['username'] === $username){
            echo "<li class='text-danger alerts'>an account with that username is already registered</li>";
            $posting = false;
        }
    }

    if ($connection){
        if ($posting){
            $query = "INSERT INTO userInfo(username, password, email) ";
            $query .= "VALUES ('$username', '$password', '$email')";
            
            $result = mysqli_query($connection, $query);
            
            if(!$result){
                die('query failed' . mysqli_error());
            } else {
                echo "<li class='alerts'>success! <a href='login.php'>Click here to log in</a></li>";
            }
        }
    } else {
        echo "<li class='text-danger alerts'>connection failed</li>";
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
<h1>Create an Account</h1>
</div>
<form action="createAccount.php" method="post" class="box">
<div class="form-group">
<label for="username">Username: </label>
<input name="username" id="username" type='text' class="form-control">
<br>
<label for="password">Password: </label>
<input name="password" id="password" type='password' class="form-control">
<br>
<label for="email">Email: </label>
<input name="email" id="email" type='text' class="form-control">
<br>
<input name="submit" type='submit' class="btn btn-primary btn-block">
<div>
</form>
</body>
</html>