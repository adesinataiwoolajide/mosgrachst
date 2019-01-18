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
				$student_matric_num = $_POST["student_matric_number$i"];
				$session_id = $_POST['session_id'];
				$grant = $_POST["approve_result$i"];
				if($grant ==1){
					$approve = $db->prepare("UPDATE student_result SET bursary_approval=1 WHERE student_matric_num=:student_matric_num AND session_id=:session_id");
					$arrApp = array(':student_matric_num'=>$student_matric_num, ':session_id'=>$session_id);

					if($approve->execute($arrApp)){
						$action ="Approved Students In $session_id Academic Session";
						$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
					}else{
						$return = $_POST['return'];
						$_SESSION['error'] = "Unable to Approved The Students Results For $session_id at the Moment, Please try again later";
						$session_id = $_POST["session_id$i"];
						$all_purpose->redirect("return");
					}
				}
			}
			$_SESSION['success'] = "You Have Approved The Students Results For $session_id Academic Session Successfully";
			$all_purpose->redirect("bursery-approved-result.php");
		}
    }catch(PDOException $e){
    	$return = $_POST['return'];
    	$_SESSION['error'] = $e->getMessage();
    	$all_purpose->redirect("return");
    }
?>
