<?php
	
	session_start();
	require("../../connection/connection.php");
    require("../dev/registration/class_registration.php");
    require("../dev/general/all_purpose_class.php");
    try{
        $register = new registration($db);
        $all_purpose = new all_purpose($db);
    	if(isset($_GET['user_name'])){
    		$email = $_SESSION['user_name'];
    		$users = $_GET['user_name'];
            $pass = $register->gettingPassportDetails($users);
            $use = $register->gettingUserDetails($users);
            $user_id = $use['user_id'];
    		$pass_id = $pass['pass_id'];
    		
    		if($register->deleteAdmin($user_id) AND($register->deleteUserPassport($pass_id))){
				$action ="Deleted $users User Details";
				$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
				$_SESSION['success'] = "You Have Deleted $users Details Successfully";
				$all_purpose->redirect("view-all-users.php");
    		}else{
				$_SESSION['error'] = "Unable to Delete $users Details at the moment, Please try Again Later";
				$all_purpose->redirect("view-all-users.php");
    		}
    	}else{
    		$all_purpose->redirect("view-all-users.php");
    	}
    }catch(PDOException $e){
    	$_SESSION['error'] = $e->getMessage();
    	$all_purpose->redirect("view-all-users.php");
    }