<?php
session_start(); 
require_once "connection.php";

    // Prepare a select statement
    $sql = "SELECT * FROM Students WHERE StudentNumber = ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["StudentNumber"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $Name = $row["Name"];
                $Surname = $row["Surname"];
                $Faculty = $row["Faculty"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    // mysqli_close($conn);
// } else{
//     // URL doesn't contain id parameter. Redirect to error page
//     header("location: error.php");
//     exit();
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="main.css">
    <script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    fieldset {
  display: block;
  margin-left: 2px;
  margin-right: 2px;
  padding-top: 0.35em;
  padding-bottom: 0.625em;
  padding-left: 0.75em;
  padding-right: 0.75em;
 width: 48%;
  border: 2px solid rgb(11, 19, 46);
 
}
#Attendance{
    float:right;
}
#pers{
    float:left;
}
body{
    margin-left: 5%;
    margin-right: 5%;
}
#big-field{
    width: 100%;
}
.search-btn{
            width:50%;
            height:40px;
            border-radius:15px;
            border: 2px solid rgb(11, 19, 46);
            padding-left:20px;
            margin-left:4%;
        }
        <style type="text/css">
        .page-header h2{
            margin-top: 0;
        }
        th{
            background-color: rgb(11, 19, 46);
            color:white;
        }
        table tr td:last-child a{
            margin-right: 10px;
        }
        body{
            padding:40px;
        }
        td{
            font-size:14px;
        }
        .addBTN{
            background-color: rgb(11, 19, 46);
            color:white;
        }
        tr{
            background-color: lightgray;
            color:black;
        }
    </style>
      <script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[5];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
</head>
<body>
<div>
<a href="Students.php" class="btn">Back</a>
<button class="btn" id="prints">PRINT<i class="fa fa-print"style="color: rgb(11, 19, 46);"></i></button>
    </div>
<div>
    <fieldset id="pers">
        <legend>Personal Details</legend>
       <label> Student Number :</label> <?php echo $row["StudentNumber"]; $studentno=$row["StudentNumber"];?><br>
       <label>Name :</label> <?php echo $row["Name"]; ?><br>
       <label>Surname :</label> <?php echo $row["Surname"]; ?><br>
       <label>Faculty :</label> <?php echo $row["Faculty"]; ?><br>
       <label>Qualification:</label> <?php echo $row['Qualification']; ?><br>
    </fieldset>
    <fieldset id="Attendance">
        <legend>Contact Details</legend>
        <label>Contact Number :</label> <?php echo $row["ContactNumber"]; ?><br>
        <label>Email :</label> <?php echo $row["Email"]; ?><br>
        <label>Guardian Contact No :</label> <?php echo $row["GuardianContactNo"]; ?><br>
        <label>Guardian Email Address:</label> <?php echo $row['GuardianEmailAd']; ?><br>
    </fieldset>
    <fieldset id="big-field" scrolling="yes">
    <legend> Attendance</legend>
    <div align="center">
    <input type="text" id="myInput" class="search-btn" onkeyup="myFunction()" placeholder="Search By Date..">
    </div>                 
    <?php
require_once('connection.php');
$sqlT = "SELECT TableName FROM Lecturers";
if($resultT = mysqli_query($conn, $sqlT)){
 if(mysqli_num_rows($resultT) > 0){
    echo "<table id ='myTable' class='table table-bordered table-striped'>";
    echo "<thead>";
        echo "<tr>";
            echo "<th>Student Number</th>";
            echo "<th>Name</th>";
            echo "<th>Surname</th>";;
            echo "<th>Module</th>";
            echo "<th>Year Of Study</th>";
            echo "<th>Date Of Attendance</th>";
        echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while($row = mysqli_fetch_array($resultT)){
        // echo $row['TableName'];
        $table= $row['TableName'];
        // echo $table;
        $sql1 = "SELECT * FROM $table Where StudentNo = $studentno ";
            if($result1 = mysqli_query($conn, $sql1)){
            if(mysqli_num_rows($result1) > 0){
                while($row1 = mysqli_fetch_array($result1)){
                    echo "<tr>";
                    echo "<td>" . $row1['StudentNo'] . "</td>";
                    echo "<td>" . $row1['Name'] . "</td>";
                    echo "<td>" . $row1['Surname'] . "</td>";
                    echo "<td>" . $row1['Module'] . "</td>";
                    echo "<td>" . $row1['YearOfStudy'] . "</td>";
                    echo "<td>" . $row1['DateOfAttendance'] . "</td>";
                    echo "</tr>";
                }          
            }
        }
        }
    }
 }
?>
</fieldset>
</div>
      <script>
           $(document).ready(function () {
                $("#prints").click(function () {
                    $(this).hide();
                    window.print();
                    $(this).show();
                });
        });
      </script>
</body>
</html>