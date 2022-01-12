<?php

 session_start();

   if (!isset($_SESSION['adminId'])) {
    header('location: login.php');
  }
include('db.php');
$sts_id =  $_GET['sts_id'];

        $sts_sql = mysqli_query($conn,"SELECT * FROM users WHERE id='$sts_id'");
                $n = mysqli_fetch_array($sts_sql);

if($n['status']==0){

	$ss = mysqli_query($conn,"UPDATE users SET status='1' WHERE id='$sts_id'");
	    $_SESSION['status_msg'] ='<button class="alert alert-danger">Your Application Applied Status Active!</button>';
	    header("Location: admin_dashboard.php");
}else{

	$ss=mysqli_query($conn,"UPDATE users SET status='0' WHERE id='$sts_id'");
	    $_SESSION['status_msg'] ='<button class="alert alert-danger">Your Application Applied Status Pending!</button>';
	 	header("Location: admin_dashboard.php");
	  
}

?>