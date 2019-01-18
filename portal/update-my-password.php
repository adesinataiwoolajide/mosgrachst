<?php
	session_start();
	require("../connection/connection.php");
	require("../mgchst-administrator/dev/general/all_purpose_class.php");
	require("../mgchst-administrator/super-admin/libs_dev/students-registration/students-registration.php");
	
	try{
		$all_purpose = new all_purpose($db);
		$students = new oldStudentRegistration($db);
		if(isset($_POST['update-details'])){
			$student_matric_num = $all_purpose->sanitizeInput($_POST['matric']);
			$password = sha1($_POST['password']);
			$repeat = sha1($_POST['repeat-password']);

			if($password != $repeat){
				$_SESSION['error'] = "Ooooops!!! Password Does Not Match";
				$all_purpose->redirect("forget-password.php");
			}
			$update = $db->prepare("UPDATE student_login SET password=:password WHERE user_name=:student_matric_num");
			$arrup = array(':password'=>$password, ':student_matric_num'=>$student_matric_num);
			if(!empty($update->execute($arrup))){
				$_SESSION['success'] = "Password Changed Successfully";
				$all_purpose->redirect("./");
			}else{
				$_SESSION['error']= "Unable to change your Password at the Moment, Please Try Again Later";
				$all_purpose->redirect("forget-password.php");
			}
		}else{
			$_SESSION['error'] = "Please Enter Your Password";
			$all_purpose->redirect("forget-password.php");
		}
	}catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
        $all_purpose->redirect("forget-password.php");
    }
