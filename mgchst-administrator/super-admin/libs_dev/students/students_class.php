<?php 
	class schoolStudents{

		private $db;

		function __construct($db){
			$this->db=$db;
		}

		public function generateStudentNumber($length = 4) {
			$lel = date("Y");
		    $characters = $lel;
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
		    return $randomString;
		}

		public function addingNewStudents($student_number, $student_name, $student_sex, $class_id, $date_birth, $term_id, $session_id, $date_admitted, $prefect_id){
			try{
				$add = $this->db->prepare("INSERT INTO students(student_number, student_name, student_sex, class_id, date_birth, term_id, session_id, date_admitted, prefect_id)VALUES(:student_number, :student_name, :student_sex, :class_id, :date_birth, :term_id, :session_id, :date_admitted, :prefect_id)");
				$arrAdd =array(':student_number'=>$student_number, ':student_name'=>$student_name, ':student_sex'=>$student_sex, ':class_id'=>$class_id, 
					':date_birth'=>$date_birth, ':term_id'=>$term_id, 
					':session_id'=>$session_id, ':date_admitted'=>$date_admitted, ':prefect_id'=>$prefect_id);
				if(!empty($add->execute($arrAdd))){
					return true;
				}else{
					return false;
				}
				
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function checkPassPortExistence($file_name){
			try{
				$check = $this->db->prepare("SELECT * FROM passports WHERE passport_url=:file_name");
				$arrCheck = array(':file_name'=>$file_name);
				$check->execute($arrCheck);
				if($check->rowCount() > 0){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function addingStudentPassport($student_number, $file_name){
			try{
				$insrt = $this->db->prepare("INSERT INTO passports(email, passport_url)VALUES(:student_number, :file_name)");
				$arrPo = array(':student_number'=>$student_number, ':file_name'=>$file_name);
				if(!empty($insrt->execute($arrPo))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function gettingStudentDetails($student_number){
			try{
				$getting = $this->db->prepare("SELECT * FROM students WHERE student_number=:student_number");
				$arrGet = array(':student_number'=>$student_number);
				$getting->execute($arrGet);
				$depp = $getting->fetch();
				return $depp;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function gettingStudentTerm($term_id){
			try{
				$term = $this->db->prepare("SELECT * FROM term WHERE term_id=:term_id");
				$arrTerm = array(':term_id'=>$term_id);
				$term->execute($arrTerm);
				$rep = $term->fetch();
				return $rep;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function gettingStudentSession($session_id){
			try{
				$sep = $this->db->prepare("SELECT * FROM session WHERE session_id=:session_id");
				$arrsep = array(':session_id'=>$session_id);
				$sep->execute($arrsep);
				$sev = $sep->fetch();
				return $sev;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function gettingStudentPassports($student_number){
			try{
				$getPass = $this->db->prepare("SELECT * FROM passports WHERE email=:student_number");
				$arrPas = array(':student_number'=>$student_number);
				$getPass->execute($arrPas);
				$repp = $getPass->fetch();
				return $repp;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function deleteStudentDetails($student_number){
			try{
				$del = $this->db->prepare("DELETE FROM students WHERE student_number=:student_number");
				$arrDel = array(':student_number'=>$student_number);
				if(!empty($del->execute($arrDel))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function deleteStudentPassport($student_number){
			try{
				$delPass = $this->db->prepare("DELETE FROM passports WHERE email=:student_number");
				$arrP = array(':student_number'=>$student_number);
				if(!empty($delPass->execute($arrP))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function updateStudentDetails($student_number, $student_name, $student_sex, $class_id, $date_birth, $term_id, $session_id, $date_admitted, $prefect_id){
			try{
				$update = $this->db->prepare("UPDATE students SET student_name=:student_name, student_sex=:student_sex, class_id=:class_id, date_birth=:date_birth, term_id=:term_id, session_id=:session_id, date_admitted=:date_admitted, prefect_id=:prefect_id WHERE student_number=:student_number");
				$arrUp = array(':student_number'=>$student_number, ':student_name'=>$student_name, ':student_sex'=>$student_sex, ':class_id'=>$class_id, 
					':date_birth'=>$date_birth, ':term_id'=>$term_id, ':session_id'=>$session_id, ':date_admitted'=>$date_admitted, ':prefect_id'=>$prefect_id);
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

		public function updateStudentPassport($pass_id, $file_name){
			try{
				$dapo = $this->db->prepare("UPDATE passports SET passport_url=:file_name WHERE pass_id=:pass_id");
				$arrDapo = array(':file_name'=>$file_name, ':pass_id'=>$pass_id);
				if(!empty($dapo->execute($arrDapo))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function getStudentPosition($prefect_id){
			try{
				$posi = $this->db->prepare("SELECT * FROM prefect WHERE prefect_id=:prefect_id");
				$arrPosi = array(':prefect_id'=>$prefect_id);
				$posi->execute($arrPosi);
				$roll = $posi->fetch();
				return $roll;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function insertStudentLogin($student_number, $password, $access){
			try{
				$log = $this->db->prepare("INSERT INTO student_login(student_number, password, access)VALUES(:student_number, :password, :access)");
				$arrLog = array(':student_number'=>$student_number, ':password'=>$password, ':access'=>$access);
				if(!empty($log->execute($arrLog))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function deleteStudentLogin($student_number){
			try{
				$dec = $this->db->prepare("DELETE FROM student_login WHERE student_number=:student_number");
				$arrDed = array(':student_number'=>$student_number);
				if(!empty($dec->execute($arrDed))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}
	}
?>