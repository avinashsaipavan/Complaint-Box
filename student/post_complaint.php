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
include "header.php";
include "connection.php";
?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><strong>ADD COMPLAINT</strong></h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <span class="input-group-btn">
                    </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row" style="min-height:500px">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="" method="post" enctype="multipart/form-data">
<table class="table table-bordered">
    <tr>
        <td>SELECT CATEGORY
<select name="category" class="form-control" style="font-weight: bold">
    <option>CLASSROOM</option>
    <option>LAB</option>
    <option>MESS</option>
    <option>LIBRARY</option>
    <option>STAFF</option>
    <option>CURRICULUM</option>
    <option>NON-TEACHING STAFF</option>
    <option>ACCOUNT SECTION</option>
    <option>BUS</option>
    <option>OTHERS</option>
</select>
        </td>
    </tr>
        <tr>
        <td>
            SELECT PROBLEM
            <select name="problem" class="form-control" style="font-weight: bold">
                <option>QUALITY</option>
                <option>NEATNESS</option>
                <option>INFRASTRUCTURE</option>
                <option>TIMINGS</option>
                <option>MISBEHAVING</option>
                <option>OTHERS</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>
            IMAGE(optional)
            <input type="file" name="f1" >
        </td>
    </tr>
    <tr>
        <td>
            ENTER ID OF THE ACCUSED
            <input type="text" name="pid" class="form-control">
            <a href="find_pid.php" style="color: red"><B>(FIND THE ID?.... CLICK HERE)</B></a>
        </td>
    </tr>
    <tr>
        <td>PLEASE DESCRIBE YOUR PROBLEM
            <textarea class="form-control" name="desc"></textarea>
        </td>
    </tr>
    <tr>
        <td>
            <input type="submit" name="submit" value="SUBMIT" STYLE="font-weight: bold; color: black;background-color: #00aeef" class="form-control">
        </td>
    </tr>
</table>

                        </form>
                        <?php
                        if(isset($_POST["submit"]))
                        {
                         $res=mysqli_query($link,"select * from post_complaint where susername='$_SESSION[susername]' && category='$_POST[category]'");
                         $count=0;
                         $count=mysqli_num_rows($res);
                         if($count)
                         {
                             ?>
                             <script type="text/javascript">
                                 alert("YOU HAVE ALREADY POSTED THE COMPLAINT");
                             </script>
                         <?php

                         }
                         else
                         {
                             $count=0;
                             $res=mysqli_query($link,"select * from post_complaint where category='$_POST[category]' && pid='$_POST[pid]'");
                             $count=mysqli_num_rows($res);
                             $count=$count+1;
                             if($count>1)
                             {
                                mysqli_query($link,"update post_complaint set count='$count' where category='$_POST[category]' && pid='$_POST[pid]'");
                             }
                             $a=date("d-m-y");
                             $tm=md5(time());
                             $fnm=$_FILES["f1"]["name"];
                             $dst="./complaints/".$tm.$fnm;
                             $dst1="complaints/".$tm.$fnm;
                             move_uploaded_file($_FILES["f1"]["tmp_name"],$dst);
                             mysqli_query($link,"insert into post_complaint values('','$_POST[category]','$dst1','$_POST[problem]','$_POST[pid]','$_POST[desc]','$a','$_SESSION[susername]','unsolved','$count','')");
                             ?>
                             <script type="text/javascript">
                                 alert("complaint posted successfully.hope it gonna solve very soon");
                             </script>
                             <?php
                         }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<?php
include "footer.php";
?>

