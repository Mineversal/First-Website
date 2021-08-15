<?php

require_once("auth.php"); 

include_once("includes/config.php");

if(isset($_POST['submit'])) {   
    $id_user = $_POST['id'];
    $nama_habbit = filter_input(INPUT_POST, 'nama_habbit', FILTER_SANITIZE_STRING);
    $catatan = filter_input(INPUT_POST, 'catatan', FILTER_SANITIZE_STRING);
    $catatan_besok = filter_input(INPUT_POST, 'catatan_besok', FILTER_SANITIZE_STRING);
    $sql = "INSERT INTO habit (id_user, nama_habbit, catatan, catatan_besok) 
            VALUES (:id_user, :nama_habbit, :catatan, :catatan_besok)";
    $stmt = $db->prepare($sql);
   
    $params = array(
        ":id_user" => $id_user,
        ":nama_habbit" => $nama_habbit,
        ":catatan" => $catatan,
        ":catatan_besok" => $catatan_besok
    );

    $saved = $stmt->execute($params);
   
    if($saved) {
        $msg_reg = "Ditunggu Ya Emailnya!";
    } else {
        $error_reg = "Sepertinya ada yang salah, silahkan coba lagi.";    
    };
}

if($_GET['id_habbit']){
    include_once("config.php");
    $id = intval($_GET['id_habbit']);
    $query = mysqli_query($kon, "DELETE FROM habit WHERE id_habbit='$id'");
    $delmsg = "Habbit deleted forever";
}

?>

