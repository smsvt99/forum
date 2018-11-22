<?php
        include 'connection.php';
    if (isset($_POST['submit'])){
        // echo "If an account with this email address exists, you will be emailed your password";

        $email = $_POST['email'];
        $query = 'SELECT * FROM userInfo';
        $addresses = mysqli_query($connection, $query);
        
        if (!$addresses){
            echo "no addresses";
        }
        
        foreach($addresses as $user){
            if ($user['email'] === $email){
                
                $message = mail($user['email'], "Lost Password", "Hello, " . $user['username'] . "\n\n. Your password is " . $user['password'] . ". \n For security reasons, it is recommended that you reset it after logging in.", 'From: forumProject@example.com');

                if ($message){
                    echo "email successful";
                } else {
                    echo "email failed";
                }
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
            <h1>Forgot your password?</h1>
            <p>Enter your email address below.
        </div>
        <form action="forgotPassword.php" method="post" class="box"> 
            <div class="form-group">
                <label for="email">Email: </label>
                <input name="email" id="email" type='text' class="form-control">
                <br>
                <input name="submit" type='submit' class="btn btn-primary btn-block">      
            </div>
        </form>
    </body>
</html>