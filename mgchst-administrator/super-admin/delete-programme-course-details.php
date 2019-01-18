<?php
	
	session_start();
	require("../../connection/connection.php");
    include("libs_dev/department/department-class.php");
    include("../dev/general/all_purpose_class.php");
    try{
    	$proc = new programmeCourse($db);
        $department = new schoolDepartment($db);
    	$all_purpose = new all_purpose($db);
    	if(isset($_GET['procourse_id'])){
    		$email = $_SESSION['user_name'];
    		 $procourse_id = $_GET['procourse_id'];
            $details = $proc->getProgrammeCourseIdentification($procourse_id);
            $name = $details['prog_course'];
            $dept_id = $details['dept_id'];
            $depo = $proc->DepartmentDetailsNow($dept_id);
    		$dep = $depo['dept_name'];
			if(!empty($proc->deleteProgrammeCourse($procourse_id))){
				$action ="Deleted $prog_course From The List";
				$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
				$_SESSION['success'] = "You Have Deleted $name Course from Programme Course Successfully";
				$all_purpose->redirect("view-all-programme-courses.php");
			}else{
				$_SESSION['error'] = "Unable to Delete $prog_course Course at the moment, Please try Again Later";
				$all_purpose->redirect("view-all-programme-courses.php");
			}
		}else{
    		$_SESSION['error']="Please Select A Course to be Deleted";
    		$all_purpose->redirect("view-all-programme-courses.php");
    	}
    }catch(PDOException $e){
        
    	$_SESSION['error'] = $e->getMessage();
    	$all_purpose->redirect("view-all-programme-courses.php");
    }
?>