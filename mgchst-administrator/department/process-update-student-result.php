<?php
	session_start();
	require("../../connection/connection.php");
    include("../dev/general/all_purpose_class.php");
   	include("../lecturer/classes/results/result-class.php");
    $all_purpose = new all_purpose($db);
    try{
    	$compute = new studentResult($db);
    	if(isset($_POST['update'])){
             $email = $_SESSION['user_name'];
    		$test_score = $all_purpose->sanitizeInput($_POST['test_score']);
    		$exam_score = $all_purpose->sanitizeInput($_POST['exam_score']);
    		$result_id = $_POST['result_id'];
    		$prev_test = $_POST['prev_test'];
    		$prev_exam = $_POST['prev_exam'];
    		$session_id = $_POST['session_id'];
    		$course_code = $_POST['course_code'];
    		$student_matric_num = $_POST['student_matric_num'];

    		if($test_score > 30){
    			$return = $_POST['return'];
				$_SESSION['error'] = "The Test score must not be greater than 30 marks";
				$all_purpose->redirect($return);
			}

			if($exam_score > 70){
				$return = $_POST['return'];
				$_SESSION['error'] = "The Exam score must not be greater than 70 marks";
				$all_purpose->redirect($return);
			}
    		if(!empty($compute-> updateStudentResults($result_id, $test_score, $exam_score))){
    			$action ="Changed $student_matric_num Test Score From $prev_test to $test_score And Exam Score From $prev_exam to $exam_score";
				$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
				$_SESSION['success'] = "You Have Changed $student_matric_num Test Score From $prev_test to $test_score And Exam Score From $prev_exam to $exam_score Successfully";
				$all_purpose->redirect("student-results.php?course_code=$course_code&&session_identification=$session_id");
    		}else{
    			$_SESSION['error'] = "Unable to Update the Student Result at The Momnet, Please Try again Later";
    			$return = $_POST['return'];
				$all_purpose->redirect($return);
    		}
    	}else{
    		$return = $_POST['return'];
			$_SESSION['error'] = "Please Update The Student Result";
			$all_purpose->redirect($return);
    	}
    }catch(PDOException $e){
    	$return = $_POST['return'];
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect($return);
	}
