<?php

include 'dbcon.php';

$error = ""; 

         
if(isset($_POST["submit"])){

$email=$_POST['email'];
$password=$_POST['password'];

    if($email =="" || $password ==""){

        $error  = "<div class='alert alert-danger alert-dismissable'>
                
            <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
                Uzuza ibisabwa byose.

            </div>";

    }else{
		
		$stmt = $conn->prepare("SELECT * FROM tbl_users WHERE email = '$email' and password = '$password'")or die("mysl_error");
		$stmt->execute(array(":email_id"=>$email,":pass"=>$password));
		$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
        $user_id = $userRow['user_id'];
        $user_status = $userRow['user_status'];
		$type = $userRow['type'];

         
        if($stmt->rowCount() == 1){
			
			if($type =='d'){
				//echo"<p>Your account is deactivated by the site Admin</p>";
				 $error  = "<div class='alert alert-danger alert-dismissable'>
							<button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
                        			Konti yawe yafunzwe n'ubugenzuzi bwacu.
							</div>";
			}else{
			
            session_start();
            $_SESSION['user_id'] = $user_id;  

            if ($user_status == 0) {

                echo "<script>window.location = 'agent.php'</script>";

            }else{

                echo "<script>window.location = 'agent/agent.php'</script>";
            }

           } 
                
        }else{

            $error  = "<div class='alert alert-danger alert-dismissable'>
                
                <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
                        Ibyo ushyizemo sibyo rwose.

            </div>";
        }
    }
}

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Agenti | Rwanda Connect Document Post</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
	<link rel="icon" type="image/png" sizes="16x16" href="img/icon.png">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <!--<h1 class="logo-name m-t-lg">MP</h1>-->
				<img alt="image" class="img img-responsive" src="dashboard/img/waka.png" /><br/>

            </div> 
			
			<?php echo $error; ?>
			<form class="m-t-lg" role="form" method="POST" action="jyamo.php">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Imeli yawe" >
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Ijambo ry'ibanga" >
                </div>
                <!--<a type="submit" href="dashboard/index.php" class="btn btn-primary block full-width m-b">Login</a>-->
				<button type="submit" name="submit" class="btn btn-success block full-width m-b">Injira</button>

                <a href="agent/forgot.php"><small>Wibagiwe ijambo ry'ibanga?</small></a>

            </form>

            <p class="m-t"><small>Developed by <a href="https://www.sawadevelopers.rw/"><strong>Sawa Developers</strong></small></p>
        </div>

        <a href="index.php" class="btn-sm btn-white m-b">Garuka ahabanza</a>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
