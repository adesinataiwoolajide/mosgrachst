<?php 
	session_start();
	require("../../connection/connection.php");
    require("../super-admin/libs_dev/students-registration/students-registration.php");
    include("../dev/general/all_purpose_class.php");
    include("../super-admin/libs_dev/department/department-class.php");
    
    try{
        $student = new oldStudentRegistration($db);
        $all_purpose = new all_purpose($db);
        
    	if(isset($_POST['update_details'])){
    		
    		$dir = "../../portal/application-form/studentadmissionimages/";
            $file_name = $_FILES['image']['name'];
            $file_size =$_FILES['image']['size'];
            $file_tmp =$_FILES['image']['tmp_name'];
            $file_type=$_FILES['image']['type'];
            $file_ext = pathinfo($file_name);
            $move= move_uploaded_file($file_tmp, $dir.$file_name);
            
    		$regNumber = $_POST['regNumber'];
            $school_name = $_POST['school_name'];
            $school_id = $_POST['school_id'];

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
            $student_matric_num = $_POST['matric_number'];
            $admission_id = $_POST['admission_id'];

    		$school1 = $all_purpose->sanitizeInput($_POST['school1']);
    		$from_date1 = $all_purpose->sanitizeInput($_POST['from_date1']);
    		$to_date1 = $all_purpose->sanitizeInput($_POST['to_date1']);
    		$degree1 = $all_purpose->sanitizeInput($_POST['degree1']);
    		
    		$school2 = $all_purpose->sanitizeInput($_POST['school2']);
    		$from_date2 = $all_purpose->sanitizeInput($_POST['from_date2']);
    		$to_date2 = $all_purpose->sanitizeInput($_POST['to_date2']);
    		$degree2 = $all_purpose->sanitizeInput($_POST['degree2']);

    		$school3 = $all_purpose->sanitizeInput($_POST['school3']);
    		$from_date3 = $all_purpose->sanitizeInput($_POST['from_date3']);
    		$to_date3 = $all_purpose->sanitizeInput($_POST['to_date3']);
    		$degree3 = $all_purpose->sanitizeInput($_POST['degree3']);

    		$school4 = $all_purpose->sanitizeInput($_POST['school4']);
    		$from_date4 = $all_purpose->sanitizeInput($_POST['from_date4']);
    		$to_date4 = $all_purpose->sanitizeInput($_POST['to_date4']);
    		$degree_4 = $all_purpose->sanitizeInput($_POST['degree4']);

    		$school5 = $all_purpose->sanitizeInput($_POST['school5']);
    		$from_date5 = $all_purpose->sanitizeInput($_POST['fromdate5']);
			$to_date5 = $all_purpose->sanitizeInput($_POST['todate5']);
			$degree5 = $all_purpose->sanitizeInput($_POST['degree5']);

			$sub1 = $all_purpose->sanitizeInput($_POST['sub1']);
			$grade1 = $all_purpose->sanitizeInput($_POST['grade1']);

			$sub2 = $all_purpose->sanitizeInput($_POST['sub2']);
			$grade2 = $all_purpose->sanitizeInput($_POST['grade2']);

			$sub3 = $all_purpose->sanitizeInput($_POST['sub3']);
			$grade3 = $all_purpose->sanitizeInput($_POST['grade3']);

			$sub4 = $all_purpose->sanitizeInput($_POST['sub4']);
			$grade4 = $all_purpose->sanitizeInput($_POST['grade_4']);

			$sub5 = $all_purpose->sanitizeInput($_POST['sub5']);
			$grade5 = $all_purpose->sanitizeInput($_POST['grade5']);

			$sub6 = $all_purpose->sanitizeInput($_POST['sub6']);
			$grade6 = $all_purpose->sanitizeInput($_POST['grade6']);

			$sub7 = $all_purpose->sanitizeInput($_POST['sub7']);
			$grade7 = $all_purpose->sanitizeInput($_POST['grade7']);

			$sub8 = $all_purpose->sanitizeInput($_POST['sub8']);
			$grade8 = $all_purpose->sanitizeInput($_POST['grade8']);

			$sub9 = $all_purpose->sanitizeInput($_POST['sub9']);
			$grade9 = $all_purpose->sanitizeInput($_POST['grade9']);
            $qua = $all_purpose->sanitizeInput($_POST['qua']);

            $admission_year = $all_purpose->sanitizeInput($_POST['admission_year']);
            $admission_status =1;
            if(empty($file_name)){
               
    			if((!empty($student->updateRegistrationStepOne($regNumber, $surname, $other_names, $date_birth, $state_origin, $phone_number, $student_email, $address, $dept_id, $prog_id, $procourse_id,$nationality, $sex, $marital_status, $kin_name, $kin_phone, $kid_address, $admission_status, $religion, $level_id)))AND (!empty($student->updateRegistrationStepTwo($regNumber, $school1, $from_date1, $to_date1, $degree1, $school2, $from_date2, $to_date2, $degree2, $school3, $from_date3, $to_date3, $degree3, $school4, $from_date4, $to_date4, $degree_4, $school5, $from_date5, $to_date5, $degree5, $sub1, $grade1, $sub2, $grade2, $sub3, $grade3, $sub4, $grade4, $sub5, $grade5, $sub6, $grade6, $sub7, $grade7, $sub8, $grade8, $sub9, $grade9, $qua)))AND (!empty($student->updateGrantAdmission($admission_id, $student_matric_num, $dept_id, $prog_id, $level_id, $admission_year, $school_id)))){
    				$_SESSION['success']= "You Have Updated $surname $other_names with Matric Number $student_matric_num Details Successfully";
        			$all_purpose->redirect("all-school-student-details.php");
    			}else{
    				$return = $_POST['return'];
    				$_SESSION['error'] = "Network Failure, Please try Again later";
    				$all_purpose->redirect($return);
        		}
            }else{
                
                $ext = $file_ext['extension'];
                $extensions= array("jpeg","jpg","png", "JPEG", "JPG", "PNG");
                $move= move_uploaded_file($file_tmp, $dir.$file_name);
                $ext = $file_ext['extension'];
                $extensions= array("jpeg","jpg","png", "JPEG", "JPG", "PNG");
                if(!(in_array($ext,$extensions))){
                    $return = $_POST['return'];
                    $_SESSION['error']="Image Extension not allowed, Please choose a JPEG or PNG file.";
                    $all_purpose->redirect("$return");  
                }
                if($file_size > 2097152){
                    $return = $_POST['return'];
                    $_SESSION['error'] = 'File size must be not greater than 2 MB';
                    $all_purpose->redirect("$return");  
                }else{
                    if((!empty($student->updateStepOnePlusPassport($file_name, $regNumber, $surname, $other_names, $date_birth, $state_origin, $phone_number, $student_email, $address, $dept_id, $prog_id, $procourse_id,$nationality, $sex, $marital_status, $kin_name, $kin_phone, $kid_address, $admission_status, $religion, $level_id)))AND 
                        (!empty($student->updateRegistrationStepTwo($regNumber, $school1, $from_date1, $to_date1, $degree1, $school2, $from_date2, $to_date2, $degree2, $school3, $from_date3, $to_date3, $degree3, $school4, $from_date4, $to_date4, $degree_4, $school5, $from_date5, $to_date5, $degree5, $sub1, $grade1, $sub2, $grade2, $sub3, $grade3, $sub4, $grade4, $sub5, $grade5, $sub6, $grade6, $sub7, $grade7, $sub8, $grade8, $sub9, $grade9)))AND
                        (!empty($student->updateGrantAdmission($admission_id, $student_matric_num, $dept_id, $prog_id, $level_id, $admission_year, $school_id)))){
                        $_SESSION['success'] = "You Have Updated The Student with The Matric Number $student_matric_num and Full Name $surname $other_names Details Successfully";
                        $all_purpose->redirect("all-school-student-details.php");

                    }else{
                        $return = $_POST['return'];
                        $_SESSION['error']="Unable to Register $surname $other_names at the Moment, Please try Again Later";
                        $all_purpose->redirect($return);
                    }
                }
            }
    	}else{
    		$return = $_POST['return'];
    		$all_purpose->redirect($return);
    	}

    }catch(PDOException $e){
    	$return = $_POST['return'];
    	$_SESSION['error'] = $e->getMessage();
    	$all_purpose->redirect($return);
    }