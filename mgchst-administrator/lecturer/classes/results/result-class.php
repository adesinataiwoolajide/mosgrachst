<?php
	
	class studentResult {
		private $db;
		function __construct($db){
			$this->db=$db;
		}

		public function getResultId($student_matric_num, $result_id){
			try {
				$detail = $this->db->prepare("SELECT * FROM student_result WHERE student_matric_num=:student_matric_num AND result_id=:result_id");
				$ars = array(':student_matric_num'=>$student_matric_num, ':result_id'=>$result_id); 
		        $detail->execute($ars); 
		        $depo = $detail->fetch();
		        return $depo;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function updateStudentResults($result_id, $test_score, $exam_score){
			try{
				$update = $this->db->prepare("UPDATE student_result SET test_score=:test_score, exam_score=:exam_score WHERE result_id=:result_id");
				$arrUp = array(':test_score'=>$test_score, ':exam_score'=>$exam_score, ':result_id'=>$result_id);
				if(!empty($update->execute($arrUp))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function generate_remark($score){
			if($score <= 0.9){
				echo "Fail";
			}else if(($score >= 1.0) && ($score <= 1.6)){
				echo "Pass";
			}else if(($score >= 1.7) && ($score <= 2.5)){
				echo "Third Class";
			}else if(($score >= 2.6) && ($score <= 4.5)){
				echo "Second Class Lower";
			}else if(($score >= 4.6) && ($score <= 5.9)){
				echo "Second Class Upper";
			}elseif($score >= 6.0){
				echo "First Class";
			}
		}

		public function generateGrade($score){
			$new= "";
			if($score <= 39){
				echo $new = "0";
			}else if(($score >= 40) && ($score <= 44)){
				echo $new = "1";
			}else if(($score >= 45) && ($score <= 49)){
				echo $new= "2";
			}else if(($score >= 50) && ($score <= 59)){
				echo$new ="3";
			}else if(($score >= 60) && ($score <= 69)){
				echo $new="4";
			
			}else if($score >= 70){
				echo $new= "5";
			}
		}

		public function generateRemarking($score){
			$new= "";
			if($score <= 39){
				echo $new = "F";
			}else if(($score >= 40) && ($score <= 44)){
				echo $new = "E";
			}else if(($score >= 45) && ($score <= 49)){
				echo $new= "D";
			}else if(($score >= 50) && ($score <= 59)){
				echo$new ="C";
			}else if(($score >= 60) && ($score <= 69)){
				echo $new="B";
			
			}else if($score >= 70){
				echo $new= "A";
			}
		}

		public function checkingResultExist($dept_id, $course_code, $session_id, $prog_id)
		{
			try{
				$bring = $this->db->prepare("SELECT * FROM student_result WHERE dept_id=:dept_id AND course_code=:course_code AND session_id=:session_id AND prog_id=:prog_id");
				$arrBring = array(':dept_id'=>$dept_id, ':course_code'=>$course_code, ':session_id'=>$session_id, ':prog_id'=>$prog_id);
				$bring->execute($arrBring);
				if($bring->rowCount()==0){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function bringCourseResult($dept_id, $course_code, $session_id, $prog_id)
		{
			try{
				$bringing = $this->db->prepare("SELECT * FROM student_result WHERE dept_id=:dept_id AND course_code=:course_code, session_id=:session_id AND prog_id=:prog_id");
				$arrBringing = array(':dept_id'=>$dept_id, ':course_code'=>$course_code, ':session_id'=>$session_id, ':prog_id'=>$prog_id);
				$bringing->execute($arrBringing);
				$see_bring = $bringing->fetch();
				return $see_bring;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}
	}
?>