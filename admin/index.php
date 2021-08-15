<?php

if(!isset($_SESSION)) {
    session_start();
}

require_once("config.php");

if(isset($_SESSION["admin"])) {
    header('Location: '.$uri.'/admin/dashboard');
}

if(isset($_POST['login'])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM admin WHERE username=:username OR email=:email";
    $stmt = $db->prepare($sql);
    
    $params = array(
        ":username" => $username,
        ":email" => $username
    );

    $stmt->execute($params);

    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if($admin){
        if(password_verify($password, $admin["password"])){
            session_start();
            $_SESSION["admin"] = $admin;
            header('Location: '.$uri.'/admin/dashboard');
        } else {
            echo "<h3><font color=red><center>Password Salah!</center></font></h3>";
        }
    }
}

?>

<!DOCTYPE html>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://tugas.mineversal.com/user/assets/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="https://tugas.mineversal.com/user/framework/css/bootstrap.min.css"/>
    <link href='https://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <head>
        <link rel="shortcut icon" href="https://tugas.mineversal.com/user/assets/img/logo1.png"/>
        <title>Mineversal | Admin Login</title>
        <style>
            body, html {
                height: 100%;
                font-family: 'Alegreya';
                font-size: 18.6px;
                scroll-behavior: smooth;
            }
            .login-bg-image {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                height: 100%;
                background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(https://tugas.mineversal.com/user/assets/img/bg3.jpg) no-repeat;
                background-position: center;
                background-size: cover;
                position: relative;
                margin: 0;
                padding: 0;
            }
            .cancelbtn, .cancelbtn:hover {
                color: white;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <div id="login" class="login-bg-image">
            <br>
            <br>
            <br>
            <br>
            <form class="login-content animate col-md-4 my-auto mx-auto text-left" method="POST" action="">
                <div class="login-imgcontainer">
                    <a href="https://tugas.mineversal.com/" class="close" title="Close Modal">&times;</a>
                    <img src="https://tugas.mineversal.com/user/assets/img/logo.png" height="35" alt="logo">
                </div>
                <div class="login-container">
                    <label for="email"><b>Email or Username</b></label>
                    <div class="input-container">
                        <i class="fa fa-envelope icon"></i>
                        <input type="text" placeholder="Enter Email or Username" name="username" required>
                    </div>
                    <label for="psw"><b>Password</b></label>
                    <div class="input-container">
                        <i class="fa fa-key icon"></i>
                        <input type="password" placeholder="Enter Password" name="password" required>
                    </div>
                    <button class="submitlog-btn" type="submit" name="login">Login</button>
                    <label>
                        <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                </div>
                <div class="login-container" style="background-color:#f1f1f1">
                    <a type="button" href="https://tugas.mineversal.com/" class="cancelbtn">Cancel</a>
                    <span class="psw">Forgot <a href="#">password?</a></span>
                </div>
            </form>
        </div>
    </body>
</html>