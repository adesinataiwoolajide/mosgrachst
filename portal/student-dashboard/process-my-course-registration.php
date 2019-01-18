<?php
	session_start();
	require("../../connection/connection.php");
	require 'libs_dev/course-registration/course-registration-class.php';
	include("../../mgchst-administrator/dev/general/all_purpose_class.php");
	
	try{
		$rigid = new studentCourseRegistration($db);
		$all_purpose = new all_purpose($db);
		if($_POST){
			$y = $_POST["show"];
			$student_matric_num = $_POST['student_matric_num'];
			$email = $student_matric_num;
			$session_id= $_POST['session_id'];
			$level_id = $_POST['level_id'];
			$prog_id = $_POST['prog_id'];
			$dept_id = $_POST['dept_name'];

			for($i = 1; $i <= $y; $i++){
				$course_code = strtoupper($_POST["course_code$i"]);
				$grant = $_POST["add_course$i"];
				if($grant ==1){
					if($rigid->checkDoubleCourse($student_matric_num, $course_code, $session_id)){
						$_SESSION['error'] = "You Have Already Added $course_code to Your Course List For This Session $session_id Before";
						$all_purpose->redirect("my-course-list.php?student-matric-number=$student_matric_num&&session_identification=$session_id");
					}else{
						
						if($rigid->insertStudentReg($student_matric_num, $session_id, $course_code, $level_id, $prog_id, $dept_id)){
							$action ="Registered For $session_id Course";
							$his = $all_purpose->getUserDetailsandAddActivity($email, $action);

						}else{
							$_SESSION['error'] = "Network Failure, Please Try Again Later";
							$all_purpose->redirect("my-course-registration.php");

						}
					}
				}
			}
			
			$_SESSION['success'] = "You Have Registered The Selected Course For This Session $session_id Successfully. <br> Please Preview Your Course List Before Final Submission";
			$all_purpose->redirect("my-course-list.php?student-matric-number=$student_matric_num&&session_identification=$session_id");
		}else{
			$_SESSION['error'] = "Please Select Your Course From The List of Courses";
			redirect("course-registration.php");
		}

	
	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		redirect("course-registration.php");
	}
?>