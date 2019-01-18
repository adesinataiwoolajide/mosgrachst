<?php 
	session_start();
    require("../../connection/connection.php");
    include("../super-admin/libs_dev/staffs/staff_class.php");
    include("../dev/general/all_purpose_class.php");
    
    try{
        $staff_details = new schoolStaffs($db);
    	$all_purpose = new all_purpose($db);

    	if(isset($_GET['staff_email'])){
    		$staff_number = $_GET['staff_number'];
    		$staff_email = $_GET['staff_email'];
    		$email = $_SESSION['user_name'];

    		if(!empty($staff_details->deleteStaffData($staff_number)) AND (!empty($staff_details->delePass($staff_email)) AND (!empty($staff_details->deleLogin($staff_email))))){
                $action ="Delete $staff_email Details with $staff_number Staff Number From the Staff List";
                $his = $all_purpose->getUserDetailsandAddActivity($email, $action);
                $_SESSION['success'] = "You Have Deleted $staff_number Detailss Successfully";
                $all_purpose->redirect("view-all-school-staff.php");
            
    		}else{
    			$_SESSION['error'] = "Unable to Delete $staff_email Details at the moment,Please try again later";
    			$all_purpose->redirect("view-all-school-staff.php");
    		}
    	}else{
    		$all_purpose->redirect("view-all-school-staff.php");
    	}
    }catch(PDOException $e){
    	$_SESSION['error'] = $e->getMessage();
    	$all_purpose->redirect("view-all-school-staff.php");
    }
?>