<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <link rel="stylesheet" href="main.css">
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
         opacity: 0.9;
        }
        .addBTN:HOVER{
            color: black;
    background-color: cornflowerblue;
    text-decoration: none;
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
        #scrolls{
            overflow:auto;
            height:378px;
            /* background-color:blue; */
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
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Lecturers Details</h2>
                        <input type="text" id="myInput" class="search-btn" onkeyup="myFunction()" placeholder="Search for Lecturer Number..">
                        <a href="NewLecturer.php" class="btn pull-right addBTN" >Add New Lecturer</a>
                    </div>
                    <div id="scrolls">
                    <?php
                    require_once "connection.php";
                    // Attempt select query execution
                    $sql = "SELECT * FROM Lecturers";

                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table id='myTable' class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Lecture Number</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Surname</th>";;
                                        echo "<th>Faculty</th>";
                                       echo "<th>More</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['LecturerNumber'] . "</td>";
                                        echo "<td>" . $row['Name'] . "</td>";
                                        echo "<td>" . $row['Surname'] . "</td>";
                                        echo "<td>" . $row['Faculty'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='LecturerDetails.php?LecturerNumber=". $row['LecturerNumber'] ."' title='View Record' class='warning'> View</a>";
                                            echo "<a href='DeleteLecture.php?LecturerNumber=". $row['LecturerNumber'] ."' title='Delete Record'>Delete</a>";
                                            echo "<a href='UpdateLecture.php?LecturerNumber=". $row['LecturerNumber'] ."' title='Update Record'>Update</a>";
                                        echo "</td>";
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
</body>
</html>