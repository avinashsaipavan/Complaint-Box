<?php
include"connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Registration Form | LMS </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">COMPLAINT BOX Management System</h1>
</div>


<body class="login" style="margin-top: -20px;">



<div class="login_wrapper">

    <section class="login_content" style="margin-top: -40px;">
        <form name="form1" action="" method="post">
            <h2>STUDENT Registration Form</h2><br>

            <div>
                <input type="text" class="form-control" placeholder="FIRSTNAME" name="firstname" required=""/>
            </div>
            <div>
                <input type="text" class="form-control" placeholder="LASTNAME" name="lastname" required=""/>
            </div>

            <div>
                <input type="text" class="form-control" placeholder="USERNAME" name="username" required=""/>

            </div>
            <div>
                <input type="password" class="form-control" placeholder="PASSWORD" name="password" required=""/>
            </div>
            <div>
                <input type="text" class="form-control" placeholder="EMAIL" name="email" required=""/>
            </div>
            <div>
                <input type="text" class="form-control" placeholder="CONTACT" name="contact" required=""/>
            </div>
            <div>
                <input type="text" class="form-control" placeholder="SEM" name="sem" required=""/>
            </div>
            <div>
                <input type="text" class="form-control" placeholder="REGISTRATION NUMBER" name="regno" required=""/>
            </div>
            <div>
                <input type="text" class="form-control" placeholder="DATE OF BIRTH" name="dob" required=""/>
            </div>
            <div class="col-lg-12  col-lg-push-3">
                <input class="btn btn-default submit " type="submit" name="submit11" value="Register">
            </div>

        </form>
    </section>
    <?php
    if(isset($_POST["submit11"]))
    {
        $res=mysqli_query($link,"select * from student_registration where username ='$_POST[username]'");
        $count=0;
        $count=mysqli_num_rows($res);
        if($count>0)
        {
            ?>
            <div class="alert alert-success col-lg-12 col-lg-push-0">
               USER NAME ALREADY EXITS PLEASE CHOOSE ANOTHER ONE

            </div>
            <?php
        }
        else{
            $res=mysqli_query($link,"select * from student_details where status='yes' and regno='$_POST[regno]'");
            $count=0;
            $ret=mysqli_fetch_array($res);
            $count=mysqli_num_rows($res);
            if($count>0)
            {
                ?>
                <div class="alert alert-success col-lg-12 col-lg-push-0">
                   YOU HAVE ALREADY REGISTERED!!!!
                </div>

                <?php
            }
            else{
            $res=mysqli_query($link,"select * from student_details where status='no' and regno='$_POST[regno]' and first_name='$_POST[firstname]' and last_name='$_POST[lastname]' and dob='$_POST[dob]'");
            $count=0;
            $count=mysqli_num_rows($res);
            if($count>0)
            {
                mysqli_query($link, "insert into student_registration (id,firstname,lastname,username,password,email,contact,sem,regno,status,image) values ('','$_POST[firstname]','$_POST[lastname]','$_POST[username]','$_POST[password]','$_POST[email]','$_POST[contact]','$_POST[sem]','$_POST[regno]','yes','')");
                mysqli_query($link,"update student_details set status='yes' where regno='$_POST[regno]'");
                ?>
                <div class="alert alert-success col-lg-12 col-lg-push-0">
                    Registration successfully, You will get email when your account is approved
                </div>

                <?php
            }
            else
                {
                    ?>
                    <div class="alert alert-success col-lg-12 col-lg-push-0">
                      PLEASE ENTER THE VALID DETAILS......
                    </div>

                    <?php
            }

    }}}
    ?>


</div>



</body>
</html>
