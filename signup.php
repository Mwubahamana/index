<?php

include_once 'dashboard/connection.php';

$error = ""; 

if(isset($_POST["submit"])){ 

    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    if(empty($_POST["phone"]) || empty($_POST["password"]) ){

        $error  = "<div class='alert alert-info alert-dismissable'>
                
            <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
                Shyiramo nibura Telefone n'ijambo ry'ibanga.

            </div>";

    }else{


        $sql = "SELECT * FROM tbl_citizen";
        $res = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($res)) {
          
            $chkmail = $row['email'];
            $chkphone = $row['phone'];

        }

        if ($chkmail == $email || $chkphone == $phone) {

            $error = "<div class='alert alert-danger alert-dismissable m-t-xs'>
                                    
                <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
                    Musanzwe mufite konti.&nbsp;&nbsp;&nbsp;  
                    <a href='login.php'><strong>Kanda hano winjire</strong></a>
                </div>";

        }else{

            $query = "INSERT INTO tbl_citizen (email,phone,password) VALUES ('$email','$phone','$password')";
            $result = mysqli_query($conn, $query);
            
            $lastid = mysqli_insert_id($conn);

            if($result){

                $sqlQuery = "SELECT * FROM tbl_citizen WHERE citizen_id = '$lastid'";
                $resQuery = mysqli_query($conn, $sqlQuery);
                $rows = mysqli_fetch_array($resQuery); 
                    
                $to = $rows['email'];

                $subject = "Umusanzu Wanjye Administrator"; 
                    
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
                
                $message = "Hello, You have been created a Citizen account. \n\nTo access your new account please visit http://umusanzu.sawadevelopers.rw \n\n Umusanzu Wanjye Team.";

                if (mail($to, $subject, $message, $headers)){

                    $error =  "<br/><div class='alert alert-success alert-dismissable'>
                                    
                            <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
                            Success. Email sent

                            </div>";
                    }else{
                        
                        $error = "<br/><div class='alert alert-danger alert-dismissable'>
                                        
                            <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
                            Email error. Email not Sent.

                        </div>";
                    }
                    
                $error = "<br/><div class='alert alert-success alert-dismissable'>
                                                    
                    <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
                        Account Created Successfully.&nbsp;&nbsp;&nbsp;
                        <a href='login.php'><strong>CLICK HERE TO LOGIN</strong></a>
                    </div>";
                                                               
            }else{

                $error = "<br/><div class='alert alert-danger alert-dismissable'>
                                            
                <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
                    An error occured. Please review your activity.
                </div>";

            }

        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login | Umusanzu Wanjye</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body id="page-top" class="landing-page no-skin-config">
<div class="navbar-wrapper">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="img/logo.png" width="80px" style="display: inline;"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="page-scroll" href="index.php">AHABANZA</a></li>  
                    <li><a class="page-scroll" href="login.php">KWINJIRA</a></li>  
                    </ul>
            </div>
        </div>
    </nav>
</div>

<div class="carousel carousel-fade"> 
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="container">
                <div class="carousel-caption">
                    <h1 class="text-center"><b></b></h1> 
                </div> 
            </div>
            <div class="header-back one"></div>
        </div> 
    </div> 
</div>

<section  class="features animated fadeInRight">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 text-center m-t-lg">
                <h1 class="text-left">Fungura konti 

                <a data-toggle="modal" data-target="#register"><i class="fa fa-question-circle pull-right"></i></a></h1>

                <div class="modal inmodal" id="register" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content animated bounceInRight">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                                <h4 class="modal-title">Fungura konti</h4>
                                 
                            </div>

                            <div class="modal-body">
                                <p>1. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <p>2. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <p>3. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <p>4. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-10 col-lg-offset-1">
                <div class="ibox float-e-margins">         
                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-lg-offset-2 col-lg-6">
                                <?php echo $error; ?>
                            </div>
                        </div>

                        <form class="form-horizontal" method="POST" action="signup.php">

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Telefoni</label>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Andika telefoni" name="phone" class="form-control b-r-md"> 
                                </div>
                                <div>
                                    <span class="help-block m-b-none text-danger">*</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Imeli</label>
                                <div class="col-lg-6">
                                    <input type="email" placeholder="Andika imeli" name="email" class="form-control b-r-md" > 
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Ijambo ry'ibanga</label>
                                <div class="col-lg-6">
                                    <input type="password" placeholder="Ijambo ry'ibanga" name="password" class="form-control b-r-md"> 
                                </div>
                                <div>
                                    <span class="help-block m-b-none text-danger">*</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Ijambo ry'ibanga</label>
                                <div class="col-lg-6">
                                    <input type="password" placeholder="Emeza ijambo ry'ibanga" name="repassword" class="form-control b-r-md"> 
                                </div>
                                <div>
                                    <span class="help-block m-b-none text-danger">*</span>
                                </div>
                            </div>

                            <div class="form-group m-t-lg">
                                <div class="col-lg-offset-2 col-lg-6">
                                    <button class="btn btn-w-m b-r-md btn-success" name="submit" type="submit"><strong>Ohereza</strong></button> 
                                </div>
                            </div>

                        </form>  

                    </div>
                </div>
            </div>
        </div> 
    </div>

</section>


<!--<section class="gray-section footer m-t-lg">
    <div class="container">        
        <div class="row">
            <div>
                <div class="pull-right">
                    Developed by <a href="team.php"><strong>SoICT Developers</strong></a>
                </div>
                <div>
                    <h5>Copyright <strong>Umusanzu wanjye</strong>  &copy; 2019</h5>
                </div>
            </div>
        </div>
    </div>
</section>-->


<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>
<script src="js/plugins/wow/wow.min.js"></script>


<script>

    $(document).ready(function () {

        $('body').scrollspy({
            target: '.navbar-fixed-top',
            offset: 80
        });

        // Page scrolling feature
        $('a.page-scroll').bind('click', function(event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
            $("#navbar").collapse('hide');
        });
    });

    var cbpAnimatedHeader = (function() {
        var docElem = document.documentElement,
                header = document.querySelector( '.navbar-default' ),
                didScroll = false,
                changeHeaderOn = 200;
        function init() {
            window.addEventListener( 'scroll', function( event ) {
                if( !didScroll ) {
                    didScroll = true;
                    setTimeout( scrollPage, 250 );
                }
            }, false );
        }
        function scrollPage() {
            var sy = scrollY();
            if ( sy >= changeHeaderOn ) {
                $(header).addClass('navbar-scroll')
            }
            else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }
        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }
        init();

    })();

    // Activate WOW.js plugin for animation on scrol
    new WOW().init();

</script>

</body>
</html>
