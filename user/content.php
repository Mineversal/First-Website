<?php

require_once("auth.php");

include('config.php');

if(isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $comment = $_POST['comment'];
    $postid = $_POST['idpost'];
    $st1 = '0';
    $cmquery = mysqli_query($kon, "INSERT INTO comments(idpost, nama, comment, status) VALUES('$postid','$nama','$comment','$st1')");
    if($cmquery) {
        $msgkom = "Komentar akan ditampilkan setelah di review oleh admin";
    } else {
        $msgkom = "Silahkan Coba Lagi.";
    }
}

?>

<!DOCTYPE html>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="assets/css/content.css" type="text/css"/>
    <link rel="stylesheet" href="assets/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="framework/css/bootstrap.min.css"/>
    <link href='https://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"  rel="stylesheet">
    <head>
        <link rel="stylesheet" href="assets/css/style.css">
        <script src="framework/js/jquery-3.5.1.slim.min.js" type="text/JavaScript"></script>
        <script src="framework/js/owl.carousel.min.js"></script>
        <link rel="stylesheet" href="framework/css/owl.carousel.min.css">
        
        <link rel="shortcut icon" href="assets/img/logo1.png"/>
        <title>Mineversal | Online Travelling</title>
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
            tr, td {
                color: white;
            }
            #cont p, #cont h1, #cont h2, #cont h5, #comment, #putih {
                color: white;
            }
            #cont hr {
                border-color: white;
            }
            #slider {
                z-index: 0;
            }
            .card {
                flex: 1;
                margin: 0 10px;
                background: rgb(36, 34, 34)
            }
            .card .img {
                width: 100%;
            }
            .card .img img {
                height: 100%;
                width: 100%;
                object-fit: cover;
            }
            .card .content {
                padding: 10px 20px;
            }
        </style>
    </head>
    <body>
        <header id="bar" class="barheader sticky">
            <nav class="nav navbar navbar-expand-lg navbar-dark" id="nav-custom">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><img class="my-auto" src="https://tugas.mineversal.com/user/assets/img/logo.png" width="200px"></a>
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
                </div>
            </nav>
        </header>
        <div id="cont" class="container-fluid mt-5 pt-5">
            <div class="row">
                <div class="col-md-12">
                    <?php if($msgkom){ ?>
                        <div class="alert alert-success" role="alert"><strong>Komentar berhasil di submit.</strong> <?php echo htmlentities($msgkom);?></div>
                    <?php } ?>
                    <?php if($errorkom){ ?>
                        <div class="alert alert-danger" role="alert"><strong>Komentar gagal disubmit!</strong> <?php echo htmlentities($errorkom);?></div>
                    <?php } ?>
                    <?php
                    $id = intval($_GET['id']);
                    $query = mysqli_query($kon, "SELECT post.title as title, post.admin as admin, post.image, post.description as description, post.PostingDate as postingdate, post.url as url FROM post WHERE post.id='$id'");
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
	                <div class="card">
                        <div class="img"><img src="https://tugas.mineversal.com/admin/images/<?php echo htmlentities($row['image']);?>" alt="<?php echo htmlentities($row['title']);?>"></div>
                        <div class="content">
                            <h3 id="putih" class="title text-center"><?php echo htmlentities($row['title']);?></h3>
                            <hr id='batas'>
                            <p class="ic card-text mt-3" style="text-align: justify;"><?php 
                            $pt = $row['description'];
                            echo (substr($pt, 0));?>
                            </p>
                            <p class="text-center"><b> Posted on </b><?php echo htmlentities($row['postingdate']);?></p>
                            <p class="text-center"><b> Posted by </b><?php echo htmlentities($row['admin']);?></p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <br>
            <h2>COVID DATA IN THIS PLACE</h2>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <th>Nama Provinsi</th>
                            <th>Total Positif</th>
                            <th>Total Sembuh</th>
                            <th>Total Kematian</th>
                        </thead>
                        <tbody id="table-data">
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <h2>KOMENTAR</h2>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <?php
                        $id = intval($_GET['id']);
                        $sts = 1;
                        $query = mysqli_query($kon, "SELECT nama, comment, PostingDate FROM comments WHERE idpost='$id' AND status='$sts'");
                        while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <div class="media mb-4">
                        <img class="d-flex mr-3 rounded-circle" src="assets/img/avatar.jpg" alt="ini user logo" width="75px">
                        <div id="comment" class="media-body" style="text-align: justify;">
                            <h5 class="mt-0"><?php echo htmlentities($row['nama']);?> <br />
                                <span style="font-size:11px;"><b>at</b> <?php echo htmlentities($row['PostingDate']);?></span>
                            </h5>
                            <?php echo htmlentities($row['comment']);?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <br>
            <h2>LEAVE A COMMENT</h2>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <form name="Comment" action="" method="POST">
                        <input type="hidden" name="idpost" value="<?php echo htmlentities($_GET['id']); ?>" />
                        <div class="form-group">
                            <input type="text" name="nama" class="form-control" value="<?php echo htmlentities($_SESSION['user']['name']); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="comment" rows="3" placeholder="Comment" required></textarea>
                        </div>
                        <button type="submit" class="buttonbar" name="submit">Submit</button>
                    </form>
                </div>
            </div>
            <br>
            <h2>MORE POST</h2>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div id="slider" class="owl-carousel owl-theme slider">
                        <?php
                        $query=mysqli_query($kon,"SELECT id as id, admin as admin, image, title as title FROM post WHERE post.Is_Active=1");
                        $rowcount=mysqli_num_rows($query);
                        if($rowcount==0){
                        ?>
                        <div><h1>Tidak Ada Post</h1></div>
                        <?php 
                        } else {
                        while($row = mysqli_fetch_array($query)) {
                        ?>
                        <div class="card">
                            <div class="img"><img src="https://tugas.mineversal.com/admin/images/<?php echo htmlentities($row['image']);?>" alt="<?php echo htmlentities($row['title']);?>"></div>
                            <div class="content">
                                <div id="putih" class="title"><?php echo htmlentities($row['title']);?></div>
                                <div id="putih" class="sub-title"></div>
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
        </div>
        <br>
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
                    items:4,
                    nav:false,
                    dots:false
            }}
        });
    </script>
    <script src="assets/js/content.js" type="text/javascript"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        DataProvinsi()
        function DataProvinsi(){
            $.ajax({
                url : "curl?postid=<?php echo intval($_GET['id']);?>",
                type : "GET",

                success : function(data){
                    try{
                        $('#table-data').html(data);
                    } catch {
                        alert('error');
                    }
                }
            })
        }
    </script>
    <script src="framework/js/jquery-3.5.1.slim.min.js" type="text/JavaScript"></script>
    <script src="framework/js/bootstrap.bundle.min.js" type="text/JavaScript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</html>