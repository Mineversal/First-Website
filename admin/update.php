<?php

require_once("auth.php");

include_once("includes/config.php");

$id = $_SESSION['admin']['id'];

$result = mysqli_query($kon, "SELECT * FROM admin WHERE id='$id'");

if ($query === FALSE) {
    die(mysqli_error());
} else {
    while($user_data = mysqli_fetch_array($result)) {
        $nama = $user_data['name'];
        $emails = $user_data['email'];
        $uname = $user_data['username'];
    }
}

if(isset($_POST['submit'])) {
    include_once("config.php");
    $id = $_POST['id'];
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = strtolower(stripslashes(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)));
    $email = strtolower(stripslashes(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)));

    if ($username == $uname) {
        $sql = "SELECT * FROM admin WHERE email=:email";
        $stmt = $db->prepare($sql);
    
        $params = array(
            ":email" => $email
        );

        $stmt->execute($params);

        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if($admin) {
            $error_same = "Email Sudah Terdaftar. Silahkan Gunakan Email yang lain";
        } else {
            $sql = "UPDATE admin SET name=:name, email=:email, username=:username WHERE id=:id";
            $stmt = $db->prepare($sql);
            $params = array(":name" => $name, ":username" => $username, ":id" => $id, ":email" => $email);
            $saved = $stmt->execute($params);
            if($saved) {
                $msg_reg = "Datamu berhasil diupdate!";
            } else {
                $error_reg = "Sepertinya ada yang salah, silahkan coba lagi.";    
            }
        }
    } else if ($email == $emails) {
        $sql = "SELECT * FROM admin WHERE username=:username";
        $stmt = $db->prepare($sql);
    
        $params = array(
            ":username" => $username
        );

        $stmt->execute($params);

        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if($admin) {
            $error_same = "Username Sudah Terdaftar. Silahkan Gunakan Username yang lain";
        } else {
            $sql = "UPDATE admin SET name=:name, email=:email, username=:username WHERE id=:id";
            $stmt = $db->prepare($sql);
            $params = array(":name" => $name, ":username" => $username, ":id" => $id, ":email" => $email);
            $saved = $stmt->execute($params);
            if($saved) {
                $msg_reg = "Datamu berhasil diupdate!";
            } else {
                $error_reg = "Sepertinya ada yang salah, silahkan coba lagi.";    
            }
        }
    } else {
        $sql = "SELECT * FROM admin WHERE username=:username || email=:email";
        $stmt = $db->prepare($sql);
    
        $params = array(
            ":username" => $username,
            ":email" => $email
        );

        $stmt->execute($params);

        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if($admin) {
            $error_same = "Username dan Email Sudah Terdaftar. Silahkan Gunakan Username dan Email yang lain";
        } else {
            $sql = "UPDATE admin SET name=:name, email=:email, username=:username WHERE id=:id";
            $stmt = $db->prepare($sql);
            $params = array(":name" => $name, ":username" => $username, ":id" => $id, ":email" => $email);
            $saved = $stmt->execute($params);
            if($saved) {
                $msg_reg = "Datamu berhasil diupdate!";
            } else {
                $error_reg = "Sepertinya ada yang salah, silahkan coba lagi.";    
            }
        }
    }
}

$id = $_SESSION['admin']['id'];

$result = mysqli_query($kon, "SELECT * FROM admin WHERE id='$id'");

if ($query === FALSE) {
    die(mysqli_error());
} else {
    while($user_data = mysqli_fetch_array($result)) {
        $nama = $user_data['name'];
        $emails = $user_data['email'];
        $uname = $user_data['username'];
    }
}

?>

