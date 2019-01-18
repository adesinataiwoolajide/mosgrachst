<?php
	session_start();
	require("../../connection/connection.php");
	require '../../portal/student-dashboard/libs_dev/course-registration/course-registration-class.php';
	include("../dev/general/all_purpose_class.php");
	
	try{
		$rigid = new studentCourseRegistration($db);
		$all_purpose = new all_purpose($db);
		if($_POST){
			$y = $_POST["show"];
			for($i = 1; $i <= $y; $i++){
				$student_matric_num = $_POST['student_matric_num'];
				$email = $_SESSION['user_name'];
				$session_id= $_POST['session_id'];
				$level_id = $_POST['level_id'];
				$prog_id = $_POST['prog_id'];
				$dept_id = $_POST['dept_name'];
				$session_name = $_POST['session_name'];
				$course_code = strtoupper($_POST["course_code$i"]);
				$grant = $_POST["add_course$i"];
				$regNumber = $_POST['regNumber'];
				if($grant ==1){
					if($rigid->checkDoubleCourse($student_matric_num, $course_code, $session_id)){
						$return = $_POST['return'];
						$_SESSION['error'] = "You Have Already Added $course_code For $student_matric_num Before";
						$all_purpose->redirect("my-student-course-list.php?student-matric-number=$student_matric_num&&session_name=$session_name&&registration_number=$regNumber&&academic-session=$session_id");
					}else{
						
						if($rigid->insertStudentReg($student_matric_num, $session_id, $course_code, $level_id, $prog_id, $dept_id)){
							$action ="Added Courses For $student_matric_num For $session_name";
							$his = $all_purpose->getUserDetailsandAddActivity($email, $action);

						}else{
							$return = $_POST['return'];
							$_SESSION['error'] = "Network Failure, Please Try Again Later";
							$all_purpose->redirect("$return");

						}
					}
				}
			}
			
			$_SESSION['success'] = "You Have Registered The Selected Course For This Session $session_name Successfully. <br> Please Preview Your Course List Before Final Submission";
			$all_purpose->redirect("my-student-course-list.php?student-matric-number=$student_matric_num&&session_name=$session_name&&registration_number=$regNumber&&academic-session=$session_id");
		}else{
			$_SESSION['error'] = "Please Select The Course From The List of Courses";
			redirect("$return ");
		}

	
	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		redirect("$return");
	}
?>