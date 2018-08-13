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

<div class="col-lg-12 text-center " >
    <h1 style="font-family:Lucida Console">Complaint Box Management System</h1><br>
    <img src="images/complaintbox.png" width="350" height="200">

</div>

<br>

<body class="login" >




<div class="center" style="width:800px; margin:0 auto;">

                <table class="table table-bordered" width="50%" style="color: black">
                    <tr>
                        <th style="color: red">
                            ID
                        </th>
                        <th style="color: red">
                        <b>CATEGORY</b>
                        </th>
                        <th style="color: red">
                            <b>
                                PROBLEM ID
                            </b>
                        </th>
                        <tr>
                        <td><b>1</b></td>
                        <td>
                            <b>CLASSROOM</b>
                        </td>
                        <td>
                            <b>(BLOCK NO)+(CLASSROOM NO) </b>
                            <br>
                            <h style="color: darkgreen">ex:for the classroom 114 in 15th block is: 15114</h>
                        </td>
                    </tr>
                    <tr>
                        <td><b>2</b></td>
                        <td>
                            <b>LAB
                            </b></td>
                        <td><b>(BLOCK NO)+(FLOOR NO)+(SUBJECT CODE)</b></td>
                    </tr>
                    <tr>
                        <td rowspan="2"><b>3</b></td>
                            <td rowspan="2"> <b>MESS</b></td>
                            <td><b>GMESS(girls)</b></td>
                    </tr>
                    <tr>
                       <td> <b>BMESS(boys)</b></td>
                    </tr>
                    <tr>
                        <td><b>4</b></td>
                        <td>
                            <b>LIBRARY</b>
                        </td>
                        <td>
                            <b>LIBRARY</b>
                        </td>
                    </tr>
                    <tr>
                        <td><b>5</b></td>
                        <td><b>STAFF</b></td>
                        <td><b>(YEAR)+(SUBJECT CODE)</b></td>
                    </tr>
                    <tr>
                        <td><b>6</b></td>
                        <td><b>CIRRICULUM</b></td>
                        <td><b>(YEAR)+CIRRIC</b></td>
                    </tr>
                    <tr>
                        <td><b>7</b></td>
                        <td><b>NON-TEACHING STAFF</b></td>
                        <td><b>(WORKING PLACE)</b>
                            <br>
                            <h style="color: darkgreen">ex:at mess id is:mess<br> at block 14 id id block14<br>
                            at library id is library</h></td>
                    </tr>
                    <tr>
                        <td><b>8</b></td>
                        <td><b>ACCOUNT SECTION</b></td>
                        <td><b>ACCSEC</b></td>
                    </tr>
                    <tr>
                        <td><b>9</b></td>
                        <td><b>BUS</b></td>
                        <td><b>(BUS)+(BUSNO)</b></td>
                    </tr>
                </table>
    <h2 style="color: darkgreen">IF ANY CATEGORY IS MISSING PLEASE SEND A MESSAGE TO US,WE WILL TRY TO ADD IT.</h2>
    <br>
    <h class="alignright">THANK YOU
    <br> TEAM COMPLAINT BOX</h>
</div>
    <form name="form1"   action="" method="post">

            <div style="width:100px; margin:0 auto;">

                <input class="btn btn-default submit text-center" style="color: dodgerblue;font-weight: bold" type="submit" name="submit1" value="OK!">


    </form>



<?php
if(isset($_POST["submit1"])) {
    ?>
    <script type="text/javascript">

        window.location="post_complaint.php";
        </script>
            <?php
}
?>


</body>
</html>
