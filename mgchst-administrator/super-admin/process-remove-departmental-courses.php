<?php
	session_start();
	require("../../connection/connection.php");
    require("libs_dev/course/course_class.php");
    include("libs_dev/department/department-class.php");
    include("../dev/general/all_purpose_class.php");
    try{
    	
    	$course = new addNewSchoolCourse($db);
    	$department = new schoolDepartment($db);
    	$deptCourse = new departmentalCourses($db);
    	$all_purpose = new all_purpose($db);
    	
		if($_POST){
			$y = $_POST["show"];
			$email = $_SESSION['user_name'];
			for($i = 1; $i <= $y; $i++){
				$course_id = $_POST["course_id$i"];
				$dept_id = $_POST["dept_id$i"];
				$grant = $_POST["add_course$i"];
				$dept_course_id = $_POST["dept_course_id$i"];
				
				if($grant ==1){
					$foll = $course->getCourseIdentity($course_id);
					$course_name = $foll['course_code'];
					$details = $department->getDepartmentDetails($dept_id);
					$dept_name =$details['dept_name'];
					
					if($deptCourse->deleteDeptCourseDetails($dept_course_id)){
						$action ="Deleted $course_name to $dept_name Departmental Course List";
						$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
					}else{
						$_SESSION['error'] = "Unable to Delete the Selected Course From $dept_name at the Moment, Please try again later";
						$all_purpose->redirect("delete-departmental-courses.php");
					}
				}
			}
			$_SESSION['success'] = "Courses Deleted From $dept_name Departmental Course List Successfully";
			$all_purpose->redirect("view-departmental-courses.php");
		}
	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("delete-departmental-courses.php");
	}
