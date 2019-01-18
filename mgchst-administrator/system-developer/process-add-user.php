<?php
	session_start();
	require("../../connection/connection.php");
	require("../dev/registration/class_registration.php");
	require("../dev/general/all_purpose_class.php");
	try{
		$register = new registration($db);
		$all_purpose = new all_purpose($db);

		$dir = "../staffimages/";
	   	$errors= array();
	    $file_name = $_FILES['image']['name'];
	    $file_size =$_FILES['image']['size'];
	    $file_tmp =$_FILES['image']['tmp_name'];
	    $file_type=$_FILES['image']['type'];
	    $file_ext = pathinfo($file_name);
	    $ext = $file_ext['extension'];
	    $extensions= array("jpeg","jpg","png", "JPEG", "JPG", "PNG");
	    
	    if(!(in_array($ext,$extensions))){
	    	$_SESSION['error'] = " Image Extension not allowed, Please choose a JPEG or PNG file.";
	        $all_purpose->redirect("add-user.php");
     	}
		if($file_size > 2097152){
          	$_SESSION['error'] = 'File size must be excately 2 MB';
          	$all_purpose->redirect("add-user.php");
    	}else{
        
	        $move= move_uploaded_file($file_tmp, $dir.$file_name);
			if(isset($_POST['adding-user']) AND ($move)){
				$email = $_SESSION['user_name'];
				$full_name = $all_purpose->sanitizeInput($_POST['full_name']);
				$eemail = $all_purpose->sanitizeInput($_POST['staff_email']);
				$password = sha1($_POST['password']);
				$repeat = sha1($_POST['repeat']);
				$access = $all_purpose->sanitizeInput($_POST['access']);
				
				if($password != $repeat){
					$_SESSION['error'] = "Ooops! Password does not match";
					$all_purpose->redirect("add-user.php");
				}
				$check = $db->prepare("SELECT * FROM admin_login WHERE user_name=:eemail");
				$arr = array(':eemail'=>$eemail);
				$check->execute($arr);
				if($check->rowCount()> 0){
					$_SESSION['error'] = $eemail." ". "Is Already in Use by Another User, Please Register The User With Another E-Mail";
					$all_purpose->redirect("add-user.php");
				}elseif($register->checkDoublePassport($file_name)){
					$_SESSION['error'] = "This Passport is Already in Use by another user, Please Use Another Passport for the User";
					$all_purpose->redirect("add-user.php");
				}else{
					if((!empty($register->userRegistration($full_name, $eemail, $password, $access))) AND (!empty($register->addingUserPassport($eemail, $file_name)))){
						$action = "$email registered $eemail account";
						$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
						$_SESSION['success'] = "You Have Added $eemail user details to the user list successfully";
						$all_purpose->redirect("view-all-users.php");	
					}else{
						$_SESSION['success'] = "Unable to add $full_name details at the Moment, Please try Again Later";
						$all_purpose->redirect("add-user.php");
					}
				}
			}else{
				$_SESSION['error'] = "Error in uploading image";
				$all_purpose->redirect("add-user.php");
			}
		}
	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("add-user.php");
	}

?>