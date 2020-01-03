﻿﻿<?php 
require_once('connection.php');
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE Students set  Name='" . $_POST['Name'] . "', Surname='" . $_POST['Surname'] . "' ,Faculty='" . $_POST['Faculty'] . "',Qualification='".$_POST['Qualification']."',YearOfStudy='".$_POST['YearOfStudy']."',ContactNumber='".$_POST['ContactNumber']."',Email='".$_POST['Email']."',GuardianContactNo ='".$_POST['GuardianContactNo']."',GuardianEmailAd ='".$_POST['GuardianEmailAd']."' WHERE StudentNumber='" .$_POST['StudentNumber']. "'");
header('location: successUS.php');
}
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
                        <h2>Update Student</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="" method="post">
                    <div class="form-group">   <label for="StudentNumber">Student Number</label> <input class="form-control" type="text" name="StudentNumber" size="6" required><br>
   </div>
<div class="form-group"><label for="Name">First Name</label><input class="form-control" type="text" name="Name" ><br>
 </div>
<div class="form-group"> <label for="Surname">Last Name</label><input class="form-control" type="text" name="Surname" ><br>
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
<div class="form-group"><label for="Qualification">Qualification</label><input class="form-control" type="text" name="Qualification" ><br>
   </div>
   <div class="form-group"><label for="YearOfStudy">Faculty</label>
            <select class="form-control" name="YearOfStudy">
                <option>1st Year</option>
                <option>2nd Year</option>
                <option>3rd Year</option>
            </select>
        </div>
<div class="form-group"><label for="ContactNumber">Contact Number</label><input class="form-control" type="text" name="ContactNumber" ><br>
   </div>
<div class="form-group"><label for="Email">Email</label><input class="form-control" type="email" name="Email" ><br>
   </div>
<div class="form-group"><label for="GuardianContactNo">Guardian ContactNo</label><input class="form-control" type="text" name="GuardianContactNo" ><br>
   </div>
<div class="form-group"><label for="GuardianEmailAd">Guardian Email Address</label><input class="form-control" type="email" name="GuardianEmailAd" ><br>
   </div>
                        <input type="submit" class="btn btnSubmit" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>