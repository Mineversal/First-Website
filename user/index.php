<?php require_once("auth.php"); 

require_once("includes/config.php");

if(isset($_POST['ks'])){

    $name = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
    $feedback = filter_input(INPUT_POST, 'feedback', FILTER_SANITIZE_STRING);
    $rating = filter_input(INPUT_POST, 'rating', FILTER_SANITIZE_STRING);

    $sql = "INSERT INTO feedback (name, feedback, rating) VALUES (:name, :feedback, :rating)";
    $stmt = $db->prepare($sql);

    $params = array(
        ":name" => $name,
        ":feedback" => $feedback,
        ":rating" => $rating
    );

    $saved = $stmt->execute($params);

    if($saved) {
        $msg_ks = "Kritik dan Saranmu Sangat Penting untuk Pengembangan Web Kami!";
    } else {
        $error_ks = "Sepertinya ada yang salah, silahkan coba lagi.";    
    };
}

?>

<!DOCTYPE html>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="assets/css/index.css" type="text/css"/>
    
    <link rel="stylesheet" href="framework/css/bootstrap.min.css"/>
    <link href='https://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <head>
        <link rel="stylesheet" href="assets/css/style.css">
        <script src="framework/js/jquery-3.5.1.slim.min.js" type="text/JavaScript"></script>
        <script src="framework/js/owl.carousel.min.js"></script>
        <link rel="stylesheet" href="framework/css/owl.carousel.min.css">
        
        <link rel="shortcut icon" href="assets/img/logo1.png"/>
        <title>Mineversal | User</title>
        <style>
            html {
                scroll-behavior: smooth;
            }
            body {
                font-family: 'Alegreya';
                font-size: 18px;
            }
            hr, #line {
                border: 1px solid #333;
                margin-bottom: 25px;
            }
            tr, td {
                color: white;
            }
            .bg-image {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                height: 22.5%;
                background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(./assets/img/bg3.jpg) no-repeat;
                background-position: center;
                background-size: cover;
                position: relative;
            }
            .main-container .main hr, .profile hr {
                color: white;
                border-color: white;
            }
            #slider {
                z-index: 0;
            }
            #add-habbit {
                font-size: 25px;
                background-color: black;
            }
            #add-habbit:hover {
                background-color: #777;
                color: white;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <header id="bar" class="barheader">
            <nav class="nav navbar navbar-expand-lg navbar-dark" id="nav-custom">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><img class="my-auto" src="https://tugas.mineversal.com/user/assets/img/logo.png" width="200px"></a>
                    <button class="navbar-toggler navbar-toggler-right navbar-toggler-size" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item my-auto buttonbar active">
                                <a href="#home" class="nav-link"><i class="fa fa-fw fa-home"></i> HOME</a>
                            </li>
                            <li class="nav-item my-auto buttonbar active">
                                <a href="#online" class="nav-link"><i class="fa fa-fw fa-globe"></i> TRAVELLING</a>
                            </li>
                            <li class="nav-item my-auto buttonbar active">
                                <a href="#data" class="nav-link"><i class="fa fa-fw fa-folder"></i> COVID-19 DATA</a>
                            </li>
                            <li class="nav-item my-auto buttonbar active">
                                <a href="#aboutus" class="nav-link"><i class="fa fa-fw fa-user"></i> ABOUT US</a>
                            </li>
                            <li class="nav-item my-auto buttonbar active">
                                <a href="#contact" class="nav-link"><i class="fa fa-fw fa-envelope"></i> CONTACT</a>
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
                </div>
            </nav>
        </header>
        <div class="slideshow-container" id="home">
            <div class="slideshow">
                <img src="assets/img/img1.jpg" style="width:100%">
                <div class="imgtext">Milky Way Galaxy</div>
            </div>
            <div class="slideshow">
                <img src="assets/img/img2.jpg" style="width:100%">
                <div class="imgtext">Moon and Andromeda</div>
            </div>
            <div class="slideshow">
                <img src="assets/img/img3.jpg" style="width:100%">
                <div class="imgtext">The Moon</div>
            </div>  
        </div>
        <div class="header" id="online">
            <?php if($msg_ks){ ?>
                <div class="alert alert-success" role="alert"><strong>Terima Kasih Atas Kritik Sarannya!</strong> <?php echo htmlentities($msg_ks);?></div>
            <?php } ?>
            <?php if($error_ks){ ?>
                <div class="alert alert-danger" role="alert"><strong>Yah Maaf!</strong> <?php echo htmlentities($error_ks);?></div>
            <?php } ?>
            <h2 class="mt-2" id="project">Selamat Datang <?php echo $_SESSION["user"]["name"]?></h2>
            <p><i>MINEVERSAL WITH YOU</i></p>
        </div>
        <div class="main-container">
            <div class="main col-md-9 text-left">
                <h2>ONLINE TRAVELLING</h2>
                <p>STAY AT HOME AND ENJOY YOUR ONLINE TRAVELLING</p>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div id="slider" class="owl-carousel owl-theme slider">
                            <?php
                                include("config.php");
                                $query=mysqli_query($kon,"SELECT id as id, admin as admin, image, title as title FROM post WHERE post.Is_Active=1");
                                $rowcount=mysqli_num_rows($query);
                                if($rowcount==0){
                                ?>
                                    <div><h1>Tidak Ada Post</h1></div>
                                <?php 
                                } else {
                                     while($row = mysqli_fetch_array($query))
                                {
                            ?>
                            <div class="card">
                                <div class="img"><img src="https://tugas.mineversal.com/admin/images/<?php echo htmlentities($row['image']);?>" alt="<?php echo htmlentities($row['title']);?>"></div>
                                <div class="content">
                                    <div class="title"><?php echo htmlentities($row['title']);?></div>
                                    <div class="sub-title"></div>
                                    <p></p>
                                    <div class="btn">
                                        <a class="call" href="content?id=<?php echo htmlentities($row['id']);?>">Go To Page</a>
                                    </div>
                                </div>
                            </div>
                            <?php } }?>
                        </div>
                    </div>
                </div>
                <h2 id="data" class="mt-3">COVID-19 DATA</h2>
                <p>STAY HOME FOR YOUR SAFETY AND YOUR HEALTHY</p>
                <hr>
                <div class="row">
                    <div class ="col-md-4">
                        <div class="lesson-wrap mx-auto">
                            <a href="worlddata" id="lesson-btn">
                                <div class="lesson-wrap-1">
                                    <h1>WORLD</h1>
                                    <p>WORLD COVID-19 DATA</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class ="col-md-4">
                        <div class="lesson-wrap">
                            <a href="indonesiadata" id="lesson-btn">
                                <div class="lesson-wrap-1">
                                    <h1>INDONESIA</h1>
                                    <p>INDONESIA COVID-19 DATA</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class ="col-md-4">
                        <div class="lesson-wrap">
                            <a href="provincedata" id="lesson-btn">
                                <div class="lesson-wrap-1">
                                    <h1>PROVINCE</h1>
                                    <p>PROVINCE COVID-19 DATA</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <br id="habbit">
                <h2 class="mt-3">HABBIT TRACKER</h2>
                <p>WRITE AND SCHEDULE YOUR ACTIVITY</p>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="table-responsive">
                                <table class="table table-colored table-centered table-inverse m-0 bg-dark">
                                    <thead>
                                        <tr>                                       
                                            <th>Nama Habit</th>
                                            <th>Catatan</th>
                                            <th>Catatan Besok</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include("config.php");
                                            $id = $_SESSION["user"]["id"];
                                            $query = mysqli_query($kon, "SELECT id_habbit as id_habbit, nama_habbit as nama_habbit, catatan as catatan, catatan_besok as catatan_besok FROM habit WHERE habit.id_user='$id'");
                                            $rowcount = mysqli_num_rows($query);
                                            if($rowcount==0){
                                        ?>
                                            <tr>
                                                <td colspan = "4" align="center"><h3 style="color:red">No record found</h3></td>
                                            </tr>
                                        <?php 
                                            } else {
                                                while($row = mysqli_fetch_array($query)) {
                                        ?>
                                            <tr>
                                                <td><?php echo htmlentities($row['nama_habbit']);?></td>
                                                <td><?php echo htmlentities($row['catatan']);?></td>
                                                <td><?php echo htmlentities($row['catatan_besok']);?></td>
                                                <td><a href="edit-habbit?id_habbit=<?php echo htmlentities($row['id_habbit']);?>"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a> 
                                                &nbsp;<a href="habbitTracker?id_habbit=<?php echo htmlentities($row['id_habbit']);?>" onclick="return confirm('Do you realy want to delete?')"> <i class="fa fa-trash-o" style="color: #f05050"></i></a> </td>
                                            </tr>
                                        <?php } }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <a id="add-habbit" class="buttonbar text-center m-auto col-12" href="habbitTracker?id=<?php echo htmlspecialchars($_SESSION['user']['id']); ?>">ADD HABBIT</a>
                <br id="aboutus">
                <h2 class="mt-5">ABOUT US</h2>
                <p>EVERYTHING ABOUT MINEVERSAL</p>
                <hr>
                <p class="text-justify">Mineversal memiliki makna yaitu "Milik Bersama" karena ini merupakan Project 
                gabungan yang dibuat dan dikembangkan secara bersama-sama oleh satu tim berisikan 5 orang yaitu Zidan, 
                Ivana, Nadya, Azhar, dan Gading. Memiliki 3 Fitur Utama yaitu Online Travelling, COVID-19 DATA dan 
                Habbit Tracker. Terima Kasih, Silahkan Manfaatkan fitur yang ada di web kami. <a href="aboutus">
                More About Us</a></p>
                <br>
                <h2 class="mt-4">FEEDBACK OUR SITE</h2>
                <p>THANKS TO USING OUR SITE AND DON'T FORGET TO FILL FEEDBACK</p>
                <hr>
                <p class="text-justify">Terima Kasih telah menggunakan Web Kami..., Kami harap anda dapat mengisi form feedback dibawah ini 
                sebagai koreksi dan perbaikan pengembangan website kami untuk kedepannya, sering-sering berkunjung kesini ya xD<p>
                <button class="buttonbar" onclick="document.getElementById('feedback').style.display='block'">FEEDBACK FORM</button>
                <div id="feedback" class="feedback-bg">
                    <form class="feedback-content animate col-md-4 mx-auto" action="" method="POST">
                        <div class="feedback-container">
                            <div class="feedback-formcontainer">
                                <span onclick="document.getElementById('feedback').style.display='none'" class="close" title="Close Modal">&times;</span>
                                <h1>Feedback Form</h1>
                                <p>Please fill in this form</p>
                            </div>
                            <hr id="line">
                            <label for="name"><b>Nama</b></label>
                            <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <input type="text" placeholder="Enter Name" value="<?php echo $_SESSION["user"]["name"]?>" name="nama" readonly>
                            </div>
                            <label for="Kritik"><b>Kritik dan Saran</b></label>
                            <div class="input-container">
                                <i class="fa fa-envelope icon"></i>
                                <textarea class="textarea" placeholder="Enter Feedback" name="feedback" value="" required></textarea>
                            </div>
                            <div class="row m-auto">
                                <fieldset class="rating float-left">
                                    <legend>Rating Our Site</legend>
                                    <input type="radio" id="star5" name="rating" value="5"><label for="star5" title="Rocks!">5 stars</label>
                                    <input type="radio" id="star4" name="rating" value="4"><label for="star4" title="Pretty good">4 stars</label>
                                    <input type="radio" id="star3" name="rating" value="3"><label for="star3" title="Meh">3 stars</label>
                                    <input type="radio" id="star2" name="rating" value="2"><label for="star2" title="Kinda bad">2 stars</label>
                                    <input type="radio" id="star1" name="rating" value="1"><label for="star1" title="Sucks big time">1 star</label>
                                </fieldset>
                            </div>
                            <div class="clearfix row m-auto">
                                <button type="button" onclick="document.getElementById('feedback').style.display='none'" class="cancelbtn col-6">Cancel</button>
                                <button type="submit" class="signupbtn col-6" name="ks">Send Feedback</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="side col-md-3" id="aboutus">
                <article class="profile">
                    <h2>DEVELOPER TEAM</h2>
                    <hr>
                    <div id="kartu">
                        <img src="assets/img/nadya.jpeg" alt="Random Name" style="width:100%">
                        <h3 class="mt-3">Nadya Amanda Rizkania</h3>
                        <p>As UI/UX Designer and Front End Developer</p>
                        <p><a class="call" href="https://instagram.com/amnndya">Contact</a></p>
                    </div>
                    <div id="kartu">
                        <img src="assets/img/ivana.png" alt="Random Name" style="width:100%">
                        <h3 class="mt-3">Ivana Gabriela Manurung</h3>
                        <p>As Content Researcher and Front End Developer</p>
                        <p><a class="call" href="https://wa.me/+6281296932033">Contact</a></p>
                    </div>
                    <div id="kartu">
                        <img src="assets/img/azhar.jpg" alt="Random Name" style="width:100%">
                        <h3 class="mt-3">Azhar Rizki Zulma</h3>
                        <p>As Project Manager and Full Stack Developer</p>
                        <p><a class="call" href="https://wa.me/+6281317441991">Contact</a></p>
                    </div>
                    <div id="kartu">
                        <img src="assets/img/gading.jpeg" alt="Random Name" style="width:100%">
                        <h3 class="mt-3">Gading Sectio Aryoseto</h3>
                        <p>As Data Researcher and Back End Developer</p>
                        <p><a class="call" href="https://wa.me/+6281294201579">Contact</a></p>
                    </div>
                    <div id="kartu">
                        <img src="assets/img/zidan.jpeg" alt="Random Name" style="width:100%">
                        <h3 class="mt-3">Muhammad Zidan</h3>
                        <p>As Feature Inovator and Back End Developer</p>
                        <p><a class="call" href="https://wa.me/+6281906852062">Contact</a></p>
                    </div>
                </article>
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
    <script>
        $(".slider").owlCarousel({
            loop: true,
            autoplay: true,
            autoplayTimeout: 2000, //2000ms = 2s;
            autoplayHoverPause: true,
            responsiveClass: true,
            margin:10,
            responsive:{
                0:{
                    items:1,
                    nav:true,
                    dots:false
                },
                600:{
                    items:2,
                    nav:false,
                    dots:false
                },
                1000:{
                    items:3,
                    nav:false,
                    dots:false
            }}
        });
    </script>
    <script src="assets/js/index.js" type="text/javascript"></script>
    <script src="framework/js/bootstrap.bundle.min.js" type="text/JavaScript"></script>
</html>