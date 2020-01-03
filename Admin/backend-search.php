<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
require_once("connection.php");
 
if(isset($_REQUEST["term"])){
    // Prepare a select statement
    $sql = "SELECT * FROM Lecturers WHERE LecturerNumber LIKE ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
        // Set parameters
        $param_term = $_REQUEST["term"] . '%';
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                echo "<tr>";
                echo "<th>Lecture Number</th>";
                echo "<th>Name</th>";
                echo "<th>Surname</th>";;
                echo "<th>Faculty</th>";
                echo "<th>Contact Number</th>";
                echo "<th>Email Address</th>";
                echo "<th>Table Name</th>";
                echo "<th>More</th>";
            echo "</tr>";
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<tr>";
                    echo "<td>" . $row['LecturerNumber'] . "</td>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $row['Surname'] . "</td>";
                    echo "<td>" . $row['Faculty'] . "</td>";
                    echo "<td>" . $row['ContactNumber'] . "</td>";
                    echo "<td>" . $row['Email'] . "</td>";
                    echo "<td>" . $row['TableName'] . "</td>";
                    echo "<td>";
                        echo "<a href='SearchLecturer.php?LecturerNumber=". $row['LecturerNumber'] ."' title='View Record'> <input type='submit' class='btn btnSubmit' value='View'></a>";
                        echo "<a href='DeleteLecture.php?LecturerNumber=". $row['LecturerNumber'] ."' title='Delete Record'> <input type='submit' class='btn btn-danger' value='Delete'></a>";
                    echo "</td>";
                echo "</tr>";
                }
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
}
 
// close connection
mysqli_close($conn);
?>