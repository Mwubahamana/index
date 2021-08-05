<?php
	$msg = "";

	if (isset($_POST['submit'])) {
		$con = new mysqli('localhost', 'root', '', 'rcdp_db');
		$timestamp = date("m/d/Y h:i:s a", time());
		$ID = $_POST['doc_id'];

		$tel = $con->real_escape_string($_POST['telephone']);
		$email = $con->real_escape_string($_POST['email']);
		$qry = $con->query("UPDATE documents SET telephone='$tel', email='$email', status='Requested'  WHERE id='$ID'")or die("NTIBIKUNZE GUSHAKA DOSIYE".mysqli_error());

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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shaka | Rwanda Connect Document Post</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	
	<link rel="icon" type="image/png" sizes="16x16" href="img/icon.png">

    <!-- Custom styles for this template -->
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
                <a class="navbar-brand" href="index.php">Rwanda Connect Document Post</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="page-scroll" href="index.php">Ahabanza</a></li>  
                    <li><a class="page-scroll" href="auth.php">Umugenzuzi</a></li> 
                    <!--<li><a class="page-scroll" href="about.php">About</a></li> -->
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
                    <h1 class="text-center"><b>Your collaboration is important to us</b></h1> 
                </div> 
            </div>
            <div class="header-back one"></div>
        </div> 
    </div> 
</div>

<section  class="container features">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 text-center m-t-lg">
            <h1 class="text-left">Shaka dosiye yawe hano</h1>
        </div>
    </div>
<?php 
$conn = new mysqli('localhost', 'root', '', 'rcdp_db');
$msg="";
$shaka=$_POST['Amazina'];
$sql = "SELECT * FROM documents WHERE doc_owner='$shaka' and status='Received'";
$result = mysqli_query($conn,$sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0){
	while($row = mysqli_fetch_assoc($result)){
	$ID = $row['doc_id'];	
	$DOC = $row ['doc_type'];
	//echo $ID;
?>
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="ibox float-e-margins">         
                <div class="ibox-content">
                    <div class="row">
						<?php if ($msg != "") echo $msg . "<br><br>" ?>
						
                        <form onSubmit="return check();" name="form" method="post" action="guhindura.php">

                            <div class="col-sm-6 b-r">

								<div class="form-group">
									<input name="doc_id" class="form-control"  type="hidden" value="<?php echo $row ['doc_id']; ?>"/>
								</div>
                                <div class="form-group">
                                    <label>Amazi yombi</label> 
                                    <input type="text" value="<?php echo $row ['doc_owner']; ?>" name="Amazina" class="form-control b-r-md" disabled="disabled">
                                </div>

                                <div class="form-group">
                                    <label>Ubwoko bwa Dosiye</label> 
                                    <input type="text" value="<?php echo $row ['doc_type']; ?>" name="Umuryango_remezo" class="form-control b-r-md" disabled="disabled">
                                </div>

								<?php include 'dbcon.php';
   								$sql = $conn ->prepare("SELECT cost FROM category WHERE name = '$DOC'");
                                           $sql -> execute();
                                           $count = $sql->fetchAll(); 
                                           foreach ($count as $field);
                                ?>
								<div class="form-group">
                                    <label>Igiciro cya Dosiye</label> 
                                    <input type="text" value="<?php echo $field['cost'];?>" name="unit_cost" class="form-control b-r-md" disabled="disabled">
									<small><span class="help-block m-b-none">RWF (Aya mafaranga niyo yishurwa kugirango ubone Dosiye)</span></small>
                                </div>

                                 
								<div class="form-group">
                                    <label>Telefoni</label> 
                                    <input type="text" class="form-control b-r-md" data-mask="9999999999" value="" name="telephone" id="tel"> 
                                    <small><span class="help-block m-b-none">Example: 0788 123 456</span></small>
									<label class="col-lg-12 control-label" id="telmessage"></label> 
                                </div>
								
								<div class="form-group">
                                    <label>Imeli</label> 
                                    <input type="email" class="form-control b-r-md" value="" name="email" id="email"> 
                                    <small><span class="help-block m-b-none">Example: someone@gmail.com</span></small>
									<label class="col-lg-12 control-label" id="emailmessage"></label> 
                                </div>

                                <!--<div class="form-group m-t-md">
                                    <div class="i-checks">
                                        <label> Sex &nbsp;&nbsp;
                                            <input type="radio" value="Male" name="sex"> <i></i> Male 
                                        </label>&nbsp;&nbsp;
                                        <label> 
                                            <input type="radio" checked="" value="Female" name="sex"> <i></i> Female 
                                        </label>
                                    </div> 
                                </div>-->

                            <div class="row">
								<div class="col-lg-10 col-lg-offset-1 text-center m-t-lg">
									<h1 class="text-left">Igiciro: <?php echo $field['cost'];?> RWF</h1>
								</div>
							</div> 
							
                            </div>

                            <div class="col-sm-6">

                                <div class="form-group">
                                    <label>Ifoto ya Dosiye</label> 
                                    <img src="agent/attachments/<?php echo $row['image']; ?>" width="100%" height="auto">
                                </div>
								 

                    <!--</div><!-- end of col-sm-6 --> 
					<!-- ******************************************************** END ***********************************************************-->   

								<div>
									<strong><input type="submit" name="submit" class="btn btn-w-m b-r-md btn-success"value="Ohereza"></strong>
                                </div>

                            </div>

                        </form> 
                    </div>
					
					<div class="row">
						<div class="col-lg-10 col-lg-offset-1 text-center m-t-lg">
							<h1 class="text-left">Andi Madosiye yawe</h1>
						</div>
					</div>
					
					<div class="ibox-content">
                    <div class="table-responsive">
                    	<table class="table table-striped table-bordered table-hover dataTables-example" >
                    		<thead>
				                <tr>
				                    <th>#</th>
				                    <!--<th>Igihe byakorewe</th>-->
				                    <th>Amazina yombi</th>
				                    <th>Ubwoko bwa dosiye</th>
									<th>Telephoni</th>
				                    <th>Imeli</th>
									<th>Hindura</th>
				                </tr>
                    		</thead>

							<tbody>
							<?php 
							$conn = new mysqli('localhost', 'root', '', 'rcdp_db');
							$msg="";
							$shaka=$_POST['Amazina'];
							$sql = "SELECT * FROM documents WHERE doc_owner='$shaka' and doc_id!='$ID'";
							$result = mysqli_query($conn,$sql);
							$resultCheck = mysqli_num_rows($result);
							
							if($resultCheck > 0){
								while($row = mysqli_fetch_assoc($result)){
								$ID = $row['doc_id'];	
							?> 
							<tr>
							  <td><?php echo $row ['doc_id']; ?></td>
							  <!--<td><?php //echo $rows ['byakozwe']; ?></td>-->
							  <td><?php echo $row ['doc_owner']; ?> </td>
							  <td><?php echo $row ['Telefoni']; ?></td>
							  <td><?php echo $row ['Imeli']; ?></td>
							  <td>
								  <div class="btn-group">
							  		<a class="btn btn-success" target="_blank" href="sub_registered.php<?php echo '?doc_id='.$ID; ?>"><i class="fa fa-envelope"></i><i class="fa fa-check"></i></a>
								 </div>
							  </td>
							</tr>
							 <?php } }?> 
				 			</tbody>
                    	</table>
                    </div>
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
                    Developed by <a href="http://sawadevelopers.rw/"><strong>Sawa Developers</strong></a>
                </div>
                <div>
                    <h5>Copyright <strong>Rwanda Connect Document Post</strong>  &copy; <?php echo date('Y'); ?></h5>
                </div>
            </div>
        </div>
    </div>
<?php 
	}
}else{
	//echo "IMPOSSIBLE"; 
	echo "<script>alert('Nta Dosiye yawe dufite mububiko bwacu! Urabeho!!!');window.location.href='login.php';</script>";
}?>
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


<script type="text/javascript">
        function check(){
            var a = document.getElementById("misa").value;
            if(a =="Hitamo Misa uzumva"){
                document.getElementById("misamessage").innerHTML="** Hitamo Misa uzumva **";
                return false;
            }

        }
</script>

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

<script type="text/javascript">
        function check(){
            var a = document.getElementById("tel").value;
            var b = document.getElementById("email").value;
			if(a ==""){
                document.getElementById("telmessage").innerHTML="** Shyiramo Nimero yawe ya Telefoni **";
                return false;
            }
			else if(a.length < 10){
                document.getElementById("telmessage").innerHTML="** Imibare ntago yuzuye neza **";
                return false;
            }
            // else if(!isNaN(a)){
            //     document.getElementById("emamessage").innerHTML="** Only Character allowed **";
            //     return false;
            // }
            else if(b ==""){
                document.getElementById("emailmessage").innerHTML="** Shyiramo Imeli **";
                return false;
            }

        }
</script>

</body>
</html>