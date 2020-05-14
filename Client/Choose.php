<?php
session_start();
if(count($_POST)>0) {
require_once('connection.php');
$_SESSION['module']= $_POST['module'];
header("location: StudentSignin.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" type="text/css" href="../css/main.css"> -->
    <link rel="stylesheet" type="text/css" href= "../css/index.css">
    <script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <title>Choose</title>
    <style>
        .container {
            text-align: center;
            /* width: 80%;
            margin-left: 10%; */
        }
        .View-register,
        .Select-modules {
            margin-top: 40px;
            padding-bottom: 20px;
        }
        .buttons {
            width: 60%;
            padding-top: 20px;
            padding-bottom: 20px;
            font-size: 24px;
            background-color: rgb(11, 19, 46);
            opacity: 0.8;
            color: white;
            border-radius: 10px;
        }
        .buttons:hover {
            background-color: rgb(11, 19, 46);
            color: white;
            opacity: 1;
        }
        a {
            text-decoration: none;
        }
        .p_span{
            font-size: 5.8em;
        }
        img{
    height: 3.4em;
    margin-bottom:30px;
} 
        /* #logo_container {
            margin-bottom: 20px;
        } */
        /* #moveDown {
            margin-top: 130px;
        } */
    </style>
</head>

<body>

    <div class="container">
    <div id="header">
        <header>
            <p><img src="../images/homei.png"><span class="p_span">D<span class="innerLogo">urnolds</span> I<span
                        class="innerLogo">nstitute</span></span></p>
        </header>
    </div>
        <div id="moveDown" class="View-register">
            <a href="Register.php">
                <input class="buttons" type="button" value="VIEW REGISTER">
            </a>
        </div>
        <div class="Select-modules">
            <input id="setModule" class="buttons" type="button" value="SET CURRENT MODULE">
            <form id="form-values" method="post" hidden>
                <div class="form-group"> <label>Enter Current Module and Code</label> <input class="form-control"
                        type="text" name="module" placeholder="e.g Programming 511" required><br>
                </div>
                <a href="StudentSignin.php"><input class="btn " type="Submit" value="Submit"></a>
            </form>
        </div>
        <div id="backlink">
            <a id="lOGOUT" href="../index.php"><label>LOGOUT</label></a>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $("#setModule").click(function () {
                $("#form-values").toggle(1000);
            });
        });
    </script>
</body>

</html>