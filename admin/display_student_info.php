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
                <h3 class="text-right"><B>STUDENT INFORMATION</B></h3>
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
                        $res=mysqli_query($link,"select * from student_registration");
                        echo "<table class='table table-bordered'>";
                        echo"<tr>";
                        echo"<th>"; echo "FIRST NAME"; echo"</th>";
                        echo"<th>";echo "LAST NAME"; echo"</th>";
                        echo"<th>"; echo "USERNAME"; echo"</th>";
                        echo"<th>"; echo "EMAIL"; echo"</th>";
                        echo"<th>"; echo "CONTACT"; echo"</th>";
                        echo"<th>"; echo "SEM"; echo"</th>";
                        echo"<th>"; echo "REGISTRATION NO"; echo"</th>";
                        echo"<th>"; echo "STATUS"; echo"</th>";
                        echo"<th>"; echo "APPROVE"; echo"</th>";
                        echo"<th>"; echo "NOT-APPROVE"; echo"</th>";
                        echo "</tr>";
                        while ($row=mysqli_fetch_array($res))
                        {

                            echo"<tr>";
                            echo"<td>"; echo $row["firstname"];echo"</td>";
                            echo"<td>"; echo $row["lastname"];echo"</td>";
                            echo"<td>"; echo $row["username"];echo"</td>";
                            echo"<td>"; echo $row["email"];echo"</td>";
                            echo"<td>"; echo $row["contact"];echo"</td>";
                            echo"<td>"; echo $row["sem"];echo"</td>";
                            echo"<td>"; echo $row["regno"];echo"</td>";
                            echo"<td>"; echo $row["status"];echo"</td>";
                            echo"<td>"; ?> <a href="approve.php?id=<?php echo $row["id"]; ?>" style="color: green">Approve</a> <?php echo"</td>";
                            echo"<td>"; ?> <a href="notapprove.php?id=<?php echo $row["id"]; ?>"style="color: red">not-Approve</a> <?php echo"</td>";
                            echo "</tr>";

                        }
                        echo "</table>";
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
