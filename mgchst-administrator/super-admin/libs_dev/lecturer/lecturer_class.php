<?php
	class allocateNewDeptCourse{
		private $db;
		function __construct($db){
			$this->db=$db;
		}

		public function checkExistenceCourse($dept_course_id){
			try{
				$check = $this->db->prepare("SELECT * FROM lecturer_course WHERE dept_course_id=:dept_course_id");
				$arrCheck = array(':dept_course_id'=>$dept_course_id);
				$check->execute($arrCheck);
				if($check->rowCount()>1){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function seeDeptAllocCourse($dept_course_id){
			try{
				$see = $this->db->prepare("SELECT * FROM lecturer_course WHERE dept_course_id=:dept_course_id");
				$arrSee = array(':dept_course_id'=>$dept_course_id);
				$see->execute($arrSee);
				$roll= $see->fetch();
				return $roll;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}


		public function checkExistenceLecturerCourseMM($staff_number, $course_code){
			try{
				$check = $this->db->prepare("SELECT * FROM course_allocation WHERE dept_course_id=:course_code AND staff_number=:staff_number");
				$arrCheck = array(':course_code'=>$course_code, ':staff_number'=>$staff_number);
				$check->execute($arrCheck);
				if($check->rowCount()>0){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function deleteCOurseAllocation($allocation_id)
		{
			try{	
				$delAllo = $this->db->prepare("DELETE FROM course_allocation WHERE allocate_id=:allocation_id");
				$arrDelAllo = array(':allocation_id'=>$allocation_id);
				if(!empty($delAllo->execute($arrDelAllo))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function checkExistenceAlloCourse($dept_course_id, $semester_id, $prog_id, $session_id){
			try{
				$check = $this->db->prepare("SELECT * FROM course_allocation WHERE dept_course_id=:dept_course_id AND semester_id=:semester_id AND prog_id=:prog_id AND session_id=:session_id");
				$arrCheck = array(':dept_course_id'=>$dept_course_id, ':semester_id'=>$semester_id, ':prog_id'=>$prog_id, ':session_id'=>$session_id);
				$check->execute($arrCheck);
				if($check->rowCount()>0){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function insertAllocatedCourseHope($staff_number, $dept_course_id, $dept_id, $prog_id, $level_id, $session_id, $semester_id){
			try{
				$insert = $this->db->prepare("INSERT INTO course_allocation(staff_number, dept_course_id, dept_id, prog_id, level_id, session_id, semester_id)VALUES(:staff_number, :dept_course_id, :dept_id, :prog_id, :level_id, :session_id, :semester_id)");
                $arrInst = array(':staff_number'=>$staff_number, ':dept_course_id'=>$dept_course_id, ':dept_id'=>$dept_id, ':prog_id'=>$prog_id,  ':level_id'=>$level_id, 
                	':session_id'=>$session_id, ':semester_id'=>$semester_id);
                if(!empty($insert->execute($arrInst))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function insertAllocatedCourse($staff_number, $course_code, $dept_id, $prog_id, $course_status, $level_id, $session_id, $semester_id){
			try{
				$insert = $this->db->prepare("INSERT INTO  course_allocation(staff_number, course_code, dept_id, prog_id, course_status, level_id, session_id, semester_id)VALUES(:staff_number, :course_code, :dept_id, :prog_id, :course_status, :level_id, :session_id, :semester_id)");
				$arrInst = array(':staff_number'=>$staff_number, ':course_code'=>$code, ':dept_id'=>$dept_id, ':prog_id'=>$prog_id, ':course_status'=>$course_status, ':level_id'=>$level_id, ':session_id'=>$session_id, ':semester_id'=>$semester_id);
				if(!empty($insert->execute($arrInst))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function getAllocationDetails($allocation_id){
			try{
				$identity = $this->db->prepare("SELECT * FROM course_allocation WHERE allocate_id=:allocation_id");
				$arrIdentity = array(':allocation_id'=>$allocation_id);
				$identity->execute($arrIdentity);
				$dow = $identity->fetch();
				return $dow;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function getLecturerCourse($lect_course_id){
			try{
				$identity = $this->db->prepare("SELECT * FROM lecturer_course WHERE lect_course_id=:lect_course_id");
				$arrIdentity = array(':lect_course_id'=>$lect_course_id);
				$identity->execute($arrIdentity);
				$dow = $identity->fetch();
				return $dow;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function updateLecturerCourse($allocation_id, $staff_number, $dept_course_id, $dept_id, $prog_id,$level_id, $session_id, $semester_id){
			try{
				$update = $this->db->prepare("UPDATE course_allocation SET staff_number=:staff_number, dept_course_id=:dept_course_id, dept_id=:dept_id, prog_id=:prog_id, level_id=:level_id, session_id=:session_id, semester_id=:semester_id WHERE allocate_id=:allocation_id");
	            $arrUpdate = array(':staff_number'=>$staff_number, ':dept_course_id'=>$dept_course_id, ':dept_id'=>$dept_id, ':prog_id'=>$prog_id, ':level_id'=>$level_id, ':semester_id'=>$semester_id, ':session_id'=>$session_id, 
	                ':allocation_id'=>$allocation_id);
	            if(!empty($update->execute($arrUpdate))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function deleteLecturerCourse($lect_course_id){
			try{
				$deleteLect = $this->db->prepare("DELETE FROM lecturer_course WHERE lect_course_id=:lect_course_id");
				$arrDelete = array(':lect_course_id'=>$lect_course_id);
				if(!empty($deleteLect->execute($arrDelete))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function gettingAlloCourseCode($course_id){
			try {
				$dolapo = $this->db->prepare("SELECT * FROM departmental_courses WHERE course_id=:course_id");
				$arrDol = array(':course_id'=>$course_id);
				$dolapo->execute($arrDol);
				$rol = $dolapo->fetch();
				return $rol;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}


	}