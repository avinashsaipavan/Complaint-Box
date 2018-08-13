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
                <h3 style="text-align: right"><strong>TOP COMPLAINTS</strong></h3>
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
                        <table class="table table-bordered">
                            <tr>
                                <th>CATEGORY</th>
                                <th>ACCUSED ID</th>
                                <th>COUNT</th>
                                <th>STATUS</th>
                            </tr>
                            <?php
                            $pid="cid";
                            $res=mysqli_query($link,"select * from post_complaint where status='unsolved' order by count desc ");
                            while($row=mysqli_fetch_array($res)) {
                                if ($row["category"] != $pid) {
                                    ?>
                                    <tr>
                                        <td> <?php echo $row["category"] ?></td>
                                        <td> <?php echo $row["pid"] ?></td>
                                        <td> <?php echo $row["count"] ?></td>
                                        <td> <?php echo $row["status"] ?></td>
                                    </tr>

                                    <?php
                                    $pid=$row["category"];
                                }
                            }
                            ?>
                        </table>
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

