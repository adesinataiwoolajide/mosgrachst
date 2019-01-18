<?php 
	session_start();
	require("../../connection/connection.php");
    require("../super-admin/libs_dev/students-registration/students-registration.php");
    include("../dev/general/all_purpose_class.php");
    
    try{
    	$student = new oldStudentRegistration($db);
    	$all_purpose = new all_purpose($db);
    	if(isset($_GET['student_matric_num'])){
    		$student_matric_num = $_GET['student_matric_num'];
            $regNumber = $_GET['register_number'];
    		$email = $_SESSION['user_name'];
    		if(!empty($student->deleteStudentQuailifications($regNumber)) AND(!empty($student->deleteStudentBiodata($regNumber))) AND (!empty($student->deleteStudentAdmission($student_matric_num))) AND (!empty($student->deleteStudentLogin($student_matric_num)))){
    			$action ="Deleted $regNumber Details";
				$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
    			$_SESSION['success']="You Have Deleted $regNumber Details Successfully";
    			$all_purpose->redirect("all-school-student-details.php"); 

    		}else{
    			$_SESSION['error'] = "Unable to Delete $regNumber details at the Moment, Please Try Again Later";
    			$all_purpose->redirect("all-school-student-details.php");
    		}
    	}else{
    		$all_purpose->redirect("all-school-student-details.php");
    	}
    }catch(PDOException $e){
    	$_SESSION['error'] = $e->getMessage();
    	$all_purpose->redirect("all-school-student-details.php");
    }