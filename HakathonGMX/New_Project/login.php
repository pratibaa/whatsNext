<?php
session_start();

//connect to db
$db = mysqli_connect("localhost", "root", "", "signup");
 
 if (isset($_POST['login'])) {
    session_start();
    $username = mysql_real_escape_string($_POST['username']);
    
    $password = mysql_real_escape_string($_POST['password']);
   
    $password = md5($password); //remember we hashed password before storing
    $sql = "SELECT * FROM signup WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['message'] = "You are now logged in";
        $_SESSION['username'] = $username;
        header("location: home.php"); //redirect to home page
    }else{
        $_SESSION['message'] = "username/password combination incorrect";
    }
      
 }


?>


<!DOCTYPE HTML>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="signup.css">
        
            
</head>
<body>
    <div class="login-page">
        <div class="login-container">
            <h1><img src="assets/what_next.jpg"alt="What Next???"/></h1>
            <form class="login-form" method="post" action="login.php">
                <input id="login-username-continer" type="text" name="username" placeholder="Username" />
               
                <input id="login-username-continer" type="password" name="password" placeholder="Password" />
                
                <input type="submit" value="login" name="login">
                <p>CREATE AN ACCOUNT?<a href="signup.php">Click Here!</p>
               
            </form>
        </div>
    </div>
</body>


</html>


