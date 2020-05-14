<?php	
// require_once "db.php";
// require_once "sessions_start.php";
session_start();
require_once("connection.php");
	if($_SERVER["REQUEST_METHOD"]== "POST"){
	$UniqueCode = mysqli_real_escape_string($conn,$_POST['passcode']);
	//$userName= $_GET['Name'];
	//$userSurname = $_GET['Surname'];
	$sql = "SELECT UniqueNumber from Lecturers Where UniqueNumber= '$UniqueCode'";
	$sqlSESSION = "SELECT * from Lecturers Where UniqueNumber= '$UniqueCode'";
    $sql2 = "SELECT UniqueID  from Admin Where UniqueID= '$UniqueCode'";
    //Query the database
	$result = mysqli_query($conn,$sql);
	$result2 = mysqli_query($conn,$sql2);
    $result3 =mysqli_query($conn,$sqlSESSION);
     
    //
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
    $row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC);

    //
    $userID = $row3['LecturerNumber'];
    $userName = $row3['Name'];
    $userSurname = $row3['Surname'];
    $userTableName = $row3['TableName'];
    $userFaculty = $row3['Faculty'];
	$active = $row['active'];
    $active2 = $row2['active'];
    
    //Checking if there are any records available
	$count = mysqli_num_rows($result);
	$count2 = mysqli_num_rows($result2);

	if($count === 1){
		// session_register("myusername");
		$_SESSION['login_ID']=$userID;
		$_SESSION['login_Name']= $userName;
        $_SESSION['login_Surname']= $userSurname;
        $_SESSION['login_TableName']=$userTableName;
        $_SESSION['login_Faculty']= $userFaculty;
		header("location: Client/confimation.php");
	}else if ($count2==1) {
		header("location: Admin/admin.php");
	}else {
        header("location: error.php");
    }
}

 ?>
 <!DOCTYPE html>
 <html>

 <head>
     <meta charset='utf-8'>
     <meta http-equiv='X-UA-Compatible' content='IE=edge'>
     <title>LOGIN PAGE</title>
     <meta name='viewport' content='width=device-width, initial-scale=1'>

     <link rel="stylesheet" type="text/css" href="css/index.css">


 </head>
 <body>

 <div class="container">
    
     <div id="header">
        <header>
            <p><img src="images/homei.png"><span class="p_span">D<span class="innerLogo">urnolds</span> I<span
                        class="innerLogo">nstitute</span></span></p>
        </header>
    </div>
     <div class="main_div">
         <h2>STAFF SIGN IN</h2>
         <p>ENTER YOUR ASSIGNED CODE</p><BR>
         <form class="input_group" id="form" method="post" action="">
             <input id="input_box" type="password" name="passcode" placeholder="unique code"></br>
             <input class="button" type= "submit" value="Submit">
         </form>
     </div>
 </div>

 <script type="text/javascript" src="javascript/indexjs.js"></script>

 <script src='main.js'></script>
 </body>
 </html>