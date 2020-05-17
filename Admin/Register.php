<?php
session_start();
require_once('connection.php');
$table= $_SESSION['table'];
// echo $table;
?>
<!Doctype html>
<html>

    <head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style>
        
            th{
            background-color: rgb(11, 19, 46);
            color:white;
            font-size:14px;
            padding-left:10px;
            padding-right:10px;
        }
        table tr td:last-child a{
            margin-right: 10px;
        }
        body{
            padding:40px;
        }
        td{
            font-size:12px;
        }
        .search-btn{
            width:50%;
            height:40px;
            border-radius:15px;
            border: 2px solid rgb(11, 19, 46);
            padding-left:20px;
            margin-left:4%;
        }
        #scrolls{
            overflow:auto;
            height:398px;
            /* background-color:blue; */
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
    td = tr[i].getElementsByTagName("td")[0];
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
            <a href="Advanced.php" class="btn">Back</a>
        <div class="wrapper">
    <div class="search-box">
    <div align="center">
    <input type="text" id="myInput" class="search-btn" onkeyup="myFunction()" placeholder="Search for Student Number.."><br><br>
      </div>
        <div class="result">
        <div id="scrolls">
            <?php
                  $sql = "SELECT * FROM $table";
                  if($result = mysqli_query($conn, $sql)){
                      if(mysqli_num_rows($result) > 0){
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
                              while($row = mysqli_fetch_array($result)){
                                  echo "<tr>";
                                      echo "<td>" . $row['StudentNo'] . "</td>";
                                      echo "<td>" . $row['Name'] . "</td>";
                                      echo "<td>" . $row['Surname'] . "</td>";
                                      echo "<td>" . $row['Module']. "</td>";
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
                   </div>
        </div>
            </div>
        </div>
    </body>
</html>