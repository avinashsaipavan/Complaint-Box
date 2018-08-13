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
                        <h2 class="alignright -align-center "> <b>ADMIN MESSAGE<b/> </h2>
                        <form action="" method="post">
                            <input type="submit" style="background-color: #00aeef;color:black" name="submit" class="btn btn-default alignright" value="ALL MESSAGES">
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
                                        ADMIN
                                    </th>
                                    <th>
                                        TITLE
                                    </th>
                                    <th>
                                        MESSAGE
                                    </th>
                                </tr>
                                <?php
                                $res=mysqli_query($link,"select * from admin_message where susername=' $_SESSION[susername]' order by id desc");

                                while($row=mysqli_fetch_array($res))
                                {
                                    $res1=mysqli_query($link,"select * from admin_registration where username='admin'");
                                    while($row1=mysqli_fetch_array($res1))
                                    {
                                        $fullname=$row1["firstname"]." ".$row1["lastname"];
                                    }

                                    echo "<tr>";
                                    echo"<td>"; echo $fullname; echo"</td>";
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
                                        ADMIN
                                    </th>
                                    <th>
                                        TITLE
                                    </th>
                                    <th>
                                        MESSAGE
                                    </th>
                                </tr>
                                <?php
                                $res=mysqli_query($link,"select * from admin_message where susername=' $_SESSION[susername]' and status='no' order by id desc");

                                while($row=mysqli_fetch_array($res))
                                {
                                    $res1=mysqli_query($link,"select * from admin_registration where username='admin'");
                                    while($row1=mysqli_fetch_array($res1))
                                    {
                                        $fullname=$row1["firstname"]." ".$row1["lastname"];
                                    }

                                    echo "<tr>";
                                    echo"<td>"; echo $fullname; echo"</td>";
                                    echo"<td>"; echo $row["title"]; echo"</td>";
                                    echo "<td>"; echo $row["message"];echo"</td>";
                                    echo"</tr>";
                                }
                                ?>
                            </table>


                        <?php
                            mysqli_query($link,"update admin_message set status='yes' where susername=' $_SESSION[susername]'");
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
