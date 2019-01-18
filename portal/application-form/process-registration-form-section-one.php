<?php 
	session_start();
	require("../../connection/connection.php");
    include("../../inc/dev/admission/admission_class.php");
    include("../../mgchst-administrator/dev/general/all_purpose_class.php");
    
    try{
    	$student = new studentAdmission($db);
    	$all_purpose = new all_purpose($db);
    	$dir = "studentadmissionimages/";
	   	
	    $file_name = $_FILES['image']['name'];
	    $file_size =$_FILES['image']['size'];
	    $file_tmp =$_FILES['image']['tmp_name'];
	    $file_type=$_FILES['image']['type'];
	    $file_ext = pathinfo($file_name);
	    $ext = $file_ext['extension'];
	    $extensions= array("jpeg","jpg","png", "JPEG", "JPG", "PNG");
	    
	    if(!(in_array($ext,$extensions))){
	    	$return = $_POST['return'];
	    	$_SESSION['error']="Image Extension not allowed, Please choose a JPEG or PNG file.";
	        $all_purpose->redirect($return);	
     	}
		if($file_size > 2097152){
			$return = $_POST['return'];
          	$_SESSION['error'] = 'File size must be not greater than 2 MB';
          	$all_purpose->redirect($return);	
    	}else{
        
	        $move= move_uploaded_file($file_tmp, $dir.$file_name);
	    	if((isset($_POST['adding_details']) AND ($move))){
	    		
	    		$procourse_id = $_POST['procourse_id'];
	    		$regNumber = "MGCHST".$student->generateStudentRegistrationNumber();
	    		$surname = $all_purpose->sanitizeInput($_POST['surname']);
	    		$other_names = $all_purpose->sanitizeInput($_POST['other_names']);
	    		$date_birth = $all_purpose->sanitizeInput($_POST['birth_date']);
	    		$nationality = $all_purpose->sanitizeInput($_POST['nationality']);
	    		$state_origin = $all_purpose->sanitizeInput($_POST['state']);
	    		$phone_number = $all_purpose->sanitizeInput($_POST['phone_number']);
	    		$student_email = $all_purpose->sanitizeInput($_POST['student_email']);
	    		$address = $all_purpose->sanitizeInput($_POST['address']);
	    		$sex = $all_purpose->sanitizeInput($_POST['sex']);
	    		$prog_id = $all_purpose->sanitizeInput($_POST['prog_id']);
	    		$dept_id = $_POST['dept_name'];

	    		$school_name = $_POST['school_name'];
	    		$school_id = $_POST['school_id'];

	    		if($student->checkEmailExistence($student_email)){
	    			$return = $_POST['return'];
	    			$_SESSION['error'] = "This E-Mail $student_email is already in use by another user";
	    			$all_purpose->redirect($return);
	    		}else{

	    			if(!empty($student->addRegistrationStepOne($file_name, $regNumber, $surname, $other_names, $date_birth, $nationality, $state_origin, $phone_number, $student_email, $address, $dept_id, $prog_id, $procourse_id, $sex))){
	    				$_SESSION['success']="$surname $other_names <br> Please Fill The Below form to Complete your Registration.";
	    				$all_purpose->redirect("registration-form-section-two.php?school_name=$school_name&&registration_number=$regNumber&&student_email=$student_email&&school_identification=$school_id");
	    			}else{
	    				$return = $_POST['return'];
	    				$_SESSION['error']="$surname $other_names <br>Your Registration could not be completed at the moment, Please try Again Later";
	    				$all_purpose->redirect($return);
	    			}
	    		}
	    	}else{
	    		$return = $_POST['return'];
	    		$_SESSION['error'] = "The Passport You Uploaded is not Acceptable, Please choose another Passport";
	    		$all_purpose->redirect($return);
	    	}

	    }

    }catch(PDOException $e){
    	$return = $_POST['return'];
    	$_SESSION['error'] = $e->getMessage();
    	$all_purpose->redirect($return);
    }