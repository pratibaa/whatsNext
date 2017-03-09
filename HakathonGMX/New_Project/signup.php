<?php
session_start();

//connect to db
$db = mysqli_connect("localhost", "root", "", "signup");
 
 if (isset($_POST['signup'])) {
    session_start();
    $username = mysql_real_escape_string($_POST['username']);
    $email = mysql_real_escape_string($_POST['email']);
    $password = mysql_real_escape_string($_POST['password']);
    $password2 = mysql_real_escape_string($_POST['password2']);

      if($password == $password2) {
        //create user
        $password = md5($password);//hash password before storing for security purpose
        $sql = "INSERT INTO signup(username, email, password) VALUES ('$username', '$email', '$password')";
        mysqli_query($db, $sql);
        $_SESSION['message'] = "You are now logged in";
        $_SESSION['username'] = $username;
        header("location: home.php"); //redirect to home page
    }else{
        $_SESSION['message'] = "The two passwords do not match";

    }
 }


?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Signup</title>
	<link rel="stylesheet" type="text/css" href="signup.css">
		
            
</head>
<body>
    <div class="login-page">
        <div class="login-container">
            <h1><img src="assets/what_next.jpg"alt="What Next???"/></h1>
            <form class="login-form" method="post" action="signup.php">
                <input id="login-username-continer" type="text" name="username" placeholder="Username" />
                <input id="login-username-continer" type="email" name="email" placeholder="Email" />
                <input id="login-username-continer" type="password" name="password" placeholder="Password" />
                <input id="login-password-continer" type="password" name="password2" placeholder="Conform Password" />
                <input type="submit" value="signup" name="signup">
               
            </form>
        </div>
    </div>
</body>


</html>


