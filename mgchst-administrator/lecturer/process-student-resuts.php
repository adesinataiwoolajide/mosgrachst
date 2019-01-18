<?php
	session_start();
	require("../../connection/connection.php");
    include("../dev/general/all_purpose_class.php");
   	include("classes/results/result-class.php");
    $all_purpose = new all_purpose($db);
    try{
    	$compute = new studentResult($db);
    	
		if($_POST){
			
			$y = $_POST["show"];
			$email = $_SESSION['user_name'];
			
			for($i = 1; $i <= $y; $i++){
				$student_matric_num = $_POST["student_matric_num$i"];
				$test_score=$_POST["test_score$i"];
				$exam_score = $_POST["exam_score$i"];
				$confirm = $_POST["confirm$i"];
				$course_code = $_POST['course_code'];
				$session_id = $_POST['session_id'];
				$level_id  = $_POST["level_id$i"];
				$dept_id = $_POST["dept_id$i"];
				$prog_id = $_POST["prog_id$i"];
				$total = $test_score+$exam_score;

				if($test_score > 30){
					$_SESSION['error'] = "The Test score must not be greater than 30 marks";
					$all_purpose->redirect("compute-students-results.php?course_code=$course_code&&session_identification=$session_id");
				}

				if($exam_score > 70){
					$_SESSION['error'] = "The Exam score must not be greater than 70 marks";
					$all_purpose->redirect("compute-students-results.php?course_code=$course_code&&session_identification=$session_id");
				}
	    		
				if($confirm ==1){

					$select = $db->prepare("SELECT * FROM student_result WHERE student_matric_num=:student_matric_num AND course_code=:course_code AND session_id=:session_id");
					$arr = array(':student_matric_num'=>$student_matric_num, ':course_code'=>$course_code, ':session_id'=>$session_id);
					$select->execute($arr);
					if($select->rowCount() >0){
						$_SESSION['error'] = "You Have Computed $student_matric_num For $session_id Academic Session Before";
						$all_purpose->redirect("student-results.php?course_code=$course_code&&session_identification=$session_id");
					}else{
						$insert=$db->prepare("INSERT INTO student_result(student_matric_num, course_code, test_score, exam_score, level_id, prog_id, dept_id, session_id)VALUES(:student_matric_num, :course_code, :test_score, :exam_score, :level_id, :prog_id, :dept_id, :session_id)");
						$arrIns = array(':student_matric_num'=>$student_matric_num, ':course_code'=>$course_code, ':test_score'=>$test_score, ':exam_score'=>$exam_score, ':level_id'=>$level_id, ':prog_id'=>$prog_id, ':dept_id'=>$dept_id, ':session_id'=>$session_id);

						if(!empty($insert->execute($arrIns))){
							$action ="Computed $student_matric_num Result for $course_code";
							$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
						}else{
							$_SESSION['error'] = "Unable to Computed The Students Results for $course_code at the Moment, Please try again later";
							$all_purpose->redirect("compute-students-results.php?course_code=$course_code&&session_identification=$session_id");
						}
					}
				}
			}
			$_SESSION['success'] = "You have Computed The Students Results for $course_code For $session_id Academic Session Successfully";
			$all_purpose->redirect("student-results.php?course_code=$course_code&&session_identification=$session_id");
		}
	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("compute-students-results.php?course_code=$course_code&&session_identification=$session_id");
	}
