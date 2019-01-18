<?php
	session_start();
	require("../../connection/connection.php");
	require '../../portal/student-dashboard/libs_dev/course-registration/course-registration-class.php';
	include("../../mgchst-administrator/dev/general/all_purpose_class.php");
	
	try{
		$rigid = new studentCourseRegistration($db);
		$all_purpose = new all_purpose($db);
		if(isset($_POST['adding_course'])){
			$student_matric_num = $_POST['student_matric_num'];
			$email = $student_matric_num;
			$name= $_POST['session_name'];
			$id = $_POST['session_id'];
			$session_id= $name;
			$level_id = $_POST['level_name'];
			$prog_id = $_POST['prog_id'];
			$dept_id = $_POST['dept_id'];
			$course_code = $_POST['course_code'];
			$regNumber = $_POST['regNumber'];
			$uppers =  strtoupper($course_code);
			$tansform = strtolower($course_code);
			
			if($rigid->searchCourse($uppers, $tansform)){
				$_SESSION['error']="$course_code Does Not Exist on The School Course List";
				$all_purpose->redirect("my-student-course-list.php?student-matric-number=$student_matric_num &&registration_number=$regNumber&&session_name=$name&&academic-session=$id");
			}	
			elseif($rigid->checkDoubleCourse($student_matric_num, $course_code, $session_id)){
				$_SESSION['error']="You Have Already Added $course_code to  The Student Course List For This Session $session_id Before";
				$all_purpose->redirect("my-student-course-list.php?student-matric-number=$student_matric_num &&registration_number=$regNumber&&session_name=$name&&academic-session=$id");
			}else{
				
				if($rigid->insertStudentReg($student_matric_num, $session_id, $course_code, $level_id, $prog_id, $dept_id)){
					$action ="Added $course_code to his Course List For $session_id Course";
					$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
					$_SESSION['success'] = "You Have Added $course_code For This Session $session_id Successfully. <br> Please Preview The Student Course List Before Final Submission";
					$all_purpose->redirect("my-student-course-list.php?student-matric-number=$student_matric_num &&registration_number=$regNumber&&session_name=$name&&academic-session=$id");
				}else{
					$_SESSION['error'] = "Network Failure, Please Try Again Later";
					$all_purpose->redirect("my-student-course-list.php?student-matric-number=$student_matric_num &&registration_number=$regNumber&&session_name=$name&&academic-session=$id");
				}
			}
		}else{
			$_SESSION['error'] = "Please Enter The Course Code Or The Course Title";
			$all_purpose->redirect("my-student-course-list.php?student-matric-number=$student_matric_num &&registration_number=$regNumber&&session_name=$name&&academic-session=$id");
		}

	
	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("my-student-course-list.php?student-matric-number=$student_matric_num &&registration_number=$regNumber&&session_name=$name&&academic-session=$id");
	}
?>