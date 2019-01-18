<?php
	session_start();
	require("../../connection/connection.php");
	require 'libs_dev/medical/medical-registration.php';
	include("../../mgchst-administrator/dev/general/all_purpose_class.php");
	include("../../inc/dev/admission/admission_class.php");
	
	try{
		$medical_registration = new studentMedicalRegistration($db);
		$admin = new studentAdmission($db);
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
			$school_id=3;
			$year = date("y");
			$session_id = $year;
	
			$lat = $db->prepare("SELECT * FROM last_matric WHERE school_id=:school_id AND session_id=:session_id ORDER BY last_id DESC LIMIT 0,1");
			$arrLa = array(':school_id'=>$school_id, ':session_id'=>$session_id);
		    $lat->execute($arrLa);
		    if($lat->rowCount()==0){
		    	$number = "00$ro"+$ro;
		    	$last = $number;
		    }else{
		    	$dope = $lat->fetch();
		    	$gov = $dope['last_matric'];
		    	$ro = $gov+1;;
				$number = "00$ro";
		    	$last = $number;
		    }
			
	    	$hospital_number = $number."/".$year;

			if($medical_registration->chekingMedicalRegStatus($student_matric_number)){
				$_SESSION['error'] = "Dear $student_name You Have Done Your Medical Registration Before <br>Please kindly Preview Your Details Below";
				$all_purpose->redirect("my-medical-details.php?student_matric_number=$student_matric_number");

			}else{
				if(($medical_registration->addMedicalRegistration($hospital_number, $student_matric_number, $genotype, $blood_group, $guid_name, $guid_relationship, $guid_phone, $guid_address))AND($admin->insertLastMatric($last, $school_id, $session_id))){
					$action ="Fill and Submitted The Student Medical Form";
					$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
					$_SESSION['success'] = "Dear $student_name You Have Completed Your Medical Registration Successfully <br> Please kindly Preview Your Details Below";
					$all_purpose->redirect("my-medical-details.php?student_matric_number=$student_matric_number");
				}else{
					$_SESSION['error'] = "Dear $student_name Your Medical Registration Could Not Be Processed at the moment, Please Try Again Later ";
					$all_purpose->redirect("medical-form.php");
				}
			}

		}else{
			$_SESSION['error'] = "Please Fill The Below Form To Complete Your Medical Registration";
			$all_purpose->redirect("medical-form.php");
		}

	
	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("medical-form.php");
	}
?>