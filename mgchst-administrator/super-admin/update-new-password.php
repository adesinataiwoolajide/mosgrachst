<?php
	session_start();
    require("../../connection/connection.php");
    include("../dev/general/all_purpose_class.php");
    
    try{
        $all_purpose = new all_purpose($db);
		if($_POST){
			$y = $_POST["show"];
			$email = $_SESSION['user_name'];
			
			for($i = 1; $i <= $y; $i++){
				echo $grant = $_POST["update$i"];
				$student_id = $_POST["student_id$i"];
				echo $student_matric_num = $_POST["student_matric_num$i"];
				$password = sha1($student_matric_num);
				if($grant ==1){
					
					$upLogin= $db->prepare("UPDATE student_login SET password=:password WHERE student_id=:student_id");
					$arrLogin = array(':password'=>$password, ':student_id'=>$student_id);
					if(!empty($upLogin->execute($arrLogin))){
		            	$action =" Updated $student_matric_num Password";
                		$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
		            }else{
		            	$_SESSION['error'] = "Updating Failed";
		            	$all_purpose->redirect("test-matric.php");
		            }
				}
			}
			$_SESSION['success'] = "Students Password Changed Successfully";
			//$all_purpose->redirect("test-matric.php");
		}
	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("test-matric.php");
	}
