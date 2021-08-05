<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ikaze | Rwanda Connect Document Post</title>

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
                <a class="navbar-brand" href="index.php"><img src="img/logo1.png" width="100%" style="display: inline;"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="page-scroll" href="index.php">Ahabanza</a></li> 
					<li><a class="page-scroll" href="jyamo.php">Agenti</a></li>  
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
                <h1 class="text-left">Ikaze | Gushaka</h1>
            </div>
            <div class="col-lg-10 col-lg-offset-1">
                <div class="ibox float-e-margins">        
                    <div class="ibox-content">
					<p>Uraho neza! <strong>Ndakuramukije</strong>, Niba uje gushaka icyangombwa cyahe hano wibuke wandike amazina yawe neza nkuko yari yanditse kuri icyo cyangombwa wabuze.</p>
						<?php 
							if(isset($_GET['inactive']))
							{
							  ?>
								<div class='alert alert-error'>
								<button class='close' data-dismiss='alert'>&times;</button>
								<strong>Sorry!</strong> This Account is not Activated Go to your Inbox and Activate it. 
							  	</div>
							<?php
							}
							?>
							<?php
								if(isset($_GET['error']))
							{
							  ?>
								<div class='alert alert-success'>
								<button class='close' data-dismiss='alert'>&times;</button>
								<strong>Wrong Details!</strong> 
							  	</div>
						<?php
							}
    					?>
						<?php //if ($msg != "") echo $msg . "<br><br>" ?>
                        <form name="form" method="post" action="registered.php" class="form-horizontal"  name="form1" id="form1" onSubmit="return check();">

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Amazina </label>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Shyiramo Amazina yawe yombi" name="Amazina" class="form-control b-r-md" id="names"> 
									<span class="text-danger"><label class="col-lg-8 control-label" id="namesmessage"><span class="text-danger"> </label> </span> 
                                </div>
                            </div>


                            <div class="form-group m-t-lg">
                                <div class="col-lg-offset-2 col-lg-6">
                                    <strong><input  type="submit" name="btn-login" class="btn btn-w-m b-r-md btn-success" value="Ohereza"></strong>
                                    <!--<label class="m-t-sm"> <input type="checkbox" name="re" id="re" value="on" class="i-checks"> Remember me </label>-->
                                </div>
                            </div>

                        </form>

                        <!--<div class="col-lg-10 col-lg-offset-2">
                            Niba ari umbwambere iyandikishe hano <a class="btn btn-sm btn-info" href="register.php">Iyandikishe</a>
                        </div>-->

                        <div class="col-lg-10 col-lg-offset-2 m-t-lg">
                            <a class="btn btn-sm btn-white" href="auth.php">Amarembo y'ubugenzuzi</a>
                        </div>

                    </div>
                </div>
            </div>
        </div> 
    </div>
<?php //}?>	
</section>


<section class="gray-section" style="bottom: 0px;">
    <div class="container">        
        <div class="row">
            <div class="m-t-lg m-b-lg">
                <div class="pull-right">
                    Developed by <a href="https://www.sawadevelopers.rw/"><strong>Sawa Developers</strong></a>
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

<script type="text/javascript">
        function check(){
            var a = document.getElementById("names").value;

			if(a ==""){
                document.getElementById("namesmessage").innerHTML="** Shyiramo Amazina yawe yombi **";
				//document.getElementById("ownermessage").innerHTML= alert("** Hitamo Misa uzumva **");
                return false;
            }

        }
</script>

</body>
</html>
