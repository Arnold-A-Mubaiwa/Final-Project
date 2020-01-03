
<?php
session_start();
require_once('connection.php');
// $table= $_SESSION['table'];
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <div class="result">
                <?php
                      $sql = "SELECT * FROM sys.tables WHERE StudentNumber = ?";
                      if($result = mysqli_query($conn, $sql)){
                          if(mysqli_num_rows($result) > 0){
                              echo "<table id ='myTable' class='table table-bordered table-striped'>";
                                  echo "<thead>";
                                      echo "<tr>";
                                          echo "<th>Student Number</th>";
                                          echo "<th>Name</th>";
                                          echo "<th>Surname</th>";;
                                          echo "<th>Faculty</th>";
                                          echo "<th>Year Of Study</th>";
                                          echo "<th>Date Of Attendance</th>";
                                      echo "</tr>";
                                  echo "</thead>";
                                  echo "<tbody>";
                                  while($row = mysqli_fetch_array($result)){
                                      echo "<tr>";
                                          echo "<td>" . $row['StudentNumber'] . "</td>";
                                          echo "<td>" . $row['Name'] . "</td>";
                                          echo "<td>" . $row['Surname'] . "</td>";
                                          echo "<td>" . $row['Faculty'] . "</td>";
                                          echo "<td>" . $row['YearOfStudy'] . "</td>";
                                          echo "<td>" . $row['DateOfAttendance'] . "</td>";
                                          echo "</tr>";
                                  }
                                  echo "</tbody>";                            
                              echo "</table>";
                              // Free result set
                              mysqli_free_result($result);
                          } else{
                              echo "<p class='lead'><em>No records were found.</em></p>";
                          }
                      } else{
                          echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                      }
                      // Close connection
                      mysqli_close($conn);
                      ?>
                       </div>
</body>
</html>