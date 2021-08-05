<?php

include_once 'dashboard/connection.php';

$error = "";

if (isset($_POST['submit'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sex = $_POST['sex'];
    $cell_id = $_POST['cell'];
    $dob = $_POST['dob'];
    $nid = $_POST['nid'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tbl_citizen";
    $res = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($res)) {
      
        $token = $row['email'];
    }

    if ($token == $email) {
        
        $error = "<div class='alert alert-danger alert-dismissable m-t-xs'>
                                
        <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
            Email Already Exists. Try again.
        </div>";

    }else{

        $query = "INSERT INTO tbl_citizen (firstname,lastname,sex,phone,cell_id,dob,nid,email,password) VALUES ('$firstname','$lastname','$sex','$phone','$cell_id','$dob','$nid','$email','$password')";
        $result = mysqli_query($conn, $query);
        
        $lastid = mysqli_insert_id($conn);

        if($result){

            $sqlQuery = "SELECT * FROM tbl_citizen WHERE citizen_id = '$lastid'";
            $resQuery = mysqli_query($conn, $sqlQuery);
            $row = mysqli_fetch_array($resQuery); 

            $names = $row['firstname'].' '.$row['lastname'];
            
            $to = $row['email'];

            $subject = "Umusanzu Wanjye Administrator"; 
            
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
            
            $message = "Hello, ".$names."\n\nYou have been created a Citizen account. \n\nTo access your new account please visit http://umusanzu.sawadevelopers.rw \n\n Umusanzu Wanjye Team.";

            if (mail($to, $subject, $message, $headers)){

                $error =  "<br/><div class='alert alert-success alert-dismissable'>
                            
                        <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
                        Success. Email sent.

                        </div>";
                }else{
                    
                    $error = "<br/><div class='alert alert-danger alert-dismissable'>
                                
                        <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
                        Email error. Email not Sent.

                    </div>";
                }
                
            $error = "<br/><div class='alert alert-success alert-dismissable'>
                                        
            <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
                Account Created Successfully.
            </div>";
                                                           
        }else{

            $error = "<br/><div class='alert alert-danger alert-dismissable'>
                                    
            <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
                An error occured. Please review your activity.
            </div>";

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

    <title>Register | Umusanzu Wanjye</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <script type="text/javascript">
     function configureDropDownLists(ddl1,ddl2,dd13) {
        var kigali = ['Gasabo', 'Kicukiro', 'Nyarugenge'];
        var north = ['Burera', 'Gakenke', 'Gicumbi','Musanze','Rulindo'];
        var south = ['Gisagara', 'Huye', 'Kamonyi','Muhanga','Nyamagabe','Nyanza','Nyaruguru','Ruhango'];
        var east = ['Bugesera','Gatsibo','Kayonza','Kirehe','Ngoma','Nyagatare','Rwamagana'];
        var west = ['Karongi','Ngororero','Nyabihu','Nyamasheke','Rubavu','Rusizi','Rutsiro'];
        
        var gasabo = ['Bumbogo','Gatsata','Gikomero','Gisozi','Jabana','Jali','Kacyiru','Kimihurura','Kimiromko','Kinyinya','Ndera','Nduba','Remera','Rusororo','Rutunga'];
        var kicukiro = ['Gahanga','Gatenga','Gikondo','Kagarama','Kanombe','Kicukiro','Kigarama','Masaka','Niboye','Nyarugunga'];
        var nyarugenge = ['Nyarugenge','Gitega','Kanyinya','Kigali','Kimisagara','Mageragere','Muhima','Nyakabanda','Nyamirambo','Nyarugenge','Rwezamenyo'];

    switch (ddl1.value) {
        case 'kigali':
            ddl2.options.length = 0;
            for (i = 0; i < kigali.length; i++) {
                createOption(ddl2, kigali[i], kigali[i]);
            }
            break;
        case 'north':
            ddl2.options.length = 0; 
        for (i = 0; i < north.length; i++) {
            createOption(ddl2, north[i], north[i],north[i],north[i]);
            }
            break;
        case 'south':
            ddl2.options.length = 0;
            for (i = 0; i < south.length; i++) {
                createOption(ddl2, south[i], south[i],south['i'],south['i'],south['i'],south['i']);
            }
            break;
        case 'east':
            ddl2.options.length = 0;
            for (i = 0; i < east.length; i++) {
                createOption(ddl2, east[i], east[i],east['i'],east['i'],east['i'],east['i']);
            }
            break;
         case 'west':
            ddl2.options.length = 0;
            for (i = 0; i < west.length; i++) {
                createOption(ddl2, west[i], west[i],west['i'],west['i'],west['i'],west['i']);
            }
            break;
            default:
                ddl2.options.length = 0;
            break;
    }
}

    function createOption(ddl, text, value) {
        var opt = document.createElement('option');
        opt.value = value;
        opt.text = text;
        ddl.options.add(opt);
    }
</script>
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
                <a class="navbar-brand" href="index.php">UMUSANZU WANJYE</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="page-scroll" href="index.php">Main Page</a></li>  
                    <li><a class="page-scroll" href="login.php">Login</a></li> 
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
                    <h1 class="text-center"><b>Create Citizen Account</b></h1> 
                </div> 
            </div>
            <div class="header-back one"></div>
        </div> 
    </div> 
</div>

<section  class="container features">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 text-center m-t-lg">
            <h1 class="text-left">Create account</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="ibox float-e-margins">         
                <div class="ibox-content">
                    <div class="row">

                        <?php echo $error; ?>

                        <form name="form" method="POST" action="register.php" enctype="multipart/form-data">

                            <div class="col-sm-6 b-r">

                                <div class="form-group">
                                    <label>Firstname</label> 
                                    <input type="text" placeholder="Enter firstname" name="firstname" class="form-control b-r-md" required="">
                                </div>

                                <div class="form-group">
                                    <label>Lastname</label> 
                                    <input type="text" placeholder="Enter lastname" name="lastname" class="form-control b-r-md" required="">
                                </div>

                                <div class="form-group m-t-md">
                                    <div class="i-checks">
                                        <label> Sex &nbsp;&nbsp;
                                            <input type="radio" checked="" value="Male" name="sex" > <i></i> Male 
                                        </label>&nbsp;&nbsp;
                                        <label> 
                                            <input type="radio" value="Female" name="sex"> <i></i> Female 
                                        </label>
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <label>Province</label>
                                    <select class="form-control m-b" name="province" id="ddl" onChange="configureDropDownLists(this,document.getElementById('ddl2'))"required >
                                    <option  value="" selected="selected" disabled="disabled">-----Select your  Province ----</option>
                                        <option value="kigali">Kigali City</option>
                                        <option value="north">Northern Province</option>
                                        <option value="south">Southern Province</option>
                                        <option value="east">Eastern Province</option>
                                        <option value="west">Western Province</option>     
                                    </select>  
                                </div>

                                <div class="form-group">
                                    <label>District</label>
                                    <select class="form-control" name="district" id="ddl2"/>
                                        <option  value="" selected="selected" disabled="disabled">-----Select District ----</option>  
                                    </select>  
                                </div>  

                                <div class="form-group">
                                    <label>Sector</label>
                                    <select class="form-control m-b" name="sector">
                                        <option>Niboye</option>
                                        <option>Kanombe</option>
                                        <option>Kabeza</option>     
                                    </select>  
                                </div>

                                <div class="form-group">
                                    <label>cell</label>
                                    <select class="form-control m-b" name="cell">
                                        <option>Niboye</option>
                                        <option>Kanombe</option>
                                        <option>Kabeza</option>     
                                    </select>  
                                </div>

                            </div>

                            <div class="col-sm-6">

                                <div class="form-group">
                                    <label>Year of Born</label> 
                                    <!--<input type="text" placeholder="Enter Year of Born" data-mask="9-9999-9-9999999-9-99" class="form-control b-r-md">-->
                                    <select class="form-control" name="dob" id="ddl2" required />
                                      <option  value="" selected="selected" disabled="disabled">-----Select Birth Year ----</option>
                                      <option>  <?php
                                        $y = date("Y", strtotime("+8 HOURS"));
                                        for($year = 1930; $y >= $year; $y--){
                                          echo "<option value = '".$y."'>".$y."</option>";
                                        }?>
                                    </option>
                                  </select>
                                </div>

                                <div class="form-group">
                                    <label>NID</label> 
                                    <input type="text" placeholder="ID Number" data-mask="9-9999-9-9999999-9-99" name="nid" class="form-control b-r-md" required="">
                                </div>

                                <div class="form-group">
                                    <label>Phone</label> 
                                    <input type="text" class="form-control b-r-md" data-mask="9999-999-999" placeholder="Enter phone number" name="phone" required=""> 
                                    <small><span class="help-block m-b-none">Example: 0788 123 456</span></small>
                                </div>

                                <div class="form-group">
                                    <label>Email</label> 
                                    <input type="email" placeholder="Enter email" class="form-control b-r-md" name="email" required="">
                                </div>

                                <div class="form-group">
                                    <label>Password</label> 
                                    <input type="password" placeholder="Enter Password" class="form-control b-r-md" name="password" required="">
                                </div>

                                <div class="form-group">
                                    <label>Confirm password</label> 
                                    <input type="password" placeholder="Re-type password" class="form-control b-r-md" name="cPassword">
                                </div>

                                <div>
                                    <strong><input  type="submit" name="submit" class="btn btn-w-m b-r-md btn-success"value="Create account"></strong>
                                </div>

                            </div>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div> 
</section>

<section id="contact" class="gray-section contact">
    <div class="container">        
        <div class="row">
            <div class="m-t-lg m-b-lg">
                <div class="pull-right">
                    Developed by <a href="team.php"><strong>SoICT Developers</strong></a>
                </div>
                <div>
                    <h5>Copyright <strong>Umusanzu wanjye</strong>  &copy; 2019</h5>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script> 
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script> 

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>
<script src="js/plugins/wow/wow.min.js"></script>
<script src="js/plugins/iCheck/icheck.min.js"></script> 

<!-- Input Mask-->
<script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>

<script>

    $(document).ready(function () {

        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });

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
