<?php
	
	session_start();
	require("../../connection/connection.php");
    include("../super-admin/libs_dev/department/department-class.php");
    include("../dev/general/all_purpose_class.php");
    try{
    	$department = new schoolDepartment($db);
    	$all_purpose = new all_purpose($db);
    	if(isset($_POST['adding-dept'])){
    		$email = $_SESSION['user_name'];
    		$department_name = $all_purpose->sanitizeInput($_POST['name']);
    		$abv_name = $all_purpose->sanitizeInput($_POST['abv_name']);
            $dept_id = $_POST['dept_id'];

			if(!empty($department->updateDepartmentDetails($department_name, $abv_name, $dept_id))){
				$action ="Updated $department_name Department Abbrevation Name $abv_name";
				$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
				$_SESSION['success'] = "You Have Updated $department_name Department With Abbrevation Name $abv_name Successfully";
				$all_purpose->redirect("view-all-departments.php");
			}else{
                $return = $_POST['return'];
				$_SESSION['error'] = "Unable to Update $department_name Department with $programme_name Programme at the moment, Please try Again Later";
				$all_purpose->redirect("$return");
			}

    		
		}else{
            $return = $_POST['return'];
    		$_SESSION['error'] = "Please fill the below form to Add Department Details";
    		$all_purpose->redirect("$return");
    	}
    }catch(PDOException $e){
        $return = $_POST['return'];
    	$_SESSION['error'] = $e->getMessage();
    	$all_purpose->redirect("$return");
    }
?>