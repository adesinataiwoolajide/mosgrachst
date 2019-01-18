<?php
	session_start();
	require("../../connection/connection.php");
    include("../dev/general/all_purpose_class.php");
   	include("../lecturer/classes/results/result-class.php");
    $all_purpose = new all_purpose($db);
    try{
    	$compute = new studentResult($db);
    	if(isset($_GET['result_identification'])){
            $email = $_SESSION['user_name'];
            $result_id = $_GET['result_identification'];
            $course_code = $_GET['course_code'];
            $session_id = $_GET['session_identification'];
            $student_matric_num = $_GET['student_matric_num'];
            $del = $db->prepare("DELETE FROM student_result WHERE result_id=:result_id");
            $arrDel = array(':result_id'=>$result_id);
            if(!empty($del->execute($arrDel))){
                $action =" Deleted The $student_result Result For $course_code In $session_id Academic Session";
                $his = $all_purpose->getUserDetailsandAddActivity($email, $action);
                $_SESSION['success'] = "You Have Deleted The $student_result Result For $course_code In $session_id Academic Session Successfully";
                $all_purpose->redirect("student-results.php?course_code=$course_code&&session_identification=$session_id");
            }else{
                $return = $_POST['return'];
                $_SESSION['error'] = "Unable To Delete The $student_result Result For $course_code In $session_id Academic Session, Please Try Again Later";
                $all_purpose->redirect($return);
            }
    		
    	}else{
    		$return = $_POST['return'];
			$_SESSION['error'] = "Please Click on Delete, To Delete The Student Result";
			$all_purpose->redirect($return);
    	}
    }catch(PDOException $e){
    	$return = $_POST['return'];
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect($return);
	}
