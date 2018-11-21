<?php

include 'connection.php';

if (isset($_POST['submit'])){
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if(!$username && !$password){
        echo "please fill both fields";
    } else {

        if($connection){
            $query = "SELECT * FROM userInfo";

            $result = mysqli_query($connection, $query);
                    //below returns an assoc. array
            while($row = mysqli_fetch_row($result)){

            }
        } else {
        die('connection failed');
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
<div>
</form>
</body>
</html>