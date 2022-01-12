<?php
 session_start();
	include('db.php');

	if (!isset($_SESSION['adminId'])) {
        header('location: login.php');
    }

		$del_id = $_GET['del_id'];


	    $dlt_query = mysqli_query($conn,"DELETE users.*, industry.*, organization_owner.*, industry2.*, industry3.*, industry4.*
                            FROM users 
                            JOIN industry ON users.id = industry.user_id 
                            JOIN organization_owner ON industry.id=organization_owner.industry_id
                            JOIN industry2 ON industry.id=industry2.industry_id 
                            JOIN industry3 ON industry.id=industry3.industry_id 
                            JOIN industry4 ON industry.id=industry4.industry_id 
                            WHERE users.id='$del_id' AND users.user_role='0'");

	if($dlt_query==true){
		$_SESSION['dlt_msg'] ='<button class="btn btn-primary">Your User Deleted Successfull!</button>';
            header("location:admin_dashboard.php");
	}



?>