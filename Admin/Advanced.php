<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Advanved Options</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

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
        td{
            font-size:12px;
        }
        .wrapper {
            width: 50%;
            /* padding-top: 3%; */
        }

        .inputs {
            margin-left: 5px;
            margin-right: 5%;
            width: 80%;
            border: 2px solid rgb(11, 19, 46);
        }

        .unq-code {
            width: 80%;
            border: none;
            background-color: rgb(11, 19, 46);
            padding: 15px;
            color: #fff;
            margin-top: 10px;
            margin-bottom: 10px;
            font-size: 20px;
            border-radius: 15px;
        }
    </style>
</head>

<body>
    <script>
        $(document).ready(function () {
            $("#unq-code").click(function () {
                    $("#change-uc").toggle(1000);
                    $("#add-admin").hide();
                    $("#lecturerTables").hide();
                }),
                $("#add-ad").click(function () {
                    $("#add-admin").toggle(1000);
                    $("#change-uc").hide(1000);
                    $("#lecturerTables").hide();
                }),
                $("#show-lecturers").click(function () {
                    $("#lecturerTables").toggle(1000);
                    $("#change-uc").hide(1000);
                    $("#add-admin").hide();

                });
        });
    </script>
    <div class="wrapper">
            <div class="page-header clearfix">
                    <h2 class="pull-left">Select Operation</h2>
                      </div>
        <button id="unq-code" class="unq-code">Change The Unique Code</button>
        <div id="change-uc" hidden>
            <form method="POST" action="updateUniqueNo.php">
                <div class="form-group">
                    <label>User Icas No</label><input required name="LecturerNumber" type="text" size="6" class="inputs form-control">
                </div>
                <div class="form-group">
                    <label>Name</label><input required type="text" class="inputs form-control">
                </div>
                <div class="form-group">
                    <label>Surname</label><input required type="text" class="inputs form-control">
                </div>
                <input type="submit" class="btn btnSubmit" value="Submit">
            </form>
        </div>
        <button class="unq-code" id="add-ad">Add new Administrator</button>
        <div id="add-admin" hidden>
            <form method="POST" action="addAdmin.php">
                <div class="form-group">
                    <label>Admin Employee Number</label><input required name="IcasNo" type="text" size="6" class="inputs form-control">
                </div>
                <div class="form-group">
                    <label>Name</label><input name="Name" type="text" class="inputs form-control"required>
                </div>
                <div class="form-group">
                    <label>Surname</label><input required name="Surname" type="text" class="inputs form-control">
                </div>
                <div class="form-group">
                    <label>Contact Number</label><input name="ContactNo" type="text" class="inputs form-control">
                </div>
                <input type="submit" class="btn btnSubmit" value="Submit">
            </form>
        </div>
        <button class="unq-code" id="show-lecturers">Lecturer Tables</button>
        <div id="lecturerTables" hidden >
            <?php
            require_once('connection.php');
            $sqlT = "SELECT * FROM LectureTables";
            if($resultT = mysqli_query($conn, $sqlT)){
             if(mysqli_num_rows($resultT) > 0){
                echo "<table id ='myTable' class='table table-bordered table-striped'>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th>Name</th>";
                        echo "<th>Surname</th>";
                        echo "<th>Lecturer Tables</th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
              
                while($row = mysqli_fetch_array($resultT)){
                        echo "<tr>";
                        echo "<td>" . $row['Name'] . "</td>";
                        echo "<td>" . $row['Surname'] . "</td>";
                        echo "<td><a href='Register.php'>" ;
                        // echo $_SESSION['table']= $row['tableName'];
                        echo $row["tableName"]; $_SESSION['table'] = $row["tableName"];
                        echo "</a></td>";
                        echo "</tr>";
                    }          
                }
             }
            
            ?>
        </div>

    </div>
</body>

</html>