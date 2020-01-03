<?php
session_start();
require_once('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Confirm</title>
	<script type="text/javascript" src="../jquery-1.3.2.min.js/jquery-1.3.2.min.js"></script>
	<script typetext="text/javascript" src="../http://code.jquery.com/jquery-latest.min.js"></script>
	<link rel="stylesheet" type="text/css" href= "../css/main.css">
	<style>
	.conf-table{
			 font-style: italic;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
			margin-left: 30%;
	}
	td{
		padding-right:20px;
	}
	</style>
</head>
<body onload="closeTab()">
	<div class="container">
		<div id="logo_container">
			<img class="img-responsive" id="Logo" src="../images/home.png">
		</div>
		<div class= "main_div">
				<!-- <img class="Lecture_img" src="../images/lectures/photo.png"> -->
			<p>
				<table class="conf-table">
					<tr><td>Lecturer Number</td><td>: <?php echo $_SESSION['login_ID'] ?></td></tr>
					<tr><td>Name</td><td>: <?php echo $_SESSION['login_Name']  ?></td></tr>
					<tr><td>Surname</td><td>: <?php echo $_SESSION['login_Surname']  ?></td></tr>
					<tr><td>Faculty</td><td>: <?php echo $_SESSION['login_Faculty']  ?></td></tr>
				</table>
				<!-- <span id="ICAS_NUMBER">
					<?php echo $_SESSION['login_ID'] ?>
				</span><BR>
				<span id="Name"><?php echo $_SESSION['login_Name']  ?></span>
				<span><?php echo $_SESSION['login_Surname']  ?></span>
			</p>
			<p>Faculty Of<br>
				<span id="Faculty"><?php echo $_SESSION['login_Faculty']  ?></span> 
			</p> -->
			<a href="Choose.php">
			
				<button id="confirm">
					Confirm
				</button>
			</a><br>
			<a href="../index2.php" class="btn btn-default">Not You?</a></form> 
			
		</div>
	</div>
</body>
</html>