<?php
	session_start();
	require("../../connection/connection.php");
    include("../dev/general/all_purpose_class.php");
    include("../../inc/dev/admission/admission_class.php");
    $admin = new studentAdmission($db);
    $all_purpose = new all_purpose($db);
    try{
    	
		if($_POST){
			$y = $_POST["show"];
			$email = $_SESSION['user_name'];
			
			for($i = 1; $i <= $y; $i++){
				$cancel = $_POST["cancel$i"];
				if($cancel ==1){
					$regNumber = $_POST["regNumber$i"];
					$dope = $admin->getMatricNumber($regNumber);
					$dept_id = $_POST["dept_id$i"];
					$prog_id = $_POST["prog_id$i"];
					$level = $_POST["level$i"];
					$student_matric_num = $dope['student_matric_num'];
					if(!empty($admin->deleteAdmission($regNumber)) AND (!empty($admin->cancelAdmission($regNumber)) AND(!empty($admin->deleteStudentLogin($student_matric_num))))){

						$action ="Pend $student_matric_num";
						$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
					}else{
						$_SESSION['error'] = "Unable to Admit the Selected Students at the Moment, Please try again later";
						$all_purpose->redirect("cancel-admission.php");
					}
				}
			}
			$_SESSION['success'] = "Students Admission Cancelled Successfully";
			$all_purpose->redirect("cancel-admission.php");
		}
	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("cancel-admission.php");
	}
	
	?>