<!DOCTYPE html>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="assets/css/account.css" type="text/css"/>
    <link rel="stylesheet" href="assets/css/index.css" type="text/css"/>
    
    <link rel="stylesheet" href="framework/css/bootstrap.min.css"/>
    <link href='https://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"  rel="stylesheet">
    <head>
        <link rel="shortcut icon" href="assets/img/logo1.png"/>
        <title>Mineversal | Add Habbit Tracker</title>
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
                <a class="navbar-brand" href="#"><img class="my-auto" src="assets/img/logo.png" width="200px"></a>
                <button class="navbar-toggler navbar-toggler-right navbar-toggler-size" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item my-auto buttonbar active">
                            <a href="https://tugas.mineversal.com/user/" class="nav-link"><i class="fa fa-fw fa-home"></i> HOME</a>
                        </li>
                        <li class="nav-item my-auto buttonbar active">
                            <a href="https://tugas.mineversal.com/user/#online" class="nav-link"><i class="fa fa-fw fa-globe"></i> TRAVELLING</a>
                        </li>
                        <li class="nav-item my-auto buttonbar active">
                            <a href="https://tugas.mineversal.com/user/#data" class="nav-link"><i class="fa fa-fw fa-folder"></i> COVID-19 DATA</a>
                        </li>
                        <li class="nav-item my-auto buttonbar active">
                            <a href="https://tugas.mineversal.com/user/#aboutus" class="nav-link"><i class="fa fa-fw fa-user"></i> ABOUT US</a>
                        </li>
                        <li class="nav-item my-auto buttonbar active">
                            <a href="https://tugas.mineversal.com/user/#contact" class="nav-link"><i class="fa fa-fw fa-envelope"></i> CONTACT</a>
                        </li>
                        <li class="nav-item dropdown my-auto buttonbar active">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-fw fa-search"></i> SEARCH
                            </a>
                            <div class="dropdown" aria-labelledby="navbarDropdown">
                                <form class="search-content" action="search?search=<?php echo $_GET['search'];?>" method="GET">
                                    <div class="search dropdown-item">
                                        <input type="text" placeholder="Search.." name="search">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li class="nav-item my-auto buttonbar active">
                            <a href="account" class="nav-link"><i class="fa fa-fw fa-user"></i> MY ACCOUNT</a>
                        </li>
                        <li class="nav-item my-auto buttonbar active">
                            <a class="nav-link" onclick="document.getElementById('signUp').style.display='block'" style="width:auto;"><i class="fa fa-fw fa-close"></i> LOGOUT</a>
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
                                <a class="nav-link active" href="account"><i class="fa fa-fw fa-user"></i> My Account</a>
                            </li>
                            <li class="nav-item my-auto buttonbar active">
                                <a class="nav-link active" href="update"><i class="fa fa-fw fa-folder"></i> Edit Account</a>
                            </li>
                            <li class="nav-item my-auto buttonbar active">
                                <a class="nav-link active" href="password"><i class="fa fa-fw fa-key"></i> Change Password</a>
                            </li>
                            <li class="nav-item my-auto buttonbar active">
                                <a class="nav-link active" href="habbitTracker"><i class="fa fa-fw fa-home"></i> Habit Tracker</a>
                            </li>
                            <li class="nav-item my-auto buttonbar active">
                                <a class="nav-link active" href="#" onclick="document.getElementById('login').style.display='block'" style="width:auto; cursor:pointer;"><span class="fa fa-fw" title="Close Modal">&times;</span> Delete Account</a>
                                <div id="login" class="signup-bg">
                                    <form class="signup-content animate col-md-4 mx-auto">
                                        <div class="signup-container">
                                            <div class="signup-formcontainer">
                                                <span onclick="document.getElementById('login').style.display='none'" class="close" title="Close Modal">&times;</span>
                                                <h1>Confirm</h1>
                                                <p>Are you sure you want Delete Your Account?</p>
                                            </div>
                                            <div class="clearfix">
                                                <a onclick="document.getElementById('login').style.display='none'" class="cancelbtn" style="cursor:pointer;">Cancel</a>
                                                <a class="signupbtn" href="account?id=<?php echo $_SESSION['user']['id']; ?>">Delete Account</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 kanan">
                    <div class="container-fluid mb-5 pt-5">
                        <h2 class="mt-5">Add Habit Tracker</h2>
                        <?php if($msg_reg){ ?>
                            <div class="alert alert-success" role="alert"><strong>Data Kamu Berhasil Tersimpan!</strong> <?php echo htmlentities($msg_reg);?></div>
                        <?php } ?>
                        <?php if($error_reg){ ?>
                            <div class="alert alert-danger" role="alert"><strong>Yah Maaf!</strong> <?php echo htmlentities($error_reg);?></div>
                        <?php } ?>
                        <?php if($delmsg){ ?>
                            <div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> <?php echo htmlentities($delmsg);?></div>
                        <?php } ?>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                            <div class="table-responsive">
                                <input type="hidden" name="id" value="<?php echo $_SESSION['user']['id'];?>">
                                <table class="table table-striped table-sm">
                                    <tbody>
                                        <tr>
                                            <td><h3>Nama Habit</h3></td>
                                            <td><input class="my-auto TextField" type="text" name="nama_habbit" placeholder="Enter Habit's Name" required/></td>
                                        </tr>
                                        <tr>
                                            <td><h3>Catatan</h3></td>
                                            <td><input class="my-auto TextField" type="text" name="catatan"  placeholder="Enter Habbit Note" required/></td>
                                        </tr>
                                        <tr>
                                            <td><h3>Activity For Tomorrow</h3></td>
                                            <td><input class="my-auto TextField" type="text" name="catatan_besok"  placeholder="Tomorrow Activities" required/></td>
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
        <footer class="footer">
            <div id="contact">
                <h3 class="">Contact Us</h3>
                <a href="https://facebook.com/mineversal" class="fa fa-facebook"></a>
                <a href="https://twitter.com/mineversals" class="fa fa-twitter"></a>
                <a href="https://instagram.com/mineversal" class="fa fa-instagram"></a>
                <a href="https://youtube.com/mineversal" class="fa fa-youtube"></a>
            </div>
            <br>
            <div>
                <p>Thanks to Mrs Dian Pratiwi and Lab Asistant<p>
                <h5>Jakarta, 27 September 2020</h5>
            </div>
            <div class="copyright">
                &copy; Copyright <strong><span>Mineversal</span></strong> 2020
            </div>
        </footer>
        <a onclick="topFunction()" id="upBtn" title="Back to Top"><i class="arrow up"></i></a>
    </body>
    <script src="assets/js/content.js" type="text/javascript"></script>
    <script src="framework/js/jquery-3.5.1.slim.min.js" type="text/JavaScript"></script>
    <script src="framework/js/bootstrap.bundle.min.js" type="text/JavaScript"></script>
</html>