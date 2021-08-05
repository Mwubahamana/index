<?php 
$msg="";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gusaba | Rwanda Connect Document Post</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link rel="icon" type="image/png" sizes="16x16" href="img/icon.png">

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
                <a class="navbar-brand" href="index.php">Rwanda Connect Document Post</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="page-scroll" href="index.php">Ahabanza</a></li>  
                    <li><a class="page-scroll" href="auth.php">Umugenzuzi</a></li>
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

<section  class="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 text-center m-t-lg">
                <h1 class="text-left">Ikaze | <a href="index.php">Gusaba</a></h1>
<?php
	$msg = "";

	if (isset($_POST['submit'])) {
		$con = new mysqli('localhost', 'root', '', 'rcdp_db');
		$ID = $con->real_escape_string($_POST['doc_id']);
		//$IDU = $con->real_escape_string($_POST['idu']);
		$cost = $con->real_escape_string($_POST['unit_cost']);
		$tel = $con->real_escape_string($_POST['telephone']);
		$email = $con->real_escape_string($_POST['email']);
		//$Misa_uzajyamo_01 = $con->real_escape_string($_POST['Misa_uzajyamo_01']);
		$qry = $con->query("UPDATE documents SET unit_cost='$cost', telephone='$tel', email='$email', status='Requested' WHERE doc_id='$ID'")or die("NTIBIKUNZE GUSHAKA DOSIYE".mysqli_error());

                if ($qry)
                    $msg = "
					<div class='alert alert-success'>
					<button class='close' data-dismiss='alert'>&times;</button>
					<h2>Gusaba kubona Dosiye bigenze neza! <strong>Urakoze!!!</strong></h2>
					</div>";
                else
                    $msg = "
					<div class='alert alert-danger'>
					<button class='close' data-dismiss='alert'>&times;</button>
					<h2><strong>Gusaba kubona Dosiye ntikunze! Ongera ugerageze!</strong></h2>
					</div>";
	}
?>				
            <?php if ($msg != "") echo $msg . "<br><br>" ?>
			</div>
            <div class="col-lg-10 col-lg-offset-1">
                <div class="ibox float-e-margins">        
                    <div class="ibox-content">


                        <div class="col-lg-10 col-lg-offset-2 m-t-lg">
                            <a class="btn btn-sm btn-white" href="index.php">Jya ahabanza</a>
                        </div>

                    </div>
                </div>
            </div>
        </div> 
    </div>

</section>


<section class="gray-section" style="bottom: 0px;">
    <div class="container">        
        <div class="row">
            <div class="m-t-lg m-b-lg">
                <div class="pull-right">
                    Developed by <a href="http://sawadevelopers.rw/"><strong>Sawa Developers</strong></a>
                </div>
                <div>
                    <h5>Copyright <strong>Rwanda Connect Document Post</strong>  &copy; <?php echo date('Y'); ?></h5>
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
