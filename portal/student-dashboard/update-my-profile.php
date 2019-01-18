<?php 
	session_start();
	require("../../connection/connection.php");
    include("../../inc/dev/admission/admission_class.php");
    include("../../mgchst-administrator/dev/general/all_purpose_class.php");
    require("../../mgchst-administrator/super-admin/libs_dev/students-registration/students-registration.php");
    $all_purpose = new all_purpose($db);
    $students = new oldStudentRegistration($db);
    try{


    	if(isset($_POST['update-details'])){
            $dir = "../application-form/studentadmissionimages/";
            $file_name = $_FILES['image']['name'];
            $file_size =$_FILES['image']['size'];
            $file_tmp =$_FILES['image']['tmp_name'];
            $file_type=$_FILES['image']['type'];
            $file_ext = pathinfo($file_name);
            
            $move= move_uploaded_file($file_tmp, $dir.$file_name);
    		$student_matric_num = $_SESSION['user_name'];
    		$email = $student_matric_num;
    		$regNumber = $_POST['regNumber'];
    		$surname = $all_purpose->sanitizeInput($_POST['surname']);
            $other_names = $all_purpose->sanitizeInput($_POST['other_names']);
            $date_birth = $all_purpose->sanitizeInput($_POST['birth_date']);
            $nationality = $all_purpose->sanitizeInput($_POST['nationality']);
            $state_origin = $all_purpose->sanitizeInput($_POST['state']);
            $phone_number = $all_purpose->sanitizeInput($_POST['phone_number']);
            $address = $all_purpose->sanitizeInput($_POST['address']);
            $sex = $all_purpose->sanitizeInput($_POST['sex']);
            $religion = $all_purpose->sanitizeInput($_POST['religion']);
            $marital_status = $all_purpose->sanitizeInput($_POST['marital_status']);
            $kin_name = $all_purpose->sanitizeInput($_POST['kin_name']);
            $kin_phone = $all_purpose->sanitizeInput($_POST['kin_phone']);
            $kid_address = $all_purpose->sanitizeInput($_POST['kid_address']);
            $studdent_email = $all_purpose->sanitizeInput($_POST['student_email']);
            $admission_status =1;
            if(empty($file_name)){

                if(!empty($students->updateStudentRegistrationStepOne($regNumber, $surname, $other_names, $date_birth, $state_origin, $phone_number, $studdent_email, $address, $nationality, $sex, $marital_status, $kin_name, $kin_phone, $kid_address, $admission_status, $religion))){
                	$action = "Updated Your Details";
                	$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
                	$_SESSION['success'] = "You Have Updated Your Details Successfully";
                	$all_purpose->redirect("my-profile.php?student_identification=$regNumber");
    			}else{
    				$return = $_POST['return'];
    				$_SESSION['error'] = "Unable to Update Your Details at the Moment, Please try Again later";
    				$all_purpose->redirect($return);
        		}
            }else{
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
                    if($students->updateStudentRegistrationStepOneWithPass($file_name,$regNumber, $surname, $other_names, $date_birth, $state_origin, $phone_number, $address, $nationality, $sex, $marital_status, $kin_name, $kin_phone, $kid_address, $admission_status, $religion)){
                        $action = "Changed Your Passport And Updated Your Details";
                        $his = $all_purpose->getUserDetailsandAddActivity($email, $action);
                        $_SESSION['success'] = "You Have Updated Your Details And Changed Your Passport Successfully";
                        $all_purpose->redirect("my-profile.php?student_identification=$regNumber");
                    }else{
                        $all_purpose->redirect("$return");
                        $_SESSION['error'] = "Error in Updating Your Passport at the moment Please try Again Later";
                        $all_purpose->redirect("$return");
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