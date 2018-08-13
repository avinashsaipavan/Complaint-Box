<?php
include"connection.php";
$res=mysqli_query($link,"select * from admin_message where susername=' $_SESSION[susername]' && status='no'");
$tot=mysqli_num_rows($res);
$rep=mysqli_query($link,"select * from student_registration where username ='$_SESSION[susername]'");
$roz=mysqli_fetch_array($rep);
$res1=mysqli_query($link,"select * from notification where username='$_SESSION[susername]' && status='no'");
$tot1=mysqli_num_rows($res1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>COMPLAINTBOX</title>


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/nprogress.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <h class="fa-newspaper-o site_title" style="font: bold ;font-family: Serif; font-weight: bold;color: palevioletred ">COMPLAINT BOX</h>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="<?php echo" $roz[image]"?>" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>

                        <h2> <?php echo"$_SESSION[susername]"?></h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li><a href="post_complaint.php"><i class="fa fa-edit"></i>POST COMPLAINT<span></span></a>

                            </li>
                            <li><a href="my_complaints.php"><i class="fa fa-file-text-o"></i>MY COMPLAINTS<span></span></a>

                            </li>
                            <li><a href="top_complaints.php"><i class="fa fa-bar-chart"></i>TOP COMPLAINTS <span></span></a>

                            </li>
                            <li><a href="student_message.php"><i class="fa fa-comment-o"></i>MESSAGE TO ADMIN<span></span></a>

                            </li>


                        </ul>
                    </div>


                </div>

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="<?php echo" $roz[image]"?>" alt="profile pic">   <?php echo"$_SESSION[susername]"?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="change_pic.php"><i class="fa fa-sign-out pull-right"></i>CHANGE PICTURE</a></li>

                                <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>

                            </ul>
                        </li>
                        <li role="presentation" class="dropdown">
                            <a href="notification.php" class="dropdown-toggle info-number" data-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="badge bg-green" onclick="window.location='notification.php'"><?php echo $tot1 ; ?></span>
                            </a>

                        <li role="presentation" class="dropdown">
                            <a href="message_from_admin.php" class="dropdown-toggle info-number" data-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green" onclick="window.location='message_from_admin.php'"><?php echo $tot ; ?></span>
                            </a>
                        </li>


                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->
