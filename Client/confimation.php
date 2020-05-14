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
	<link rel="stylesheet" type="text/css" href= "../css/index.css">
	<style>
	.conf-table{
			 font-style: italic;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
			/* margin-left: 30%; */
	}
	td{
		padding-right:20%;
		padding-left:30%;
	}
	#center_tb{
		text-align: center;
	}
	</style>
</head>
<body onload="closeTab()">
	<div class="container">
	<div id="header">
        <header>
            <p><img src="../images/homei.png"><span class="p_span">D<span class="innerLogo">urnolds</span> I<span
                        class="innerLogo">nstitute</span></span></p>
        </header>
    </div>
		<div class= "main_div">
				<!-- <img class="Lecture_img" src="../images/lectures/photo.png"> -->
			<p id="center_tb">
				<!-- <table class="conf-table"> -->
					Lecturer Number: <?php echo $_SESSION['login_ID'] ?></br>
					Name: <?php echo $_SESSION['login_Name']  ?></br>
					Surname: <?php echo $_SESSION['login_Surname']  ?></br>
					Faculty: <?php echo $_SESSION['login_Faculty']  ?></br>
				<!-- </table> -->
			<a href="Choose.php">
			
				<button id="confirm">
					Confirm
				</button>
			</a><br>
			<a href="../index.php" class="btn btn-default">Not You?</a></form> 
			
		</div>
	</div>
</body>
</html>