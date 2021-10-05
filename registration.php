<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
<header>
    <div class="container">
        <div id="branding">
            <h1><span class="highlight">Writers </span>Online</h1>
        </div>

        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="login.php">Login</a></li>
                <li class="current"><a href="registration.php">Sign Up</a></li>
            </ul>
        </nav>
    </div>
</header>

<div class="wrapper">
    <div class="title">
        Register Here
    </div>

    <form class="form" method="post">

        <div class="input_field">
            <label>Username</label>
            <input type="text" class="input" name="username" autofocus="true" required>
        </div>

        <div class="input_field">
            <label>Email</label>
            <input type="text" class="input" name="email" required>
        </div>

        <div class="input_field">
            <label>Password</label>
            <input type="password" class="input" name="password" required>
        </div>

        <div class="input_field_1">
            <input type="submit" value="Register" name="submit" class="btn">
        </div>

        <div class="login-link_1"><p class="link">Already have an account? <a href="login.php">Login here</a></p>
        </div>

    </form>

</div>

    <footer>
    <div class="container">
        <div class="sec fantastic">
            <h2>Writers-Online</h2>
            <p>An Online Writing Platform</p>
            <ul class="sci">
            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
        </ul> 
        <div class="Copyright">
            <p>Copyright © 2020 Writers-Online.</p>
        </div>
        
        </div>
        <div class="sec quicklinks">
            <h2>Quick Links</h2>
            <ul>
                <li><a href="about.html">About Us</a></li>
                <li><a href="pricing.html">Pricing</a></li>
                <li><a href="privacy.html">Privacy Policy</a></li>
            </ul>
        </div>
        <div class="sec contact">
            <h2>Contact Info</h2>
            <ul class="info">
                <li>
                    <span><i class="fas fa-map-marker-alt"></i></span>
                    <span>00604 Lower Kabete
                        Wangige, 00614,<br>Kenya</span>
                </li>
                <li>
                    <span><i class="fas fa-phone"></i></span>
                    <p><a href="tel:0729009610">+254 729 009 610</a><br>
                        <a href="tel:0729009610">+254 729 009 610</a></p>
                </li>
                <li>
                <span><i class="fas fa-envelope"></i></span>
                <p><a href="mailto:knowmore@email.com">drehfusion@gmail.com</a></p> 
                </li>
            </ul>
        </div>
    </div>
</footer>
<?php
    }
?>
</body>
</html>
