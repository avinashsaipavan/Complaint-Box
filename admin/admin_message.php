<?php
session_start();
if(!isset($_SESSION["ausername"]))
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
<!-- page content area main -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">

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
                        <h2><b>SEND MESSAGE TO STUDENT</b></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form name="form1" action="" method="post"  class="col-lg-6" enctype="multipart/form-data">
                            <table class="table table-bordered">
                                <tr>
                                    <td>
                                        <select class="form-control" name="dusername">
                                            <?php
                                            $res=mysqli_query($link,"select * from student_registration");
                                            while ($row=mysqli_fetch_array($res))
                                            {
                                                ?><option value=" <?php echo $row["username"]?>" class="form-control">
                                                <?php echo $row["username"]."[".$row["regno"]."]"; ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" name="title" placeholder="ENTER TITLE"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <textarea name="msg" class="form-control" placeholder="ENTER THE MESSAGE"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" name="submit" style="background-color: #00aeef;color: black;";" value="SEND THE MESSAGE">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if(isset($_POST["submit"]))
{
    mysqli_query($link,"insert into admin_message values('','$_POST[dusername]','$_POST[title]','$_POST[msg]','no')");
    ?>
    <script type="text/javascript">
        alert("MESSAGE SEND SUCCESSFULLY");
    </script>
    <?php
}
?>

<?php
include "footer.php";
?>
