<?php
if(count($_POST)>0) {
    require_once('connection.php');
    $UniqueNo=abs( crc32( uniqid() ) );
    $sql="UPDATE Lecturers set UniqueNumber='" . $UniqueNo . "' WHERE LecturerNumber='" . $_POST['LecturerNumber'] . "'";
    if( mysqli_query($conn,$sql)){
   
    }
    else{
        header("location: error.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<link rel="stylesheet" href="main.css">
    <style type="text/css">
        .wrapper{
            width: 750px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Success Request</h1>
                    </div>
                    <div class="alert alert-success fade in">
                        <p>You have successfully assigned a new Code. </br> 
                       The Staff member will be provided with their Unique Code through sms shortly. </br>
                        </p>
                    </div><a href="Advanced.html">
					<button class="btn btnSubmit">
					DONE
					</button></a>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>