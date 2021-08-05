<?php
session_start();
if(!isset($_SESSION['citizen_id']) || empty($_SESSION['citizen_id'])){
	echo "<script>window.location = 'login.php'</script>";
}

?>