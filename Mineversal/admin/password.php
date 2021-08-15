<?php

    require_once("auth.php"); 

    include_once("config.php");
    
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $password_lama = filter_input(INPUT_POST, "password_lama", FILTER_SANITIZE_STRING);
        $password_baru = password_hash($_POST["password_baru"], PASSWORD_DEFAULT);
        $konf_password = password_hash($_POST["konf_password"], PASSWORD_DEFAULT);
        
        $sql = "SELECT * FROM admin WHERE id=:id";
        $stmt = $db->prepare($sql);
    
        $params = array(
            ":id" => $id
        );

        $stmt->execute($params);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user){
            if(password_verify($password_lama, $user["password"])){
                if (($_POST["password_baru"]) != ($_POST["konf_password"])) {
                    $error_conf_psw = "Silahkan Masukkan Password dan Konfirmasi Password Yang Sama"; 
                } else {
                    $sql = "UPDATE admin SET password=:password WHERE id=:id";
                    $stmt = $db->prepare($sql);

                    $params = array(
                        ":id" => $id,
                        ":password" => $password_baru
                    );

                    $saved = $stmt->execute($params);

                    if($saved) {
                        $msg_psw = "Di ingat Baik-baik ya Password Barunya!";
                    } else {
                        $error_psw = "Sepertinya ada yang salah, silahkan coba lagi.";    
                    };
                }
            } else {
?>
                <script language="JavaScript">
                    alert('Password lama tidak sesuai!, silahkan ulang kembali!');
                    document.location='password?id=<?php echo htmlspecialchars($_SESSION["user"]["id"]); ?>';
                </script>
<?php
            }
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
        <title>Admin | Change Password</title>
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
                        <h2 class="mt-5">Change Password</h2>
                        <?php if($error_conf_psw){ ?>
                            <div class="alert alert-danger" role="alert"><strong>Password dan Konfirmasi Password Tidak Sama!</strong> <?php echo htmlentities($error_conf_psw);?></div>
                        <?php } ?>
                        <?php if($msg_psw){ ?>
                            <div class="alert alert-success" role="alert"><strong>Password Berhasil Diganti!</strong> <?php echo htmlentities($msg_psw);?></div>
                        <?php } ?>
                        <?php if($error_psw){ ?>
                            <div class="alert alert-danger" role="alert"><strong>Password Gagal Diganti!</strong> <?php echo htmlentities($error_psw);?></div>
                        <?php } ?>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                            <div class="table-responsive">
                                <input type="hidden" name="id" value="<?php echo $_SESSION['admin']['id'];?>">
                                <table class="table table-striped table-sm">
                                    <tbody>
                                        <tr>
                                            <td><h3>Password Lama</h3></td>
                                            <td><input class="my-auto TextField" type="password" name="password_lama" value="" placeholder="Enter Old Password" required/></td>
                                        </tr>
                                        <tr>
                                            <td><h3>Password Baru</h3></td>
                                            <td><input class="my-auto TextField" type="password" name="password_baru" value="" placeholder="Enter New Password" required/></td>
                                        </tr>
                                        <tr>
                                            <td><h3>Konfirmasi Password Baru</h3></td>
                                            <td><input class="my-auto TextField" type="password" name="konf_password" value="" placeholder="Enter New Password" required/></td>
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