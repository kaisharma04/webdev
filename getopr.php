<?php
                $con=mysqli_connect('localhost','root','');
                mysqli_select_db($con,'sos');

session_start();
if(isset($_REQUEST['pid']))
{
$pd=$_REQUEST['pid'];
$u=$_SESSION['loguser'];
$d=date('d-m-y');
$t=date('h:i:s');
$dt=$d.$t;
$q="insert into likepost(pid,uname,date)values($pd,'$u','$dt')";
mysqli_query($con,$q)or die("Enable to Exeucte ".mysqli_error($con));

}
?>