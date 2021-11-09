<?php
session_start();
require_once("connection.php");
$table =$_SESSION['login_TableName'];
$date = date("Y-m-d");
// echo $date;
	if($_SERVER["REQUEST_METHOD"]== "POST"){
        $lecturerId = $_POST['StudentNumber'];
        $sql = "SELECT * from Students Where StudentNumber = '". $_POST['StudentNumber']."' && Faculty = '".$_SESSION['login_Faculty']."'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $userSN = $row['StudentNumber'];
        $userName = $row['Name'];
        $userSurname = $row['Surname'];
        // $userQualification = $row['Qualification'];
        $userModule = $_SESSION['module'];
        $userYearOfStudy = $row['YearOfStudy'];
        $count = mysqli_num_rows($result);
        
        $checkIfSignedIn= mysqli_query($conn, "SELECT * FROM $table WHERE StudentNo='". $_POST['StudentNumber']."'&& Module='".$userModule."' && DateOfAttendance LIKE '%$date%'");
        // $row1 = mysqli_fetch_array($checkIfSignedIn,MYSQLI_ASSOC);
        $count1 = mysqli_num_rows($checkIfSignedIn);
    
        if($count === 1 && $count1 === 0){
            // session_register("myusername");
            $sql = "INSERT INTO $table(StudentNo, Name,Surname,Module,YearOfStudy)VALUES ('" .$userSN . "','" .$userName . "','" .$userSurname . "','".$userModule."','".$userYearOfStudy."')";
            mysqli_query($conn,$sql);
            $current_id = mysqli_insert_id($conn);
        }elseif($lecturerId === $_SESSION['login_ID']){
            header('location: checkAttendace.php');
        }
        else {
            header('location: error.php');
        //    echo $count1;
        //    echo $userModule;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href= "../css/index.css">
	<script src="../jquery-1.3.2.min.js/jquery-1.3.2.min.js"></script>
	<script src="../js/data.js"></script>
    <title>Durnolds Institute</title>
</head>
<body>
<div class="container">
<div id="header">
        <header>
            <p><img src="../images/homei.png"><span class="p_span">R<span class="innerLogo">ichfield</span> I<span
                        class="innerLogo">nstitute</span></span></p>
        </header>
    </div>
		 <div class= "main_div">
			 <h3>WELCOME  <br>To <?php echo $_SESSION['module']; ?> <br> With <?php echo $_SESSION['login_Name']." ". $_SESSION['login_Surname']; ?></h3>
        	<BR>
            <form autocomplete="off" class="input_group" method="post">
				<label>ENTER YOUR STUDENT NUMBER</label><br><br>
                <input id="input_box" type="text" name="StudentNumber"><br>
                <button type="submit">SUBMIT</button>
            </form>
</body>
</html>