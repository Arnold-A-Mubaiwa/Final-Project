<?php
session_start();
require_once('connection.php');
$table = $_SESSION['login_TableName'];
?>
<!Doctype html>
<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href= "../css/index.css">
    <style type="text/css">
           
        .page-header h2{
            margin-top: 0;
        }
        th{
            background-color: rgb(11, 19, 46);
            color:white;
            padding-right:10px;
            padding-left:10px;
        }
        table tr td:last-child a{
            margin-right: 10px;
        }
       
        td{
            font-size:14px;
            
        }
        .addBTN{
            background-color: padding: 10px 20px;
            color:white;
        }
        tr{
            background-color: lightgray;
            color:black;
        }

        .search-btn{
            width:50%;
            height:40px;
            border-radius:15px;
            border: 2px solid rgb(11, 19, 46);
            padding-left:20px;
            margin-left:4%;
        }
        .Back:hover{
            background-color:lightgray;
            color:rgb(11, 19, 46);
        }
         .Back {
             /*
  background-color : white;
  color:rgb(11, 19, 46);
  padding: 10px 20px;
  border-radius: 4px;
  border-color: rgb(11, 19, 46);
} */
margin-top:10px;
width:100px;
padding: 10px 20px;
         }
.row{
    margin-top: 7em;
 
}
#scrolls{
    overflow: auto;
    height: 350px;
}
#mybutton {
    vertical-align: bottom

}
#header{
    position:fixed;
    text-align: center;
    width:100%;
    /* overflow: hidden;
    background-color: #333; */
    display:block;
    top: 0;
}.p_span{
            font-size: 5.8em;
        }
        img{
    height: 3.4em;
    margin-bottom:30px;
} 
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
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
    // td2=tr[i].getElementsByTagName("td")[5];
    if ( td) {
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
<title>Durnolds Institute</title>
</head>
<body>
<div id="header">
        <header>
            <p><img src="../images/homei.png"><span class="p_span">D<span class="innerLogo">urnolds</span> I<span
                        class="innerLogo">nstitute</span></span></p>
        </header>
    </div>
<div class="container">

            <div class="row" scroll="yes">
                <div class="col-md-12">
                    <div class="page-header clearfix" style="text-align:center;">
                       
                        <input type="text" id="myInput" class="search-btn" onkeyup="myFunction()" placeholder="Search For Student Number..">
                       
                    </div>
                    <div id="scrolls">
                   <?php

                  $sql = "SELECT * FROM $table ORDER BY DateOfAttendance DESC";
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
            <div id="mybutton">
                <a href="Choose.php">
<button class="Back">Back</button>
                </a>
</div>
</body>
</html>