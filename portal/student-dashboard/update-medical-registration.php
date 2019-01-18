<?php
	session_start();
	require("../../connection/connection.php");
	require 'libs_dev/medical/medical-registration.php';
	include("../../mgchst-administrator/dev/general/all_purpose_class.php");
	
	try{
		$medical_registration = new studentMedicalRegistration($db);
		$all_purpose = new all_purpose($db);
		if(isset($_POST['medical_reg'])){
			$student_name = $_POST['student_name'];
			$student_matric_number = $_POST['student_matric_num'];
			$email = $student_matric_number;
			$genotype = $all_purpose->sanitizeInput($_POST['genotype']);
			$blood_group = $all_purpose->sanitizeInput($_POST['blood_group']);
			$guid_name = $all_purpose->sanitizeInput($_POST['guid_name']);
			$guid_relationship = $all_purpose->sanitizeInput($_POST['guid_relationship']);
			$guid_phone = $all_purpose->sanitizeInput($_POST['guid_phone']);
			$guid_address = $all_purpose->sanitizeInput($_POST['guid_address']);

			
			if($medical_registration->updatingStudentMedical($student_matric_number, $genotype, $blood_group, $guid_name, $guid_relationship, $guid_phone, $guid_address)){
				$action ="Updated His Medical Details";
				$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
				$_SESSION['success'] = "Dear $student_name You Have Updated Your Medical Details  Successfully <br> Please kindly Preview Your Details Below";
				$all_purpose->redirect("my-medical-details.php?student_matric_number=$student_matric_number");
			}else{
				$_SESSION['error'] = "Dear $student_name Your Medical Details Could Not Be Updated at the moment, Please Try Again Later ";
				$all_purpose->redirect("edit-my-medical-details.php?student_matric_number=$student_matric_number");
			}
		

		}else{
			$_SESSION['error'] = "Please Fill The Below Form To Update Your Medical Details";
			$all_purpose->redirect("edit-my-medical-details.php?student_matric_number=$student_matric_number");
		}

	
	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("edit-my-medical-details.php?student_matric_number=$student_matric_number");
	}
?>