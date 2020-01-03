<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>PHP Live MySQL Database Search</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <link rel="stylesheet" href="main.css">
    <style type="text/css">
        /* .page-header h2{
            margin-top: 0;
        }
        th{
            background-color: rgb(11, 19, 46);
            color:white;
        }
        table tr td:last-child a{
            margin-right: 10px;
        }
        /* body{
            padding:40px;
        } */
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
        }
        tr{
            background-color: lightgray;
            color:black;
        }
 
    body{
        font-family: Arail, sans-serif;
    }
    /* Formatting search box */
    .search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    /* .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    } */
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    /* .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    } */ */
</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } 
        // else{
            resultDropdown.html();
        
        // }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
</head>
<body>
    <div class="wrapper">
    <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Students Details</h2>
                        <a href="NewStudent.php" class="btn pull-right addBTN" >Add New Student</a>
                    </div>
    <div class="search-box">
        <input type="text" autocomplete="off" placeholder="search lecture" />
        <div class="result">
        <?php
                    // Include config file
                    require_once "connection.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM Lecturers";

                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
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
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
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
                </div>    </div>
    </div>
</body>
</html>
