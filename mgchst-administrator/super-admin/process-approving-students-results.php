<?php
	
    session_start();
    require '../../connection/connection.php';
    include("../dev/general/all_purpose_class.php");
    $all_purpose = new all_purpose($db);
	try{
		if($_POST){
			$y = $_POST["show"];
			$email = $_SESSION['user_name'];
			for($i = 1; $i <= $y; $i++){
				$result_id = $_POST["result_id$i"];
				$student_matric_num = $_POST["student_matric_num$i"];
				$course_code = $_POST["course_code$i"];
				$session_id = $_POST['session_id'];
				$grant = $_POST["approve_result$i"];
				if($grant ==1){
					$approve = $db->prepare("UPDATE student_result SET senate_approval=1 WHERE result_id=:result_id");
					$arrApp = array(':result_id'=>$result_id);

					if($approve->execute($arrApp)){
						$action ="Approved $course_code For $student_matric_num In $session_id Academic Session";
						$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
					}else{
						$_SESSION['error'] = "Unable to Approved The Students Results For $session_id at the Moment, Please try again later";
						$session_id = $_POST["session_id$i"];
						$all_purpose->redirect("approved-students-results.php?academic_session=$session_id");
					}
				}
			}
			$_SESSION['success'] = "You Have Approved The Students Results For $session_id Academic Session Successfully";
			$all_purpose->redirect("approved-students-results.php?academic_session=$session_id");
		}
    }catch(PDOException $e){
    	$_SESSION['error'] = $e->getMessage();
    	$all_purpose->redirect("approved-students-results.php?academic_session=$session_id");
    }
?>