<!DOCTYPE html>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://tugas.mineversal.com/user/assets/css/account.css" type="text/css"/>
    <link rel="stylesheet" href="https://tugas.mineversal.com/user/assets/css/index.css" type="text/css"/>
    
    <link rel="stylesheet" href="https://tugas.mineversal.com/user/framework/css/bootstrap.min.css"/>
    <link href='https://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"  rel="stylesheet">
    <head>
        <link rel="shortcut icon" href="https://tugas.mineversal.com/user/assets/img/logo1.png"/>
        <title>Admin | Edit Account</title>
        <style>
            html {
                scroll-behavior: smooth;
            }
            body {
                font-family: 'Alegreya';
                font-size: 18.6px;
                background-color: rgb(27, 27, 27);
                height: auto;
            }
            .sidebar a:hover {
                text-decoration: none;
            }
            .editbtn {
                width: 100px;
            }
            td, a {
                color: white;
            }
            .clearfix a:hover {
                color: black;
                background-color: #ddd;
            }
            .sidebar {
                position: fixed;
                top: 0;
                bottom: 0;
                left: 0;
                z-index: 1;
                padding: 48px 0 0; /* Height of navbar */
                box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            }
            .sidebar-sticky {
                position: relative;
                top: 0;
                height: calc(100vh - 48px);
                padding-top: .5rem;
                overflow-x: hidden;
                overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
                background-color: #333;
            }
            @media (max-width: 767.98px) {
                .sidebar {
                    padding: 0 0 0;
                    top: 3.1rem;
                }
            }
            @supports ((position: -webkit-sticky) or (position: sticky)) {
                .sidebar-sticky {
                    position: -webkit-sticky;
                    position: sticky;
                }
            }
            .sidebar .nav-link {
                font-weight: 500;
                color: #333;
            }
            .sidebar .nav-link .feather {
                margin-right: 4px;
                color: #333;
            }
            .sidebar .nav-link.active {
                color: white;
            }
            .sidebar .nav-link:hover .feather,
            .sidebar .nav-link.active .feather {
                color: inherit;
            }
            .sidebar-heading {
                font-size: .75rem;
                text-transform: uppercase;
            }
            .navbar .navbar-toggler {
                top: .25rem;
                right: 1rem;
            }
            #nav-custom {
                z-index: 2;
            }
        </style>
    </head>
    <body>
        <header id="bar" class="barheader">
            <nav class="nav navbar navbar-dark flex-md-nowrap shadow p-2 navbar-expand-lg" id="nav-custom">
                <button class="navbar-toggler navbar-toggler-left d-md-none collapsed navbar-toggler-size" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#"><img class="my-auto mx-auto" src="https://tugas.mineversal.com/user/assets/img/logo.png" width="200px"></a>
                <button class="navbar-toggler navbar-toggler-right navbar-toggler-size" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item my-auto buttonbar active">
                            <a href="update" class="nav-link"><i class="fa fa-fw fa-user"></i> Edit Account</a>
                        </li>
                        <li class="nav-item my-auto buttonbar active">
                            <a href="password" class="nav-link"><i class="fa fa-fw fa-key"></i> Change Password</a>
                        </li>
                        <li class="nav-item my-auto buttonbar active">
                            <a class="nav-link" onclick="document.getElementById('signUp').style.display='block'" style="width:auto;"><i class="fa fa-fw fa-close"></i> Logout</a>
                            <div id="signUp" class="signup-bg">
                                <form class="signup-content animate col-md-4 mx-auto" action="logout.php" method="POST">
                                    <div class="signup-container">
                                        <div class="signup-formcontainer">
                                            <span onclick="document.getElementById('signUp').style.display='none'" class="close" title="Close Modal">&times;</span>
                                            <h1>Log Out Confirm</h1>
                                            <p>Are you sure you want logout?</p>
                                        </div>
                                        <div class="clearfix">
                                            <button type="button" onclick="document.getElementById('signUp').style.display='none'" class="cancelbtn">Cancel</button>
                                            <button type="submit" class="signupbtn" name="logout">Log Out</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse" id="nav-custom">
                    <div class="sidebar-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item my-auto buttonbar active">
                                <a class="nav-link active" href="dashboard"><i class="fa fa-fw fa-home"></i> Dashboard</a>
                            </li>
                            <li class="nav-item my-auto buttonbar active">
                                <a class="nav-link active" href="user"><i class="fa fa-fw fa-user"></i> User</a>
                            </li>
                            <li class="nav-item my-auto buttonbar active">
                                <a class="nav-link active" href="post"><i class="fa fa-fw fa-folder"></i> Post</a>
                            </li>
                            <li class="nav-item my-auto buttonbar active">
                                <a class="nav-link active" href="komentar"><i class="fa fa-fw fa-comment"></i> Comments</a>
                            </li>
                            <li class="nav-item my-auto buttonbar active">
                                <a class="nav-link active" href="feedback"><i class="fa fa-fw fa-envelope"></i> Feedback</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 kanan">
                    <div class="container-fluid mb-5 pt-5">
                        <h2 class="mt-5">Edit Account Data</h2>
                        <?php if($error_same){ ?>
                            <div class="alert alert-danger" role="alert"><strong>Oops!</strong> <?php echo htmlentities($error_same);?></div>
                        <?php } ?>
                        <?php if($msg_reg){ ?>
                            <div class="alert alert-success" role="alert"><strong>Data Kamu Berhasil Tersimpan!</strong> <?php echo htmlentities($msg_reg);?></div>
                        <?php } ?>
                        <?php if($error_reg){ ?>
                            <div class="alert alert-danger" role="alert"><strong>Yah Maaf!</strong> <?php echo htmlentities($error_reg);?></div>
                        <?php } ?>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                            <div class="table-responsive">
                                <input type="hidden" name="id" value="<?php echo $_SESSION['admin']['id'];?>">
                                <table class="table table-striped table-sm">
                                    <tbody>
                                        <tr>
                                            <td><h3>Nama</h3></td>
                                            <td><input class="my-auto TextField" type="text" name="name" value="<?php echo $nama;?>" placeholder="Enter Name" required/></td>
                                        </tr>
                                        <tr>
                                            <td><h3>Username</h3></td>
                                            <td><input class="my-auto TextField" type="text" name="username" value="<?php echo $uname;?>" placeholder="Enter Username" required/></td>
                                        </tr>
                                        <tr>
                                            <td><h3>Email</h3></td>
                                            <td><input class="my-auto TextField" type="email" name="email" value="<?php echo $emails;?>" placeholder="Enter Email" required/></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><button class="editbtn" type="submit" name="submit">Submit</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </main>
            </div>
        </div>
        <div class="footer">
            <div id="contact">
                <h3 class="">Contact Us</h3>
                <a href="https://facebook.com/mineversal" class="fa fa-facebook"></a>
                <a href="https://twitter.com/mineversals" class="fa fa-twitter"></a>
                <a href="https://instagram.com/mineversal" class="fa fa-instagram"></a>
                <a href="https://youtube.com/mineversal" class="fa fa-youtube"></a>
            </div>
            <br>
            <div>
                <p>Jakarta, 27 September 2020</p>
                <p>Thanks to Mrs Dian Pratiwi and Lab Asistant<p>
            </div>
            <div class="copyright">
                &copy; Copyright <strong><span>Mineversal</span></strong> 2020
            </div>
        </div>
        <a onclick="topFunction()" id="upBtn" title="Back to Top"><i class="arrow up"></i></a>
    </body>
    <script src="https://tugas.mineversal.com/user/assets/js/content.js" type="text/javascript"></script>
    <script src="https://tugas.mineversal.com/user/framework/js/jquery-3.5.1.slim.min.js" type="text/JavaScript"></script>
    <script src="https://tugas.mineversal.com/user/framework/js/bootstrap.bundle.min.js" type="text/JavaScript"></script>
</html>