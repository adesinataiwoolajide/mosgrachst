<?php
	session_start();
	require("../../connection/connection.php");
	require 'libs_dev/course-registration/course-registration-class.php';
	include("../../mgchst-administrator/dev/general/all_purpose_class.php");
	
	try{
		$rigid = new studentCourseRegistration($db);
		$all_purpose = new all_purpose($db);
		if(isset($_GET['registration-identification'])){
			$registration_id = $_GET['registration-identification'];
			$student_matric_num = $_GET['student_matric_num'];
			$details = $rigid->useRegistrationID($registration_id);
			$course_code = $details['course_code'];
			$session_id= $details['session_id'];
			if($rigid->deleteCourseRegistered($student_matric_num, $registration_id)){
				$_SESSION['success'] = "You Have Removed $course_code From Your Course List For Session $session_id";
				$all_purpose->redirect("my-course-list.php?student-matric-number=$student_matric_num&&session_identification=$session_id");
			}else{
				$_SESSION['error'] = "Unable to Remove $course_code From Your Course List at the moment, Please Try Again Later";
				$all_purpose->redirect("my-course-list.php?student-matric-number=$student_matric_num&&session_identification=$session_id");
			}
		}else{
			$all_purpose->redirect("my-course-list.php?student-matric-number=$student_matric_num&&session_identification=$session_id");
		}

	
	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("my-course-list.php?student-matric-number=$student_matric_num&&session_identification=$session_id");
	}
?>