<?php 

	session_start();
	require("../../connection/connection.php");
    include("libs_dev/staffs/staff_class.php");
    require("../dev/registration/class_registration.php");
    include("../dev/general/all_purpose_class.php");
    
    try{
		$staff_details = new schoolStaffs($db);
    	$register = new registration($db);
    	$all_purpose = new all_purpose($db);
    	if(isset($_POST['update_details'])){
	    	$dir = "../staffimages/";
		    $file_name = $_FILES['image']['name'];
		    $file_size =$_FILES['image']['size'];
		    $file_tmp =$_FILES['image']['tmp_name'];
		    $file_type=$_FILES['image']['type'];
		    $file_ext = pathinfo($file_name);
		    
		    $move= move_uploaded_file($file_tmp, $dir.$file_name);
		    
		    $email = $_SESSION['user_name'];
		    $staff_name = $all_purpose->sanitizeInput($_POST['name']);
    		$staff_email = $all_purpose->sanitizeInput($_POST['staff_email']);
    		$staff_phone = $all_purpose->sanitizeInput($_POST['phone']);
    		$staff_sex = $all_purpose->sanitizeInput($_POST['sex']);
    		$religion = $all_purpose->sanitizeInput($_POST['religion']);
    		$staff_type = $all_purpose->sanitizeInput($_POST['type']);
    		$address = $all_purpose->sanitizeInput($_POST['address']);
    		$birth_date = $all_purpose->sanitizeInput($_POST['birth_date']);
    		$marital_status = $all_purpose->sanitizeInput($_POST['marital_status']);
    		$dept_id =$all_purpose->sanitizeInput($_POST['dept_id']); 
	    	$qualification_id = implode(",", $_POST['qualification_id']);

	    		

    		$pass_id = $_POST['pass_id'];
    		$user_id = $_POST['user_id'];
    		$staff_number = $_POST['staff_number'];

    		$access = $staff_type;
    		$full_name = $staff_name;
    		$password = sha1($staff_email);
    		$eemail = $staff_email;

     		if(empty($file_name)){
				if($staff_details->updateStaffDetails($staff_number, $staff_name, $staff_email, $staff_phone, $staff_sex, $religion, $staff_type, $address, $birth_date, $marital_status, $dept_id, 
					$qualification_id) AND ($register->updateUserdetailsWithoutPic($user_id, $full_name, $staff_email, $password, $access) AND($register->updatingWithoutUserPassport($staff_email, $pass_id)))){

					$action ="Updated $staff_number Details ";
					$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
					$_SESSION['success'] = "You Have Updated $staff_number Details Successfully";
					$all_purpose->redirect("staff_details.php?staff_number=$staff_number&&staff_email=$staff_email");
				}else{
					$_SESSION['error'] = "Network Failure, Error in Updating $staff_number at the moment Please try Again Later";
					$all_purpose->redirect("$return");
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
					
					if($staff_details->updateStaffDetails($staff_number, $staff_name, $staff_email, $staff_phone, $staff_sex, $religion, $staff_type, $address, $birth_date, $marital_status, $dept_id, $qualification_id) AND ($register->updateUserdetailsWithoutPic($user_id, $full_name, $staff_email, $password, $access)AND($staff_details->updatePassort($pass_id, $staff_email, $file_name)))){

						$action ="Updated $staff_number Details and Image ";
						$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
						$_SESSION['success'] = "You Have Updated $staff_number Details and changed The Staff Passport Successfully";
						$all_purpose->redirect("staff_details.php?staff_number=$staff_number&&staff_email=$staff_email");

					}else{
						$all_purpose->redirect("$return");
						$_SESSION['error'] = "Error in Updating $staff_number at the moment Please try Again Later";
						$all_purpose->redirect("$return");
					}

				}
			}
    		

		}else{
			$return = $_POST['return'];
			$all_purpose->redirect("$return");
		}
	}catch(PDOException $e){
		$all_purpose->redirect("$return");
    	$_SESSION['error'] = $e->getMessage();
    	$all_purpose->redirect("$return");
    }
?>