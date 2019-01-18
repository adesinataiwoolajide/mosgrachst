<?php
	
	session_start();
	require("../../connection/connection.php");
    include("libs_dev/department/department-class.php");
    include("../dev/general/all_purpose_class.php");
    try{
    	$proc = new programmeCourse($db);
        $department = new schoolDepartment($db);
    	$all_purpose = new all_purpose($db);
    	if(isset($_POST['updating-course'])){
    		$email = $_SESSION['user_name'];
    		$prog_course = $all_purpose->sanitizeInput($_POST['name']);
    		$dept_id = $all_purpose->sanitizeInput($_POST['dept_id']);
            $requirement = $all_purpose->sanitizeInput($_POST['requirement']);
            $certification = $all_purpose->sanitizeInput($_POST['certification']);
            $duration = $all_purpose->sanitizeInput($_POST['duration']);

    		
            $depo = $department->getDepartmentDetails($dept_id);
            $name = $depo['dept_name'];

            $procourse_id = $_POST['procourse_id'];
            $return = $_POST['return'];

    		
			if(!empty($proc->updateProgrammeCourse($prog_course, $requirement, $certification,$duration, $dept_id, $procourse_id))){
				$action ="Updated $prog_course Course Details";
				$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
				$_SESSION['success'] = "You Have Updated $prog_course Course in the Department of $name Successfully";
				$all_purpose->redirect("view-all-programme-courses.php");
			}else{
                $return = $_POST['return'];
				$_SESSION['error'] = "Unable to Update $prog_course Course with the $programme_name Programme at the moment, Please try Again Later";
				$all_purpose->redirect($return);
			}
		}else{
             $return = $_POST['return'];
    		$_SESSION['error']="Please fill the below form to Update the Programme Course Details";
    		$all_purpose->redirect($return);
    	}
    }catch(PDOException $e){
        $return = $_POST['return'];
    	$_SESSION['error'] = $e->getMessage();
    	$all_purpose->redirect($return);
    }
?>