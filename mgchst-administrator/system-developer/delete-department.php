<?php
	
	session_start();
	require("../../connection/connection.php");
    include("../super-admin/libs_dev/department/department-class.php");
    include("../dev/general/all_purpose_class.php");
    try{
    	$department = new schoolDepartment($db);
    	$all_purpose = new all_purpose($db);
    	if(isset($_GET['identification'])){
    		$email = $_SESSION['user_name'];
    		$dept_id = $_GET['identification'];
    		$department_name = $_GET['department_name'];
    		$defo = $department->getDepartmentDetails($dept_id);
    		$prog_id = $defo['prog_id'];
    		$lol = $department->getProgramme($prog_id);
    		$programme_name = $lol['prog_name'];
    		if($department->deleteDepartment($dept_id)){
				$action ="Deleted $department_name Department with $programme_name From the Department List";
				$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
				$_SESSION['success'] = "You Have Deleted $department_name Department with $programme_name From the Department List Successfully";
				$all_purpose->redirect("view-all-departments.php");
    		}else{
				$_SESSION['error'] = "Unable to Delete $department_name Department with $programme_name Programme at the moment, Please try Again Later";
				$all_purpose->redirect("view-all-departments.php");
    		}
    	}else{
    		$all_purpose->redirect("view-all-departments.php");
    	}
    }catch(PDOException $e){
    	$_SESSION['error'] = $e->getMessage();
    	$all_purpose->redirect("view-all-departments.php");
    }