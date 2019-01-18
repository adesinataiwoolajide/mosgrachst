<?php
	
	session_start();
	require("../../connection/connection.php");
    include("libs_dev/department/department-class.php");
    include("../dev/general/all_purpose_class.php");
    try{
    	$department = new schoolDepartment($db);
    	$all_purpose = new all_purpose($db);
    	if(isset($_POST['adding-dept'])){
    		$email = $_SESSION['user_name'];
    		$department_name = $all_purpose->sanitizeInput($_POST['name']);
            $abv_name = $all_purpose->sanitizeInput($_POST['abv_name']);
    	
    		if($department->checkExistenceDepartment($department_name)){
    			$_SESSION['error'] = "You have Added $department_name Department Name Before";
    			$all_purpose->redirect("add-department.php");
    		}else{
    			if(!empty($department->addingDepartment($department_name, $abv_name))){
    				$action ="Added $department_name Department to the Department List";
					$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
					$_SESSION['success'] = "You Have Added $department_name Department Name With The Abbrevation Name $abv_name Successfully";
					$all_purpose->redirect("view-all-departments.php");
    			}else{
    				$_SESSION['error'] = "Unable to Add $department_name Department at the moment, Please try Again Later";
    				$all_purpose->redirect("add-department.php");
    			}

    		}
		}else{
    		$_SESSION['error'] = "Please fill the below form to Add Department Details";
    		$all_purpose->redirect("add-department.php");
    	}
    }catch(PDOException $e){
    	$_SESSION['error'] = $e->getMessage();
    	$all_purpose->redirect("add-department.php");
    }
?>