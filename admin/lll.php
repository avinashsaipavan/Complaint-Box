<?php
if(isset($_POST["submit1"])) {
    $res=mysqli_query($link,"select * from admin_registration where username='$_POST[username]' && password='$_POST[password]'");
    $count=0;
    $count=mysqli_num_rows($res);
    if($count==0)
    {
        ?>
        <div class="alert alert-danger col-lg-6 col-lg-push-3">
            <strong style="color:white">Invalid</strong> Username Or Password.
        </div>
        <?php

    }
    else
    {
        ?>
        <script type="text/javascript">

            window.location="display_student_info.php";
        </script>
        <?php
        $_SESSION["ausername"]=$_POST["username"];
    }
}
?>