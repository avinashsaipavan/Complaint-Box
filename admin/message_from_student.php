<?php
session_start();
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
                        <h2 class="alignright -align-center "> <b>STUDENT MESSAGE<b/> </h2>
                        <form action="" method="post">
                            <input type="submit" style="background-color: #00aeef;color:black" name="submit" class="btn btn-default alignright" value="ALL MESSAGES">
                        </form>

                        <div class="clearfix"></div>
                    </div>
                    <form class="x_content">
                        <?php
                        if(isset($_POST["submit"]))
                        {
                           ?>
                        <table class="table table-bordered">
                            <tr>
                                <th>
                                    STUDENT ID
                                </th>
                                <th>
                                    TITLE
                                </th>
                                <th>
                                    MESSAGE
                                </th>
                            </tr>
                            <?php
                            $res=mysqli_query($link,"select * from student_message order by id desc");

                            while($row=mysqli_fetch_array($res))
                            {


                                echo "<tr>";
                                echo"<td>"; echo $row["susername"]; echo"</td>";
                                echo"<td>"; echo $row["title"]; echo"</td>";
                                echo "<td>"; echo $row["message"];echo"</td>";
                                echo"</tr>";
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
                                    STUDENT ID
                                </th>
                                <th>
                                    TITLE
                                </th>
                                <th>
                                    MESSAGE
                                </th>
                            </tr>
                            <?php
                            $res=mysqli_query($link,"select * from student_message where status='no' order by id desc");

                            while($row=mysqli_fetch_array($res))
                            {


                                echo "<tr>";
                                echo"<td>"; echo $row["susername"]; echo"</td>";
                                echo"<td>"; echo $row["title"]; echo"</td>";
                                echo "<td>"; echo $row["message"];echo"</td>";
                                echo"</tr>";
                            }
                            ?>
                        </table>

                        <?php
                                mysqli_query($link,"update student_message set status='yes' where status='no'");
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
