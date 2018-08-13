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
                <h3 style="text-align:right"><strong>MY COMPLAINTS</strong></h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">

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

                        <form action="" method="post">
                            <div class="title_right">
                                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                    <div class="input-group">
                                        <input type="text" name="t1" class="form-control" placeholder="Search for...">
                                        <span class="input-group-btn">
                     <input type="submit" style="background-color: #00aeef;color:black" name="submit1" class="btn btn-default" value="searh complaints">
                    </span>





                                    </div>
                                </div>
                            </div>
                    </div>

                        </form>
                        <?php
                        if(isset($_POST["submit1"])) {
                            $res = mysqli_query($link, "select * from post_complaint where susername ='$_SESSION[susername]' and category like ('%$_POST[t1]%')");
                               ?>
                                <table class="table table-bordered">
                            <tr>
                                <th>CATEGORY</th>
                                <th>PROBLEM</th>
                                <th>ACCUSED ID</th>
                                <th>IMAGE</th>
                                <th>DESCRIPTION</th>
                                <th>COUNT</th>
                            </tr>
                            <?php
                            while($row = mysqli_fetch_array($res)) {
                            echo "<tr>";
                            echo "<td>";
                            echo $row["category"];
                            echo "</td>";
                            echo "<td>";
                            echo $row["problem"];
                            echo "</td>";
                            echo "<td>";
                            echo $row["pid"];
                            echo "</td>";
                            echo "<td>";
                            ?> <img src="<?php echo $row["image"]; ?>" height="100"
                                    width="100"> <?php
                                echo "</td>";
                                echo"<td>";
                                echo $row["desc"];
                                echo "</td>";
                                echo"<td>";
                                echo $row["count"];
                                echo "</td>";
                                echo"</tr>";

                            }

                        echo"</table>";
                        }
                        else{
                        $res = mysqli_query($link, "select * from post_complaint where susername ='$_SESSION[susername]'");
                        ?>
                        <table class="table table-bordered">
                            <tr>
                                <th>CATEGORY</th>
                                <th>PROBLEM</th>
                                <th>ACCUSED ID</th>
                                <th>IMAGE</th>
                                <th>DESCRIPTION</th>
                                <th>COUNT</th>
                            </tr>
                            <?php
                            while($row = mysqli_fetch_array($res)) {
                            echo "<tr>";
                            echo "<td>";
                            echo $row["category"];
                            echo "</td>";
                            echo "<td>";
                            echo $row["problem"];
                            echo "</td>";
                            echo "<td>";
                            echo $row["pid"];
                            echo "</td>";
                            echo "<td>";
                            ?> <img src="<?php echo $row["image"]; ?>" height="250"
                                    width="500"> <?php
                                echo "</td>";
                                echo"<td>";
                                echo $row["desc"];
                                echo "</td>";
                                echo"<td>";
                                echo $row["count"];
                                echo "</td>";
                                echo"</tr>";

                            }

                        echo"</table>";
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

