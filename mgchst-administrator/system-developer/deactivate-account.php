<?php 

	session_start();
	require("../../connection/connection.php");
    require("../dev/registration/class_registration.php");
	require("../dev/general/all_purpose_class.php");
	try{
		$register = new registration($db);
		$all_purpose = new all_purpose($db);
    	if(isset($_GET['user_name'])){
	    	$staff_email = $_GET['user_name'];
	    	$user_name = $staff_email;
		    $email = $_SESSION['user_name'];
			
			if($register->deactivateTheUserAccount($user_name)){

				$action ="De-Activated $staff_email Account ";
				$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
				$_SESSION['success'] = "You Have De-Activated $staff_email Account Successfully";
				$all_purpose->redirect("view-all-users.php");
			}else{
				$_SESSION['error'] = "Unable To De-Activate $staff_email Account at the moment, Please try Again Later";
				$all_purpose->redirect("view-all-users.php");
			}
			
		}else{
			$_SESSION['error']="Please Click On The Green Button To De-Activate The User Account";
			$all_purpose->redirect("view-all-users.php");
		}
	}catch(PDOException $e){
    	$_SESSION['error'] = $e->getMessage();
    	$all_purpose->redirect("view-all-users.php");
    }
?>