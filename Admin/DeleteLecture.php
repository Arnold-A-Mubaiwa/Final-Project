<?php
// Process delete operation after confirmation
if(isset($_POST["LecturerNumber"]) && !empty($_POST["LecturerNumber"])){
    // Include connection file
    require_once "connection.php";
    
    // Prepare a delete statement
    $sql = "DELETE FROM Lecturers WHERE LecturerNumber = ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_POST["LecturerNumber"]);
        if(mysqli_stmt_execute($stmt)){
            header("location: Lecturers.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else{
    if(empty(trim($_GET["LecturerNumber"]))){
        header("location: error.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Delete Record</h1>
                    </div>
                    <form action="" method="post">
                        <div class="alert  fade in">
                            <input type="hidden" name="LecturerNumber" value="<?php echo trim($_GET["LecturerNumber"]); ?>"/>
                            <p>Are you sure you want to delete this Lecturer?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="Lecturers.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>