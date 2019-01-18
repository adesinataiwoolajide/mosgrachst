<?php
	session_start();
	require("../../connection/connection.php");
	require '../../portal/student-dashboard/libs_dev/course-registration/course-registration-class.php';
	include("../dev/general/all_purpose_class.php");
	
	try{
		$rigid = new studentCourseRegistration($db);
		$all_purpose = new all_purpose($db);
		if(isset($_GET['registration-identification'])){
			$email = $_SESSION['user_name'];
			$registration_id = $_GET['registration-identification'];
			$student_matric_num = $_GET['student-matric-number'];
			$regNumber = $_GET['registration_number'];
			$session_name = $_GET['session_name'];
			$session_id=$_GET['session_id'];
			$details = $rigid->useRegistrationID($registration_id);
			$course_code = $details['course_code'];
			$session_id= $details['session_id'];
			if($rigid->deleteCourseRegistered($student_matric_num, $registration_id)){
				$action ="Removed $course_code From The Course List For Session $session_name";
                $his = $all_purpose->getUserDetailsandAddActivity($email, $action);
				$_SESSION['success'] = "You Have Removed $course_code From The Course List For Session $session_name";
				$all_purpose->redirect("my-student-course-list.php?student-matric-number=$student_matric_num&&session_name=$session_name&&registration_number=$regNumber&&academic-session=$session_id");
			}else{
				$_SESSION['error'] = "Unable to Remove $course_code From The Course List at the moment, Please Try Again Later";
				$all_purpose->redirect("my-student-course-list.php?student-matric-number=$student_matric_num&&session_name=$session_name&&registration_number=$regNumber&&academic-session=$session_id");
			}
		}else{
			$all_purpose->redirect("my-student-course-list.php?student-matric-number=$student_matric_num&&session_name=$session_name&&registration_number=$regNumber&&academic-session=$session_id");
		}

	
	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("my-student-course-list.php?student-matric-number=$student_matric_num&&session_name=$session_name&&registration_number=$regNumber&&academic-session=$session_id");
	}
?>