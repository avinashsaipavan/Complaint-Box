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
<!-- page content area main -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
            </div>

            <div class="title_right">

            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row" style="min-height:500px">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2 class="alignright -align-center "> <b>SOLVED COMPLAINTS<b/> </h2>
                        <form action="" method="post">
                            <input type="submit" style="background-color: #00aeef;color:black" name="submit" class="btn btn-default alignright" value="ALL NOTIFICATIONS">
                        </form>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php
                        if(isset($_POST["submit"])) {
                            ?>
                            <table class="table table-bordered">
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        CATEGORY
                                    </th>
                                    <th>
                                        PROBLEM
                                    </th>
                                    <th>
                                        PROBLEM ID
                                    </th>
                                    <th>
                                        DATE
                                    </th>
                                </tr>
                                <?php
                                $res=mysqli_query($link,"select * from notification where username='$_SESSION[susername]' order by id desc");
                                $i=1;
                                while($row=mysqli_fetch_array($res))
                                {
                                    echo "<tr>";
                                    echo"<td>"; echo $i; echo"</td>";
                                    echo"<td>"; echo $row["category"]; echo"</td>";
                                    echo "<td>"; echo $row["problem"];echo"</td>";
                                    echo "<td>"; echo $row["pid"];echo"</td>";
                                    echo "<td>"; echo $row["date"];echo"</td>";

                                    echo"</tr>";
                                    $i=$i+1;
                                }
                                ?>
                            </table>

                            <?php
                        }
                        else
                            {
                             ?>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            CATEGORY
                                        </th>
                                        <th>
                                            PROBLEM
                                        </th>
                                        <th>
                                            PROBLEM ID
                                        </th>
                                        <th>
                                            DATE
                                        </th>
                                    </tr>
                                    <?php
                                    $res=mysqli_query($link,"select * from notification where username='$_SESSION[susername]' and status='no' order by id desc");
                                    $i=1;
                                    while($row=mysqli_fetch_array($res))
                                    {
                                        echo "<tr>";
                                        echo"<td>"; echo $i; echo"</td>";
                                        echo"<td>"; echo $row["category"]; echo"</td>";
                                        echo "<td>"; echo $row["problem"];echo"</td>";
                                        echo "<td>"; echo $row["pid"];echo"</td>";
                                        echo "<td>"; echo $row["date"];echo"</td>";

                                        echo"</tr>";
                                        $i=$i+1;
                                    }
                                    ?>
                                </table>

                                <?php
                                mysqli_query($link,"update notification set status='yes' where username='$_SESSION[susername]'");
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
