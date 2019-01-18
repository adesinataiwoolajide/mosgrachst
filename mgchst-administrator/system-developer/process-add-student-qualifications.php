<?php 
    session_start();
    require("../../connection/connection.php");
    require("../super-admin/libs_dev/students-registration/students-registration.php");
    include("../dev/general/all_purpose_class.php");
    
    try{
        $student = new oldStudentRegistration($db);
        $all_purpose = new all_purpose($db);
    	
    	if(isset($_POST['continue_adding_details'])){
            $email = $_SESSION['user_name'];
    		$regNumber = $_POST['regNumber'];
            $school_name = $_POST['school_name'];
            $school_id = $_POST['school_id'];

            $student_matric_num = $_GET['student_matric_num'];
    		$details = $student->getAdmissionStepOne($regNumber);
    		$surname =$details['surname'];
    		$other_names = $details['other_names'];
    		$student_email = $details['student_email'];

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

            if($student->continueRegistration($regNumber)){
                $_SESSION['success'] = "You Have Registered This Student Details Before";
                $all_purpose->redirect("preview-student-details.php?reg_number=$regNumber&&school_name=$school_name&&school_identification=$school_id");
            }else{

    			if($student->addRegistrationStepTwo($regNumber, $school1, $from_date1, $to_date1, $degree1, $school2, $from_date2, $to_date2, $degree2, $school3, $from_date3, $to_date3, $degree3, $school4, $from_date4, $to_date4, $degree_4, $school5, $from_date5, $to_date5, $degree5, $sub1, $grade1, $sub2, $grade2, $sub3, $grade3, $sub4, $grade4, $sub5, $grade5, $sub6, $grade6, $sub7, $grade7, $sub8, $grade8, $sub9, $grade9, $qua)){
                    $action ="Added $regNumber Qualification Details";
                $his = $all_purpose->getUserDetailsandAddActivity($email, $action);
    				$_SESSION['success']="Please Preview The Student Details Before the Final Submission";
    				$all_purpose->redirect("preview-student-details.php?reg_number=$regNumber&&school_name=$school_name&&school_identification=$school_id");
    			}else{
    				$return = $_POST['return_url'];
    				$_SESSION['error']="The Registration could not be completed at the moment, Please try Again Later";
    				$all_purpose->redirect($return);
    			}
            }
    	}else{
    		$return = $_POST['return_url'];
    		$_SESSION['error'] = "Network Failure Please try Again Later";
    		$all_purpose->redirect($return);
    	}
    }catch(PDOException $e){
    	$return = $_POST['return_url'];
    	$_SESSION['error'] = $e->getMessage();
    	$all_purpose->redirect($return);
    }