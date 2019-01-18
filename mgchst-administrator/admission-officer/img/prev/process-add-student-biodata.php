<?php 
	session_start();
	require("../../connection/connection.php");
    require("../super-admin/libs_dev/students-registration/students-registration.php");
    include("../super-admin/libs_dev/department/department-class.php");
    include("../dev/general/all_purpose_class.php");
    
    try{
    	$student = new oldStudentRegistration($db);
    	$department = new schoolDepartment($db);
    	$all_purpose = new all_purpose($db);
    	$dir = "../../portal/application-form/studentadmissionimages/";
	   	
	    $file_name = $_FILES['image']['name'];
	    $file_size =$_FILES['image']['size'];
	    $file_tmp =$_FILES['image']['tmp_name'];
	    $file_type=$_FILES['image']['type'];
	    $file_ext = pathinfo($file_name);
	    $ext = $file_ext['extension'];
	    $extensions= array("jpeg","jpg","png", "JPEG", "JPG", "PNG");
	    
	    if(!(in_array($ext,$extensions))){
	    	$_SESSION['error']="Image Extension not allowed, Please choose a JPEG or PNG file.";
	        $all_purpose->redirect("add-student-biodata.php");		
     	}
		if($file_size > 2097152){
          	$_SESSION['error'] = 'File size must be not greater than 2 MB';
          	$all_purpose->redirect("add-student-biodata.php");	
    	}else{
        
	        $move= move_uploaded_file($file_tmp, $dir.$file_name);
	    	if((isset($_POST['adding_details']) AND ($move))){
	    		$email = $_SESSION['user_name'];
	    		$procourse_id = $all_purpose->sanitizeInput($_POST['procourse_id']);
	    		$surname = $all_purpose->sanitizeInput($_POST['surname']);
	    		$other_names = $all_purpose->sanitizeInput($_POST['other_names']);
	    		$dept_id = $all_purpose->sanitizeInput($_POST['dept_id']);
	    		$prog_id = $all_purpose->sanitizeInput($_POST['prog_id']);
	    		$date_birth = $all_purpose->sanitizeInput($_POST['birth_date']);
	    		$nationality = $all_purpose->sanitizeInput($_POST['nationality']);
	    		$state_origin = $all_purpose->sanitizeInput($_POST['state']);
	    		$phone_number = $all_purpose->sanitizeInput($_POST['phone_number']);
	    		$student_email = $all_purpose->sanitizeInput($_POST['student_email']);
	    		$address = $all_purpose->sanitizeInput($_POST['address']);
	    		$sex = $all_purpose->sanitizeInput($_POST['sex']);
	    		$religion = $all_purpose->sanitizeInput($_POST['religion']);
	    		$marital_status = $all_purpose->sanitizeInput($_POST['marital_status']);
	    		$kin_name = $all_purpose->sanitizeInput($_POST['kin_name']);
	    		$kin_phone = $all_purpose->sanitizeInput($_POST['kin_phone']);
	    		$kid_address = $all_purpose->sanitizeInput($_POST['kid_address']);
	    		$level_id = $all_purpose->sanitizeInput($_POST['level_id']);
	    		$admission_status=1;
	    		$admission_year = $all_purpose->sanitizeInput($_POST['year_admit']);


	    		$depo = $department->getDepartmentDetailsNameIDD($dept_id);
	    		$cut = $depo['dept_abv'];
	    		$year = substr($admission_year, 2,3);
	    		if($prog_id ==1){
	    			$roll = "DFT";
	    			$student_matric_num = "$year/$cut/".$student->generateStudentMtariculationNumber();
	    		}elseif($prog_id ==2){
	    			$roll = "DIP";
	    			$student_matric_num = "MGCHST/$year"."/$cut/$roll/".$student->generateStudentMtariculationNumber();
	    			
	    		}elseif($prog_id == 3){
	    			$student_matric_num = "$year/$cut/".$student->generateStudentMtariculationNumber();
	    		}else{
	    			$roll = "$year/".$student->generateStudentMtariculationNumber();
	    		}
	    		$regNumber = "MGCHST".$student->generateStudentRegistrationNumber();
				$passwording = sha1($student_matric_num);

	    		if(($student->checkEmailExistence($student_email, $regNumber)) OR ($student->checkingStudentAdmission($student_matric_num)) OR ($student->checkingStudentLogin($student_matric_num))){
	    			$_SESSION['error'] = "This E-Mail/Matric Number is Already in Use By Another Student";
	    			$all_purpose->redirect("add-student-biodata.php");
	    		}else{

	    			if(!empty($student->addRegistrationStepOne($file_name, $regNumber, $surname, $other_names, 
	    				$date_birth,  $state_origin, $phone_number, $student_email, $address,$dept_id, $prog_id, 
	    				$procourse_id,$nationality, $sex, $marital_status, $kin_name, $kin_phone, $kid_address, 
	    				$admission_status, $religion, $level_id))AND(!empty($student->grantStudentAdmission($regNumber, $student_matric_num, $dept_id, $prog_id, $level_id, $admission_status, $admission_year)))AND(!empty($student->student_login($student_matric_num, $passwording)))){
	    				$action ="Added $student_matric_num Biodata Details";
						$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
	    				$_SESSION['success']="Please Fill The Below form to Complete $surname $other_names   Registration.";
	    				$all_purpose->redirect("add-student-qualifications.php?student_matric_num=$student_matric_num&&reg_number=$regNumber");
	    			}else{
	    				$_SESSION['error']="Unable to Complete $surname $other_names Registration at the moment, Please try Again Later";
	    				$all_purpose->redirect("add-student-biodata.php");
	    			}
	    		}
	    	}else{
	    		$_SESSION['error'] = "The Passport You Uploaded is not Acceptable, Please choose another Passport";
	    		$all_purpose->redirect("add-student-biodata.php");
	    	}
	    }
    }catch(PDOException $e){
    	$_SESSION['error'] = $e->getMessage();
    	$all_purpose->redirect("add-student-biodata.php");
    }