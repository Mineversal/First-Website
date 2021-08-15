<?php 

require_once("auth.php");

include_once("includes/config.php");

if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $prov = $_POST['province'];
    $arr = explode(" ",$title);
    $url = implode("-",$arr);
    $status = 1;
    $query = mysqli_query($kon, "UPDATE post SET title='$title',description='$description',url='$url',Is_Active='$status',provinsi='$prov' WHERE id='$id'");
    if($query) {
        $msg = "Post successfully updated";
    } else {
        $error = "Something went wrong. Please try again.";
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
        <title>Admin | Edit Post</title>
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
            tr, td, a {
                color: white;
            }
            .TextArea {
                font-size: 25px;
                width: 500px;
                height: 300px;
            }
            .editimg:hover {
                color: lightblue;
                text-decoration: none;
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
            .editbtn {
                width: 200px;
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
                        <h2 class="mt-5">Update Post</h2>
                        <?php if($msg){ ?>
                            <div class="alert alert-success" role="alert"><strong>Well done!</strong> <?php echo htmlentities($msg);?></div>
                        <?php } ?>
                        <?php if($error){ ?>
                            <div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> <?php echo htmlentities($error);?></div>
                        <?php } ?>
                        <?php
                            $id = intval($_GET['id']);
                            $query = mysqli_query($kon,"SELECT post.id as id, post.image, post.title as title, post.description FROM post WHERE post.id='$id' AND post.Is_Active=1");
                            while($row = mysqli_fetch_array($query)) {
                        ?>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                            <div class="table-responsive">
                                <input type="hidden" name="id" value="<?php echo intval($_GET['id']);?>">
                                <table class="table table-striped table-sm">
                                    <tbody>
                                        <tr>
                                            <td><h3>Judul</h3></td>
                                            <td><input class="my-auto TextField" type="text" name="title" placeholder="Enter Title" value="<?php echo htmlentities($row['title']);?>" required/></td>
                                        </tr>
                                        <tr>
                                            <td><h3>Deskripsi</h3></td>
                                            <td><textarea class="my-auto TextArea" type="text" name="description" placeholder="Enter Description" required/><?php echo htmlentities($row['description']);?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td><h3>Provinsi</h3></td>
                                            <td>
                                                <select name="province">
                                                    <option value="Aceh">Aceh</option>
                                                    <option value="Bali">Bali</option>
                                                    <option value="Bangka Belitung">Bangka Belitung</option>
                                                    <option value="Banten">Banten</option>
                                                    <option value="Bengkulu">Bengkulu</option>
                                                    <option value="Daerah Istimewa Yogyakarta">Daerah Istimewa Yogyakarta</option>
                                                    <option value="DKI Jakarta">DKI Jakarta</option>
                                                    <option value="Gorontalo">Gorontalo</option>
                                                    <option value="Jambi">Jambi</option>
                                                    <option value="Jawa Barat">Jawa Barat</option>
                                                    <option value="Jawa Tengah">Jawa Tengah</option>
                                                    <option value="Jawa Timur">Jawa Timur</option>
                                                    <option value="Kalimantan Barat">Kalimantan Barat</option>
                                                    <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                                                    <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                                                    <option value="Kalimantan Timur">Kalimantan Timur</option>
                                                    <option value="Kalimantan Utara">Kalimantan Utara</option>
                                                    <option value="Kepulauan Riau">Kepulauan Riau</option>
                                                    <option value="Lampung">Lampung</option>
                                                    <option value="Maluku">Maluku</option>
                                                    <option value="Maluku Utara">Maluku Utara</option>
                                                    <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                                                    <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                                                    <option value="Papua">Papua</option>
                                                    <option value="Papua Barat">Papua Barat</option>
                                                    <option value="Riau">Riau</option>
                                                    <option value="Sulawesi Barat">Sulawesi Barat</option>
                                                    <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                                                    <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                                                    <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                                                    <option value="Sulawesi Utara">Sulawesi Utara</option>
                                                    <option value="Sumatera Barat">Sumatera Barat</option>
                                                    <option value="Sumatera Selatan">Sumatera Selatan</option>
                                                    <option value="Sumatera Utara">Sumatera Utara</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><h3>Images</h3></td>
                                            <td><img src="images/<?php echo htmlentities($row['image']);?>" width="300"/></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><a class="editimg" href="change-image?id=<?php echo htmlentities($row['id']);?>">Update Image</a></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><button class="editbtn" type="submit" name="update">Update</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                        <?php } ?>
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