<?php 

	session_start();
	require("../../connection/connection.php");
    require("../dev/registration/class_registration.php");
	require("../dev/general/all_purpose_class.php");
	try{
		$register = new registration($db);
		$all_purpose = new all_purpose($db);
    	if(isset($_POST['update_details'])){
	    	$dir = "../staffimages/";
		    $file_name = $_FILES['image']['name'];
		    $file_size =$_FILES['image']['size'];
		    $file_tmp =$_FILES['image']['tmp_name'];
		    $file_type=$_FILES['image']['type'];
		    $file_ext = pathinfo($file_name);
		    $ext = $file_ext['extension'];
			$extensions= array("jpeg","jpg","png", "JPEG", "JPG", "PNG");
		    
		    $email = $_SESSION['user_name'];
			$full_name = $all_purpose->sanitizeInput($_POST['full_name']);
			$eemail = $all_purpose->sanitizeInput($_POST['staff_email']);
			$staff_email = $eemail;
			$password = sha1($_POST['password']);
			$access = $all_purpose->sanitizeInput($_POST['access']);
    		$pass_id = $_POST['pass_id'];
    		$user_id = $_POST['user_id'];
    		
    		$return = $_POST['return'];
    		$move= move_uploaded_file($file_tmp, $dir.$file_name);
     		if(empty($file_name)){
				if($register->updateUserdetailsWithoutPic($user_id, $full_name, $staff_email, $password, $access) AND($register->updatingWithoutUserPassport($staff_email, $pass_id))){

					$action ="Updated $staff_email Details ";
					$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
					$_SESSION['success'] = "You Have Updated $staff_email Details Successfully";
					$all_purpose->redirect("view-all-users.php");
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
					
					if($register->updateUserdetailsWithoutPic($user_id, $full_name, $staff_email, $password, $access) AND($register->updatingUserPassport($staff_email, $file_name, $pass_id))){
						$action ="Updated $staff_number Details and Image ";
						$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
						$_SESSION['success'] = "You Have Updated $eemail Details and changed The User Passport Successfully";
						$all_purpose->redirect("view-all-users.php");

					}else{
						$_SESSION['error'] = "Error in Updating $eemail Details at the moment Please try Again Later";
						$all_purpose->redirect("$return");
					}

				}
			}
    		

		}else{
			$all_purpose->redirect("$return");
		}
	}catch(PDOException $e){
    	$_SESSION['error'] = $e->getMessage();
    	$all_purpose->redirect("$return");
    }
?>