﻿﻿<?php 
require_once('connection.php');
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE Lecturers set Name='" . $_POST['Name'] . "', Surname='" . $_POST['Surname'] . "' ,Email='" . $_POST['EmailAddress'] . "',Faculty='".$_POST['Faculty']."',ContactNumber='".$_POST['ContactNumber']."' WHERE LecturerNumber='" . $_POST['LecturerNumber'] . "'");
header('location: successUL.php');
}
// $result = mysqli_query($conn,"SELECT * FROM MyGuests WHERE id='" . $_GET['id'] . "'");
// $row= mysqli_fetch_array($result);
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Lecturer</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="" method="post">
                    <div class="form-group">   <label for="LecturerNumber">Lecturer Number</label> <input class="form-control" type="text" size="6" name="LecturerNumber" required><br>
   </div>
<div class="form-group"><label for="Name">First Name</label><input class="form-control" type="text" name="Name" required><br>
 </div>
<div class="form-group"> <label for="Surname">Last Name</label><input class="form-control" type="text" name="Surname" required><br>
 </div>
 <div class="form-group"><label for="Faculty">Faculty</label>
            <select name="Faculty" class="form-control" >
            <option>Select Faculty</option>
                <option>NP</option>
                <option>MICT</option>
                <option>BEMS</option>
                <option>PMLG</option>
            </select>
        </div>
<div class="form-group"><label for="ContactNumber">Contact Number</label><input class="form-control" type="text" name="ContactNumber" required><br>
   </div>
<div class="form-group"><label for="EmailAddress">Email Address</label><input class="form-control" type="email" name="EmailAddress" required><br>
   </div>
                        <input type="submit" class="btn btnSubmit" value="Submit">
                        <a href="Lecturers.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>