<?php
session_start();
if(!isset($_SESSION["susername"]))
{
    ?>
    <script type="text/javascript">
        window.location="login.php";
    </script>
    <?php
}
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">

</head>

<br>
<?php
$res=mysqli_query($link,"select * from student_registration where username ='$_SESSION[susername]'");
$row=mysqli_fetch_array($res);
?>
<div class="col-lg-12 text-center " >
    <h1 style="font-family:Lucida Console">Complaint Box Management System</h1><br>
   <h2> present pic:</h2><br>
    <img src="<?php echo" $row[image]"?>" width="350" height="200">

</div>

<br>

<body class="login" >
<div class="center" style="width:800px; margin:0 auto;">

</div>
<form action="" method="post" enctype="multipart/form-data">

    <div style="width:100px; margin:0 auto;">
        <input type="file" name="f1" >
        <input class="btn btn-default submit text-center" style="color: dodgerblue;font-weight: bold" type="submit" name="submit1" value="OK!">


</form>



<?php
if(isset($_POST["submit1"])) {

    $tm=md5(time());
    $fnm=$_FILES["f1"]["name"];
    $dst="./complaints/".$tm.$fnm;
    $dst1="complaints/".$tm.$fnm;
    move_uploaded_file($_FILES["f1"]["tmp_name"],$dst);
    mysqli_query($link,"update student_registration set image='$dst1' where username='$_SESSION[susername]'");
    ?>
    <script type="text/javascript">

        window.location="post_complaint.php";
    </script>
    <?php
}
?>


</body>
</html>
