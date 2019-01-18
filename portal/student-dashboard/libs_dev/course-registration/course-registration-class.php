<?php
	
	class studentCourseRegistration {
		
		private $db;
		function __construct($db){
			$this->db=$db;
		}

		public function checkExistenceCourseReg($session_id, $student_matric_num){
			try{
				$check = $this->db->prepare("SELECT * FROM course_registration WHERE student_matric_num=:student_matric_num AND session_id=:session_id");
				$arrCheck = array(':student_matric_num'=>$student_matric_num, ':session_id'=>$session_id);
				$check->execute($arrCheck);
				if($check->rowCount()> 0){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function getMyCourseList($student_matric_num, $session_id){
			try {
				$myList = $this->db->prepare("SELECT * FROM course_registration WHERE student_matric_num=:student_matric_num AND session_id=:session_id");
				$arrList = array(':student_matric_num'=>$student_matric_num, ':session_id'=>$session_id);
				$myList->execute($arrList);
				$hen = $myList->fetch();
				return $hen;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function checkDoubleCourse($student_matric_num, $course_code, $session_id){
			try{
				$exist = $this->db->prepare("SELECT * FROM course_registration WHERE student_matric_num=:student_matric_num AND course_code=:course_code AND session_id=:session_id");
				$arrExist = array(':course_code'=>$course_code, ':student_matric_num'=>$student_matric_num, ':session_id'=>$session_id);
				$exist->execute($arrExist);
				if($exist->rowCount()>0){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function insertStudentReg($student_matric_num, $session_id, $course_code, $level_id, $prog_id, $dept_id){
			try {
				$addReg= $this->db->prepare("INSERT INTO course_registration(student_matric_num,session_id,course_code, level_id,prog_id,dept_id)VALUES(:student_matric_num,:session_id,:course_code,:level_id,:prog_id,:dept_id)");
						$arrAddReg=array(':student_matric_num'=>$student_matric_num, ':session_id'=>$session_id, ':course_code'=>$course_code, ':level_id'=>$level_id, ':prog_id'=>$prog_id, ':dept_id'=>$dept_id);
						if(!empty($addReg->execute($arrAddReg))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function deleteCourseRegistered($student_matric_num, $registration_id){
			try {
				$deleteCourse = $this->db->prepare("DELETE FROM course_registration WHERE registration_id=:registration_id AND student_matric_num=:student_matric_num");
				$arrDel = array(':registration_id'=>$registration_id, ':student_matric_num'=>$student_matric_num);
				if(!empty($deleteCourse->execute($arrDel))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}

		}

		public function searchCourse($uppers, $tansform){
			try {
				$select = $this->db->prepare("SELECT * FROM school_course WHERE course_code=:tansform OR course_code=:uppers OR course_title=:uppers OR course_title=:tansform");
                $arr = array(':tansform'=>$tansform, ':uppers'=>$uppers);
                $select->execute($arr);
                if($select->rowCount()==0){
                    return true;
                }else{ 
                	return false;
                }
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function useRegistrationID($registration_id){
			try{
				$regal = $this->db->prepare("SELECT * FROM course_registration WHERE registration_id=:registration_id");
				$arrRegal = array(':registration_id'=>$registration_id);
				$regal->execute($arrRegal);
				$tena =$regal->fetch();
				return $tena;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		
		
	}
?>