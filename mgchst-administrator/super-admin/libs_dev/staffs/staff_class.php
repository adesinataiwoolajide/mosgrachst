<?php
	class schoolStaffs{

		private $db;

		function __construct($db){
			$this->db = $db;
		}

		public function generateStaffNumber($length = 4) {
			$lel = "1714";
		    $characters = $lel;
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
		    return $randomString;
		}

		public function insertStaffLogin($staff_number, $password, $access){
			try{
				$log = $this->db->prepare("INSERT INTO staff_login(staff_number, password, access)VALUES(:staff_number, :password, :access)");
				$arrLog = array(':staff_number'=>$staff_number, ':password'=>$password, ':access'=>$access);
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

		public function addingStaffPassport($staff_email, $file_name){
			try{
				$insrt = $this->db->prepare("INSERT INTO passports(email, passport_url)VALUES(:staff_email, :file_name)");
				$arrPo = array(':staff_email'=>$staff_email, ':file_name'=>$file_name);
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

		public function addNewStaffDetails($staff_number, $staff_name, $staff_email, $staff_phone, 
			$staff_sex, $religion, $staff_type, $address, $birth_date, $marital_status, $dept_id, 
			$qualification_id){
			try{
				$insertData = $this->db->prepare("INSERT INTO staff(staff_number, staff_name, staff_email, staff_phone, sex, religion, staff_type, address, birth_date, marital_status, dept_id, qualification_id)VALUES(:staff_number, :staff_name, :staff_email, :staff_phone, :staff_sex, :religion, :staff_type, :address, :birth_date, :marital_status, :dept_id, :qualification_id)");
				$arrInst = array(':staff_number'=>$staff_number, ':staff_name'=>$staff_name, ':staff_email'=>$staff_email, ':staff_phone'=>$staff_phone, ':staff_sex'=>$staff_sex, ':religion'=>$religion, ':staff_type'=>$staff_type, ':address'=>$address, ':birth_date'=>$birth_date, ':marital_status'=>$marital_status, ':dept_id'=>$dept_id, ':qualification_id'=>$qualification_id);
				if(!empty($insertData->execute($arrInst))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				
			}
		}

		public function updatePassort($pass_id, $staff_email, $file_name){
			try{
				$upPass = $this->db->prepare("UPDATE passports SET email=:staff_email, passport_url=:file_name WHERE pass_id=:pass_id");
				$arrDas = array(':staff_email'=>$staff_email, ':file_name'=>$file_name, ':pass_id'=>$pass_id);
				if(!empty($upPass->execute($arrDas))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function deleteStaffData($staff_number){
			try{
				$delUser = $this->db->prepare("DELETE FROM staff WHERE staff_number=:staff_number");
				$arrDel = array(':staff_number'=>$staff_number);
				if(!empty($delUser->execute($arrDel))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function deleLogin($staff_email){
			try{
				$delLog = $this->db->prepare("DELETE FROM admin_login WHERE user_name=:staff_email");
				$arrLod = array(':staff_email'=>$staff_email);
				if(!empty($delLog->execute($arrLod))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function delePass($staff_email){
			try{
				$delPass = $this->db->prepare("DELETE FROM passports WHERE email=:staff_email");
				$arrPad = array(':staff_email'=>$staff_email);
				if(!empty($delPass->execute($arrPad))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}


		public function updateStaffDetails($staff_number, $staff_name, $staff_email, $staff_phone, 
			$staff_sex, $religion, $staff_type, $address, $birth_date, $marital_status, $dept_id, 
			$qualification_id){
			try{
				$upDee = $this->db->prepare("UPDATE staff SET staff_name=:staff_name, staff_email=:staff_email, staff_phone=:staff_phone, sex=:staff_sex, religion=:religion, staff_type=:staff_type, address=:address, birth_date=:birth_date, marital_status=:marital_status, dept_id=:dept_id, qualification_id=:qualification_id WHERE staff_number=:staff_number");
				$arrup = array(':staff_number'=>$staff_number, ':staff_name'=>$staff_name, ':staff_email'=>$staff_email, ':staff_phone'=>$staff_phone, ':staff_sex'=>$staff_sex, ':religion'=>$religion, ':staff_type'=>$staff_type, ':address'=>$address, ':birth_date'=>$birth_date, ':marital_status'=>$marital_status, ':dept_id'=>$dept_id, ':qualification_id'=>$qualification_id);
				if(!empty($upDee->execute($arrup))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				
			}
		}

		public function updateStaffPassport($pass_id, $file_name){
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

		public function checkStaffExistence($staff_email){
			try{
				$exist = $this->db->prepare("SELECT * FROM staff WHERE staff_email=:staff_email ");
				$arrEx = array('staff_email'=>$staff_email);
				$exist->execute($arrEx);
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

		public function gettingStafftDetails($staff_number){
			try{
				$getting = $this->db->prepare("SELECT * FROM staff WHERE staff_number=:staff_number");
				$arrGet = array(':staff_number'=>$staff_number);
				$getting->execute($arrGet);
				$depp = $getting->fetch();
				return $depp;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function gettingPreviousStafftDetails($previous){
			try{
				$getting = $this->db->prepare("SELECT * FROM staff WHERE staff_number=:previous");
				$arrGet = array(':previous'=>$previous);
				$getting->execute($arrGet);
				$depp = $getting->fetch();
				return $depp;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function gettingStafftEmail($staff_email){
			try{
				$geto = $this->db->prepare("SELECT * FROM staff WHERE staff_email=:staff_email");
				$arrGetO = array(':staff_email'=>$staff_email);
				$geto->execute($arrGetO);
				$depc = $geto->fetch();
				return $depc;
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

		public function checkingStaffLogin($staff_email){
			try{
				$checkLogin = $this->db->prepare("SELECT * FROM admin_login WHERE user_name=:staff_email");
				$arrLog = array(':staff_email'=>$staff_email);
				$checkLogin->execute($arrLog);
				if($checkLogin->rowCount()> 0){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function gettingStaffPassports($staff_number){
			try{
				$getPass = $this->db->prepare("SELECT * FROM passports WHERE email=:staff_number");
				$arrPas = array(':staff_number'=>$staff_number);
				$getPass->execute($arrPas);
				$repp = $getPass->fetch();
				return $repp;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function deleteStaffDetails($staff_number){
			try{
				$del = $this->db->prepare("DELETE FROM staff WHERE staff_number=:staff_number");
				$arrDel = array(':staff_number'=>$staff_number);
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

		public function deleteStaffPassport($staff_number){
			try{
				$delPass = $this->db->prepare("DELETE FROM passports WHERE email=:staff_number");
				$arrP = array(':staff_number'=>$staff_number);
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

		public function getStaffLogin($staff_number){
			try{
				$lov = $this->db->prepare("SELECT * FROM staff_login WHERE staff_number=:staff_number");
				$arrLov = array(':staff_number'=>$staff_number);
				$lov->execute($arrLov);
				$repo = $lov->fetch();
				return $repo;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function updateStaffLogin($staff_number, $access){
			try{
				$up = $this->db->prepare("UPDATE staff_login SET access=:access WHERE staff_number=:staff_number");
				$arrOp = array(':staff_number'=>$staff_number, ':access'=>$access);
				if(!empty($up->execute($arrOp))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}
		public function deleteStaffLogin($staff_number){
			try{
				$dec = $this->db->prepare("DELETE FROM staff_login WHERE staff_number=:staff_number");
				$arrDed = array(':staff_number'=>$staff_number);
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

		public function getStaffType($type_id){
			try{
				$type =$this->db->prepare("SELECT * FROM staff_type WHERE type_id=:type_id");
				$arrType = array(':type_id'=>$type_id);
				$type->execute($arrType);
				$rave=$type->fetch();
				return $rave;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function getStaffQualification($qualification_id){
			try{
				$qua =$this->db->prepare("SELECT * FROM qualification WHERE qualification_id=:qualification_id");
				$arrQue = array(':qualification_id'=>$qualification_id);
				$qua->execute($arrQue);
				$rav=$qua->fetch();
				return $rav;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}
	}
?>