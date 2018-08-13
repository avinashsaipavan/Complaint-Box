<?php
include "connection.php";
$category=$_GET["category"];
$pi=$_GET["pid"];
$problem=$_GET["problem"];
$date=date("d-m-y");
$res=mysqli_query($link,"select * from post_complaint where  category='$category' and pid='$pi' and problem='$problem'");
while($row=mysqli_fetch_array($res))
{
    mysqli_query($link,"insert into notification values('','$row[susername]','$category','$problem','$pi','$date','no')");
}
mysqli_query($link,"insert into solved_complaints values('','$category','$problem','$pi','$date')");
mysqli_query($link,"delete from post_complaint where category='$category' and pid='$pi' and problem='$problem'");
?>
<script type="text/javascript">
    window.location="top_complaints.php";
</script>

