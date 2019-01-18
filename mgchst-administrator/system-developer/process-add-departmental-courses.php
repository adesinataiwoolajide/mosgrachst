<?php
	session_start();
	require("../../connection/connection.php");
    require("../super-admin/libs_dev/course/course_class.php");
    include("../super-admin/libs_dev/department/department-class.php");
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
				$grant = $_POST["add_course$i"];
				$dept_id = $all_purpose->sanitizeInput($_POST['dept_id']);
				$details = $department->getDepartmentDetails($dept_id);
				$dept_name =$details['dept_name'];
				if($grant ==1){
					$foll = $course->getCourseIdentity($course_id);
					$course_name = $foll['course_code'];

					$check = $db->prepare("SELECT * FROM departmental_courses WHERE course_id=:course_id AND dept_id=:dept_id");
					$arrCheck = array(':course_id'=>$course_id, ':dept_id'=>$dept_id);
					$check->execute($arrCheck);
					if($check->rowCount()==1){
						$_SESSION['error']="Some of The Selected Courses are Already in The Departmental Course List";
						$all_purpose->redirect("view-departmental-courses.php");
					//if($deptCourse->checkCouseExistence($course_id, $dept_id)){ 
						

					}else{
						if($deptCourse->insertDepartmetalCourse($course_id, $dept_id)){
							$action ="Added $course_name to $dept_name Departmental Course List";
							$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
						}else{
							$_SESSION['error'] = "Unable to Add the Selected Course to $dept_name at the Moment, Please try again later";
							$all_purpose->redirect("add-departmental-courses.php");
						}
					}
				}
			}
			$_SESSION['success'] = "Courses Added to $dept_name Departmental Course List Successfully";
			$all_purpose->redirect("view-departmental-courses.php");
		}
	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("add-departmental-courses.php");
	}
