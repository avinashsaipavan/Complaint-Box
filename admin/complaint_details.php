
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
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3 class="alignright">COMPLAINT DETAILS</h3>
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
                        <?php
                        $res = mysqli_query($link, "select * from post_complaint where category='$_GET[category]' && pid='$_GET[pid]'");
                        ?>
                        <table class="table table-bordered">
                            <tr>
                                <th>CATEGORY</th>
                                <th>PROBLEM</th>
                                <th>ACCUSED ID</th>
                                <th>USERNAME</th>
                                <th>IMAGE</th>
                                <th>DESCRIPTION</th>
                                <th>STATUS</th>
                            </tr>
                            <?php
                            while($row = mysqli_fetch_array($res))
                            {
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
                            echo $row["susername"];
                            echo "</td>";
                            echo "<td>";
                            ?> <img src="../student/<?php echo $row["image"]; ?>" height="250"
                                    width="500"> <?php
                                echo "</td>";
                                echo"<td>";
                                echo $row["desc"];
                                echo "</td>";
                                echo"<td>";
                                echo $row["status"];
                                echo "</td>";
                                echo"</tr>";

                            }

                        echo"</table>";
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


