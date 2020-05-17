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
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href= "../css/index.css">
    <script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="../js/w3sAutoComplete.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <title>Durnolds Institute</title>
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
.autocomplete {
  /* the container must be positioned relative: */
  position: relative;
  display: inline-block;
  width: 50%;
  /* border:1px solid rgb(11, 19, 46); */
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}
.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff;
  border-bottom: 1px solid #d4d4d4;
}
.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9;
}
.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important;
  color: #ffffff;
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
            <form autocomplete="off" id="form-values" method="post" hidden>
            <label>Enter Current Module and Code</label> <br>
                <div class="form-group autocomplete" ><input id="myInput"class="form-control"
                        type="text" name="module" placeholder="e.g Programming 511" required><br>
                </div> <br>
                <a href="StudentSignin.php"><input class="btn " type="Submit" value="Submit"></a>
            </form> 
        </div>
    </div>
    <div id="backlink">
            <a id="lOGOUT" href="../index.php"><label>LOGOUT</label></a>
        </div>
    <script>
         var courseName = "<?php echo $_SESSION['login_Faculty'] ?>";

         if(courseName == "MICT"){
            autocomplete(document.getElementById("myInput"), courses.MICT);
         }
         else if(courseName== "NP"){
            autocomplete(document.getElementById("myInput"), courses.NP);
         }
         else if(courseName== "BEMS"){
            autocomplete(document.getElementById("myInput"), courses.BEMS);
         }
         else if(courseName== "PMLG"){
            autocomplete(document.getElementById("myInput"), courses.PMLG);
         }

</script>
    <script>
        $(document).ready(function () {
            $("#setModule").click(function () {
                $("#form-values").toggle(1000);
            });
        });
    </script>
</body>

</html>