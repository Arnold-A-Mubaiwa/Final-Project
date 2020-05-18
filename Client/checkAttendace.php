<?php
session_start();

require_once('connection.php');
$date = date("Y-m-d");
// $date ="2019-12-04 01:29:44";
// echo $date;
$table = $_SESSION['login_TableName'];
$modulename =$_SESSION['module'];
if(isset($_POST['save'])){
    $checkbox = $_POST['check'];
    if(count($checkbox)==0){
        header('location: Choose.php');
    }else{
	for($i=0;$i<count($checkbox);$i++){
    $del_id = $checkbox[$i]; 
    mysqli_query($conn,"DELETE FROM $table WHERE StudentNo='".$del_id."' && DateOfAttendance LIKE '%$date%'");
    // echo "Data deleted successfully !";
    header('location: Choose.php');
    }
}
}
$result = mysqli_query($conn,"SELECT * FROM  $table WHERE DateOfAttendance LIKE '%$date%' && Module LIKE '%$modulename%' ");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <title>Durnolds Institute</title>
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
        button{
            color:white;
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
            overflow: auto;
    height: 380px;

        }
    </style>
</head>
<body>
<div class="page-header clearfix">
<a href="StudentSignin.php" class="btn pull-left " >Back</a>
                        <h4 class="pull-right">Select Students not in class</h4>
                    </div>
    <div>
    <div id="scrolls">
    <form method="post" action="">
<table class="table table-bordered table-striped">
<thead>
<tr>
   
	<th>Student Number</th>
	<th>First Name</th>
	<th>Last Name</th>
    <th><input type="checkbox" id="checkAl"> Select All</th>
</tr>
</thead>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
   <td><?php echo $row["StudentNo"]; ?></td>
	<td><?php echo $row["Name"]; ?></td>
    <td><?php echo $row["Surname"]; ?></td>
    <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["StudentNo"]; ?>"></td>
</tr>
<?php
$i++;
}
?>
</table>
</div>
<button onclick="bye()"  name="save">DONE</button>
</form>
<script>
$("#checkAl").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});
</script>
    </div>
    
</body>
</html>