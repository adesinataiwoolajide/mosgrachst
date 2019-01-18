<?php 
	session_start();
	require("../../connection/connection.php");
    include("../../mgchst-administrator/super-admin/libs_dev/students-registration/students-registration.php");
    include("../../mgchst-administrator/dev/general/all_purpose_class.php");
    include("../../inc/dev/admission/admission_class.php");
    
    try{
    	$all_purpose = new all_purpose($db);
        $registration = new oldStudentRegistration($db);
        $admission = new studentAdmission($db);
        if(isset($_POST['admission-status'])){
            $regNumber = $all_purpose->sanitizeInput($_POST['registration']);
            if($registration->checkRegistrationNumber($regNumber)){
                $_SESSION['error'] = "Oooops!!! This Registration Number $regNumber Does Not Exist";
                $all_purpose->redirect("check-admission-status.php");
            }else{
                $see = $registration->getAdmissionStepOne($regNumber);
                $admission_status = $see['admission_status'];
                if($admission_status ==1){
                    $folp = $admission->getMatricNumber($regNumber);
                    $school_id = $folp['school_id'];
                    $dept_name = $folp['dept_name'];
                    if($school_id ==1){
                        $school_name = "Moses & Grace College of Health Sciences And Technology";
                    }else{
                        $school_name = "Afriford University";
                    }
                    $surname = $see['surname'];
                    $other_names = $see['other_names'];
                    $student_name = $surname." ".$other_names;
                    $programe = $see['prog_id'];
                    $_SESSION['success'] = "You Have Been Admitted Into $school_name Successfully, Please Print Your Admission Letter Below";
                    $all_purpose->redirect("print-admission-letter.php?registration_number=$regNumber&&student_name=$student_name&&school_name=$school_name&&school_identification=$school_id&&programme=$programe");
                }else{
                    $_SESSION['error'] = "Sorry You Have Not Been Admitted";
                    $all_purpose->redirect("check-admission-status.php");
                }
            }
        }else{
            $_SESSION['error'] = "Please Enter Your Registration Number";
            $all_purpose->redirect("check-admission-status.php");
        }

        
    }catch(PDOException $e){
    	$_SESSION['error'] = $e->getMessage();
    	$all_purpose->redirect("check-admission-status.php");
    }

?>