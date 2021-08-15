<?php require_once("auth.php"); ?>

<!DOCTYPE html>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <head>
        <link rel="stylesheet" href="assets/css/index.css" type="text/css"/>
        <link rel="stylesheet" href="framework/css/bootstrap.min.css"/>
        <link href='https://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet'>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="assets/img/logo1.png"/>
        <title>Mineversal | Indonesia Data COVID-19</title>
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
            .container h1, tr, tb {
                color: white;
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
        <div class="container mb-5 pt-5">
            <h1 class="text-center mt-5">Indonesia Data COVID-19 Realtime</h1>
            <br><br>
            <table class="table table-striped bg-dark">
                <thead>
                    <tr id="data">
                        <table class="table table-striped bg-dark">
                            <thead>
                                <tr>
                                    <th >Total Cases</th>
                                    <th >Total Deaths</th>
                                    <th >Total Recovered</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td id="dt01"></td>
                                    <td id="dt02"></td>
                                    <td id="dt03"></td>
                                </tr>
                            </tbody>
                        </table>
                    </tr>
                </tbody>
            </table>
            <button type="button" onclick="refreshdata()" class="btn btn-warning">Refresh</button>
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
    <script src="assets/js/content.js" type="text/javascript"></script>
    
    <script src="framework/js/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="framework/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        init()
        function init(){
            $.ajax ({
                url : "https://coronavirus-19-api.herokuapp.com/countries",
                success : function(data) {
                    try{
                        var json = data;
                        var html = [];
                        if(json.length > 0){
                            var i;
                            for(i=0; i < json.length; i++){
                                var datanegara = json[i];
                                var namaNegara = datanegara.country;
                                if(namaNegara=='Indonesia'){
                                    var kasus = datanegara.cases;
                                    var meninggal = datanegara.deaths;
                                    var sembuh = datanegara.recovered;
                                    $('#dt01').html(kasus);
                                    $('#dt02').html(meninggal);
                                    $('#dt03').html(sembuh);
                                }
                            }
                        }
                    } catch {

                    }
                }
                
            })
          
        }
        function refreshdata() {
            clearData()
            init()
        }
        function clearData(){
            $("#dt01").empty()
            $("#dt02").empty()
            $("#dt03").empty()
        }
    </script>
</html>