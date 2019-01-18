<?php 
	session_start();
	require("../../connection/connection.php");
    include("../super-admin/libs_dev/staffs/staff_class.php");
    include("../dev/general/all_purpose_class.php");
    require("../dev/registration/class_registration.php");
    try{
    	$register = new registration($db);
    	$staff_details = new schoolStaffs($db);
    	$all_purpose = new all_purpose($db);
    	$dir = "../staffimages/";
	   	
	    $file_name = $_FILES['image']['name'];
	    $file_size =$_FILES['image']['size'];
	    $file_tmp =$_FILES['image']['tmp_name'];
	    $file_type=$_FILES['image']['type'];
	    $file_ext = pathinfo($file_name);
	    $ext = $file_ext['extension'];
	    $extensions= array("jpeg","jpg","png", "JPEG", "JPG", "PNG");
	    
	    if(!(in_array($ext,$extensions))){
	    	$_SESSION['error']="Image Extension not allowed, Please choose a JPEG or PNG file.";
	        $all_purpose->redirect("add-staff-biodata.php");	
     	}
		if($file_size > 2097152){
          	$_SESSION['error'] = 'File size must be not greater than 2 MB';
          	$all_purpose->redirect("add-staff-biodata.php");	
    	}else{
        
	        $move= move_uploaded_file($file_tmp, $dir.$file_name);
	    	if((isset($_POST['adding_details']) AND ($move))){
	    		$email = $_SESSION['user_name'];
	    		$staff_number = date("y")."-".$staff_details->generateStaffNumber();
	    		$staff_name = $all_purpose->sanitizeInput($_POST['name']);
	    		$staff_email = $all_purpose->sanitizeInput($_POST['staff_email']);
	    		$staff_phone = $all_purpose->sanitizeInput($_POST['phone']);
	    		$staff_sex = $all_purpose->sanitizeInput($_POST['sex']);
	    		$religion = $all_purpose->sanitizeInput($_POST['religion']);
	    		$staff_type = $all_purpose->sanitizeInput($_POST['type']);
	    		$address = $all_purpose->sanitizeInput($_POST['address']);
	    		$birth_date = $all_purpose->sanitizeInput($_POST['birth_date']);
	    		$marital_status = $all_purpose->sanitizeInput($_POST['marital_status']);
	    		//$dept =$all_purpose->sanitizeInput($_POST['dept_id']); 
	    		$dept_id = implode(",", $_POST['dept_id']); 
	    		$qualification_id = implode(",", $_POST['qualification_id']);

	    		$access = $staff_type;
	    		$full_name = $staff_name;
	    		$password = sha1($staff_email);
	    		$eemail = $staff_email;

	    		if($staff_details->checkingStaffLogin($staff_email) OR ($staff_details->checkStaffExistence($staff_email))){
	    			$_SESSION['error'] = "You Have Added A Staff With this Email $staff_email Before, Please Kindly use another E-Mail And Try Again";
	    			$all_purpose->redirect("add-staff-biodata.php");
	    		}elseif($staff_details->checkPassPortExistence($file_name)){
	    			$_SESSION['error'] = "You Have Added A Staff with This Image Before, Please select a new image or Rename the Image";
	    			$all_purpose->redirect("add-staff-biodata.php");
	    		}else{
	    			if((!empty($staff_details->addNewStaffDetails($staff_number, $staff_name, $staff_email, $staff_phone, $staff_sex, $religion, $staff_type, $address, $birth_date, $marital_status, $dept_id, $qualification_id))) AND (!empty($staff_details->addingStaffPassport($staff_email, $file_name))) AND (!empty($register->userRegistration($full_name, $eemail, $password, $access)))){

	    				$action ="Added $staff_name Details with $staff_number Staff Number to the Staff List";
						$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
						$_SESSION['success'] = "You Have Added $staff_name Details with $staff_number Staff Number Successfully";
						$all_purpose->redirect("view-all-school-staff.php");

	    			}else{
	    				$_SESSION['error'] = "Unable to Add Staff $staff_number  to The Staff List at the Moment, Please try again later";
						$all_purpose->redirect("add-staff-biodata.php");
	    			}
	    		}
			}else{
	    		$_SESSION['error'] = "Error in Adding the Staff Passport, Please try again Later";
	    		$all_purpose->redirect("add-staff-biodata.php");
	    	}

	    }

    }catch(PDOException $e){
    	$_SESSION['error'] = $e->getMessage();
    	$all_purpose->redirect("add-staff-biodata.php");
    }