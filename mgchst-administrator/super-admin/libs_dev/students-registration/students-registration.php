<?php
	class oldStudentRegistration{
		public $db;
		function __construct($db){
			$this->db=$db;
		}

		public function transferStudent($student_matric_num, $new_dept){
			try {
				$updateTransfer = $this->db->prepare("UPDATE admission SET new_dept=:new_dept WHERE student_matric_num=:student_matric_num");
	    		$arrUpdate = array(':new_dept'=>$new_dept, ':student_matric_num'=>$student_matric_num);
	    		if(!empty($updateTransfer->execute($arrUpdate))){
	    			return true;
	    		}else{
	    			return false;
	    		}
    		
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function insertIntoTransfer($student_matric_num, $prev_dept, $new_dept)
		{
			try {
				$insertIntoTransfer= $this->db->prepare("INSERT INTO student_transfer(student_matric_num, prev_dept, new_dept)VALUES(:student_matric_num, :prev_dept, :new_dept)");
	    		$arrTran = array(':student_matric_num'=>$student_matric_num, ':prev_dept'=>$prev_dept, ':new_dept'=>$new_dept);
	    		if(!empty($insertIntoTransfer->execute($arrTran))){
	    			return true;
	    		}else{
	    			return false;
	    		}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function generateStudentRegistrationNumber($length = 6) {
			$lel = "012345";
		    $characters = $lel;
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
		    return $randomString;
		}

		public function generateStudentMtariculationNumber($length = 5) {
			$lel = "01234";
		    $characters = $lel;
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
		    return $randomString;
		}


		public function getLevelName($level_name){
			try{
				$lev = $this->db->prepare("SELECT * FROM level WHERE level_name=:level_name");
				$arrLev = array(':level_name'=>$level_name);
				$lev->execute($arrLev);
				$see_level = $lev->fetch();
				return $see_level;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}

		}

		public function checkEmailExistence($student_email, $regNumber){
			try{
				$check = $this->db->prepare("SELECT * FROM admission_registration_step1 WHERE student_email=:student_email OR regNumber=:regNumber");
				$arrCheck = array(':student_email'=>$student_email, ':regNumber'=>$regNumber);
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

		public function addRegistrationStepOne($file_name, $regNumber, $surname, $other_names, $date_birth,  $state_origin, $phone_number, $student_email, $address,$dept_id, $prog_id, $procourse_id,$nationality, $sex, $marital_status, $kin_name, $kin_phone, $kid_address, $admission_status, $religion, $level_id){
			try{
				$insertStepOne = $this->db->prepare("INSERT INTO admission_registration_step1(passport_url, regNumber, surname, other_names, date_birth, state_origin, phone_number, student_email, address, dept_id, prog_id, procourse_id, nationality, sex, marital_status, kin_name, kin_phone, kid_address, admission_status, religion, level_id)

					VALUES(:file_name, :regNumber, :surname, :other_names, :date_birth, :state_origin, :phone_number, :student_email, :address, :dept_id, :prog_id, :procourse_id, :nationality, :sex, :marital_status, :kin_name, :kin_phone, :kid_address, :admission_status, :religion, :level_id)");
				$arrSetpOne = array(':file_name'=>$file_name, ':regNumber'=>$regNumber, ':surname'=>$surname, ':other_names'=>$other_names, ':date_birth'=>$date_birth, ':state_origin'=>$state_origin, ':phone_number'=>$phone_number, ':student_email'=>$student_email, ':address'=>$address, ':dept_id'=>$dept_id, ':prog_id'=>$prog_id, ':procourse_id'=>$procourse_id, ':nationality'=>$nationality, ':sex'=>$sex, ':marital_status'=>$marital_status, ':kin_name'=>$kin_name, 
					':kin_phone'=>$kin_phone, ':kid_address'=>$kid_address, ':admission_status'=>$admission_status, ':religion'=>$religion, ':level_id'=>$level_id);
				if(!empty($insertStepOne->execute($arrSetpOne))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function addRegistrationStepOneM($passport, $regNumber, $surname, $other_names, $date_birth,  $state_origin, $phone_number, $student_email, $address,$dept_id, $prog_id, $procourse_id,$nationality, $sex, $marital_status, $kin_name, $kin_phone, $kid_address, $admission_status, $religion, $level_id){
			try{
				$insertStepOneM = $this->db->prepare("INSERT INTO admission_registration_step1(passport_url, regNumber, surname, other_names, date_birth, state_origin, phone_number, student_email, address, dept_id, prog_id, procourse_id, nationality, sex, marital_status, kin_name, kin_phone, kid_address, admission_status, religion, level_id)

					VALUES(:passport, :regNumber, :surname, :other_names, :date_birth, :state_origin, :phone_number, :student_email, :address,:dept_id, :prog_id, :procourse_id, :nationality, :sex, :marital_status, :kin_name, :kin_phone, :kid_address, :admission_status, :religion, :level_id)");
				$arrSetpOneM = array(':passport'=>$passport, ':regNumber'=>$regNumber, ':surname'=>$surname, ':other_names'=>$other_names, ':date_birth'=>$date_birth, ':state_origin'=>$state_origin, ':phone_number'=>$phone_number, ':student_email'=>$student_email, ':address'=>$address, ':dept_id'=>$dept_id, ':prog_id'=>$prog_id, ':procourse_id'=>$procourse_id, ':nationality'=>$nationality, ':sex'=>$sex, ':marital_status'=>$marital_status, ':kin_name'=>$kin_name, 
					':kin_phone'=>$kin_phone, ':kid_address'=>$kid_address, ':admission_status'=>$admission_status, ':religion'=>$religion, ':level_id'=>$level_id);
				if(!empty($insertStepOneM->execute($arrSetpOneM))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function updateRegistrationStepOne($regNumber, $surname, $other_names, $date_birth, $state_origin, 
			$phone_number, $student_email, $address,$dept_id, $prog_id, $procourse_id,$nationality, $sex, 
			$marital_status, $kin_name, $kin_phone, $kid_address, $admission_status, $religion, $level_id){
			try{
				$updateStep1 = $this->db->prepare("UPDATE admission_registration_step1 SET surname=:surname, other_names=:other_names, date_birth=:date_birth, state_origin=:state_origin, phone_number=:phone_number, student_email=:student_email, address=:address, dept_id=:dept_id, prog_id=:prog_id, procourse_id=:procourse_id, nationality=:nationality, sex=:sex, marital_status=:marital_status, kin_name=:kin_name, kin_phone=:kin_phone, kid_address=:kid_address, admission_status=:admission_status, religion=:religion, level_id=:level_id WHERE regNumber=:regNumber");
				$arrupdateOne = array(':regNumber'=>$regNumber, ':surname'=>$surname, ':other_names'=>$other_names, ':date_birth'=>$date_birth, ':state_origin'=>$state_origin, ':phone_number'=>$phone_number, 
					':student_email'=>$student_email, ':address'=>$address, ':dept_id'=>$dept_id, ':prog_id'=>$prog_id, ':procourse_id'=>$procourse_id, ':nationality'=>$nationality, ':sex'=>$sex, 
					':marital_status'=>$marital_status, ':kin_name'=>$kin_name, ':kin_phone'=>$kin_phone, 
					':kid_address'=>$kid_address, ':admission_status'=>$admission_status, ':religion'=>$religion, 
					':level_id'=>$level_id);
				if(!empty($updateStep1->execute($arrupdateOne))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function updateStudentRegistrationStepOne($regNumber, $surname, $other_names, $date_birth, $state_origin, $phone_number, $studdent_email, $address, $nationality, $sex, $marital_status, $kin_name, $kin_phone, $kid_address, $admission_status, $religion){
			try{
				$updateStep = $this->db->prepare("UPDATE admission_registration_step1 SET surname=:surname, other_names=:other_names, date_birth=:date_birth, state_origin=:state_origin, phone_number=:phone_number, student_email=:studdent_email, address=:address, nationality=:nationality, sex=:sex, marital_status=:marital_status, kin_name=:kin_name, kin_phone=:kin_phone, kid_address=:kid_address, admission_status=:admission_status, religion=:religion WHERE regNumber=:regNumber");
				$arrupdats = array(':regNumber'=>$regNumber, ':surname'=>$surname, ':other_names'=>$other_names, ':date_birth'=>$date_birth, ':state_origin'=>$state_origin, ':phone_number'=>$phone_number, ':studdent_email'=>$studdent_email,':address'=>$address, ':nationality'=>$nationality, ':sex'=>$sex, ':marital_status'=>$marital_status, ':kin_name'=>$kin_name, ':kin_phone'=>$kin_phone, 
					':kid_address'=>$kid_address, ':admission_status'=>$admission_status, ':religion'=>$religion, 
					);
				if(!empty($updateStep->execute($arrupdats))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function updateStudentRegistrationStepOneWithPass($file_name,$regNumber, $surname, $other_names, $date_birth, $state_origin, $phone_number, $student_email, $address, $nationality, $sex, $marital_status, $kin_name, $kin_phone, $kid_address, $admission_status, $religion){
			try{
				$updateStep = $this->db->prepare("UPDATE admission_registration_step1 SET passport_url=:file_name, surname=:surname, other_names=:other_names, date_birth=:date_birth, state_origin=:state_origin, phone_number=:phone_number, student_email=:student_email, address=:address, nationality=:nationality, sex=:sex, marital_status=:marital_status, kin_name=:kin_name, kin_phone=:kin_phone, kid_address=:kid_address, admission_status=:admission_status, religion=:religion WHERE regNumber=:regNumber");
				$arrupdats = array(':file_name'=>$file_name,':regNumber'=>$regNumber, ':surname'=>$surname, ':other_names'=>$other_names, ':date_birth'=>$date_birth, ':state_origin'=>$state_origin, ':phone_number'=>$phone_number, ':student_email'=>$student_email,':address'=>$address, ':nationality'=>$nationality, ':sex'=>$sex, ':marital_status'=>$marital_status, ':kin_name'=>$kin_name, ':kin_phone'=>$kin_phone, 
					':kid_address'=>$kid_address, ':admission_status'=>$admission_status, ':religion'=>$religion, 
					);
				if(!empty($updateStep->execute($arrupdats))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function updateStepOnePlusPassport($file_name, $regNumber, $surname, $other_names, $date_birth, 
			$state_origin, $phone_number, $student_email, $address,$dept_id, $prog_id, $procourse_id,$nationality, 
			$sex, $marital_status, $kin_name, $kin_phone, $kid_address, $admission_status, $religion, $level_id){
			try{
				$updateStep11 = $this->db->prepare("UPDATE admission_registration_step1 SET passport_url=:file_name, surname=:surname, other_names=:other_names, date_birth=:date_birth, state_origin=:state_origin, phone_number=:phone_number, student_email=:student_email, address=:address, dept_id=:dept_id, prog_id=:prog_id, procourse_id=:procourse_id, nationality=:nationality, sex=:sex, marital_status=:marital_status, kin_name=:kin_name, kin_phone=:kin_phone, kid_address=:kid_address, admission_status=:admission_status, religion=:religion, level_id=:level_id WHERE regNumber=:regNumber");
				$arrupdateOne1 = array(':file_name'=>$file_name,':regNumber'=>$regNumber, ':surname'=>$surname, 
					':other_names'=>$other_names, 
					':date_birth'=>$date_birth, 
					':state_origin'=>$state_origin, 
					':phone_number'=>$phone_number, 
					':student_email'=>$student_email, 
					':address'=>$address, ':dept_id'=>$dept_id, ':prog_id'=>$prog_id, 
					':procourse_id'=>$procourse_id, 
					':nationality'=>$nationality, ':sex'=>$sex, 
					':marital_status'=>$marital_status, 
					':kin_name'=>$kin_name, ':kin_phone'=>$kin_phone, ':kid_address'=>$kid_address, 
					':admission_status'=>$admission_status, ':religion'=>$religion, ':level_id'=>$level_id);
				if(!empty($updateStep11->execute($arrupdateOne1))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}

		}

		public function addRegistrationStepTwo($regNumber, $school1, $from_date1, $to_date1, $degree1, $school2, $from_date2, $to_date2, $degree2, $school3, $from_date3, $to_date3, $degree3, $school4, $from_date4, $to_date4, $degree_4, $school5, $from_date5, $to_date5, $degree5, $sub1, $grade1, $sub2, $grade2, $sub3, $grade3, $sub4, $grade4, $sub5, $grade5, $sub6, $grade6, $sub7, $grade7, $sub8, $grade8, $sub9, $grade9){
			try{
				 $insertStepTwo = $this->db->prepare("INSERT INTO admission_registration_step2(regNum, school1, from_date1, to_date1, degree1, school2, from_date2, to_date2, degree2, school3, from_date3, to_date3, degree3, school4, from_date4, to_date4, degree_4, school5, from_date5, to_date5, degree5, sub1, grade1, sub2, grade2, sub3, grade3, sub4, grade4, sub5, grade5, sub6, grade6, sub7, grade7, sub8, grade8, sub9, grade9)VALUES(:regNumber, :school1, :from_date1, :to_date1, :degree1, :school2, :from_date2, :to_date2, :degree2, :school3, :from_date3, :to_date3, :degree3, :school4, :from_date4, :to_date4, :degree_4, :school5, :from_date5, :to_date5, :degree5, :sub1, :grade1, :sub2, :grade2, :sub3, :grade3, :sub4, :grade4, :sub5, :grade5, :sub6, :grade6, :sub7, :grade7, :sub8, :grade8, :sub9, :grade9)");
                $arrStepTwo = array(':regNumber'=>$regNumber, ':school1'=>$school1, 
                	':from_date1'=>$from_date1, ':to_date1'=>$to_date1, ':degree1'=>$degree1, ':school2'=>$school2, ':from_date2'=>$from_date2, 
                    ':to_date2'=>$to_date2, ':degree2'=>$degree2, ':school3'=>$school3, 
                    ':from_date3'=>$from_date3,':to_date3'=>$to_date3, ':degree3'=>$degree3, ':school4'=>$school4, ':from_date4'=>$from_date4,
                    ':to_date4'=>$to_date4, ':degree_4'=>$degree_4, ':school5'=>$school5, ':from_date5'=>$from_date5, ':to_date5'=>$to_date5, ':degree5'=>$degree5, ':sub1'=>$sub1, ':grade1'=>$grade1, ':sub2'=>$sub2, ':grade2'=>$grade2, ':sub3'=>$sub3, ':grade3'=>$grade3, ':sub4'=>$sub4, ':grade4'=>$grade4, ':sub5'=>$sub5, ':grade5'=>$grade5, 
                    ':sub6'=>$sub6, ':grade6'=>$grade6, ':sub7'=>$sub7, ':grade7'=>$grade7, ':sub8'=>$sub8, ':grade8'=>$grade8, ':sub9'=>$sub9, ':grade9'=>$grade9);
                if(!empty($insertStepTwo->execute($arrStepTwo))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}

		}

		public function updateRegistrationStepTwo($regNumber, $school1, $from_date1, $to_date1, $degree1, $school2, $from_date2, $to_date2, $degree2, $school3, $from_date3, $to_date3, $degree3, $school4, $from_date4, $to_date4, $degree_4, $school5, $from_date5, $to_date5, $degree5, $sub1, $grade1, $sub2, $grade2, $sub3, $grade3, $sub4, $grade4, $sub5, $grade5, $sub6, $grade6, $sub7, $grade7, $sub8, $grade8, $sub9, $grade9){
			try{
				$updateStep2 = $this->db->prepare("UPDATE admission_registration_step2 SET 
					school1=:school1, from_date1=:from_date1, to_date1=:to_date1, degree1=:degree1, 
					school2=:school2, from_date2=:from_date2, to_date2=:to_date2, degree2=:degree2, 
					school3=:school3, from_date3=:from_date3, to_date3=:to_date3, degree3=:degree3, 
					school4=:school4, from_date4=:from_date4, to_date4=:to_date4, degree_4=:degree_4, 
					school5=:school5, from_date5=:from_date5, to_date5=:to_date5, degree5=:degree5, 
					sub1=:sub1, grade1=:grade1, sub2=:sub2, grade2=:grade2, sub3=:sub3, grade3=:grade3, 
					sub4=:sub4, grade4=:grade4, sub5=:sub5, grade5=:grade5, sub6=:sub6, grade6=:grade6, 
					sub7=:sub7, grade7=:grade7, sub8=:sub8, grade8=:grade8, sub9=:sub9, grade9=:grade9 
					WHERE regNum=:regNumber");
				$arrupdateTwo= array(':regNumber'=>$regNumber, ':school1'=>$school1, ':from_date1'=>$from_date1, 
	                ':to_date1'=>$to_date1, ':degree1'=>$degree1, ':school2'=>$school2, ':from_date2'=>$from_date2, 
	                ':to_date2'=>$to_date2, ':degree2'=>$degree2, ':school3'=>$school3, ':from_date3'=>$from_date3,
	                ':to_date3'=>$to_date3, ':degree3'=>$degree3, ':school4'=>$school4, ':from_date4'=>$from_date4,
	                ':to_date4'=>$to_date4, ':degree_4'=>$degree_4, ':school5'=>$school5, ':from_date5'=>$from_date5
	                , ':to_date5'=>$to_date5, ':degree5'=>$degree5, ':sub1'=>$sub1, ':grade1'=>$grade1, 
	                ':sub2'=>$sub2, ':grade2'=>$grade2, ':sub3'=>$sub3, ':grade3'=>$grade3, ':sub4'=>$sub4,
	                 ':grade4'=>$grade4, ':sub5'=>$sub5, ':grade5'=>$grade5, ':sub6'=>$sub6, ':grade6'=>$grade6, 
	                 ':sub7'=>$sub7, ':grade7'=>$grade7, ':sub8'=>$sub8, ':grade8'=>$grade8, ':sub9'=>$sub9, ':grade9'=>$grade9
					);
				if(!empty($updateStep2->execute($arrupdateTwo))){
				
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function getAdmissionStepOne($regNumber){
			try{
				$gettingOne = $this->db->prepare("SELECT * FROM admission_registration_step1 WHERE regNumber=:regNumber");
				$arrgetOne = array(':regNumber'=>$regNumber);
				$gettingOne->execute($arrgetOne);
				$seeOne =$gettingOne->fetch();
				return $seeOne;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function getAdmissionStepTwo($regNumber){
			try{
				$gettingTwo = $this->db->prepare("SELECT * FROM admission_registration_step2 WHERE regNum=:regNumber");
				$arrgetTwo = array(':regNumber'=>$regNumber);
				$gettingTwo->execute($arrgetTwo);
				$seeTwo =$gettingTwo->fetch();
				return $seeTwo;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}
		public function getStudentMatricNumber($student_matric_num){
			try{
				$getdMatric = $this->db->prepare("SELECT * FROM admission WHERE student_matric_num=:student_matric_num");
				$arrdMatric = array(':student_matric_num'=>$student_matric_num);
				$getdMatric->execute($arrdMatric);
				$fowd = $getdMatric->fetch();
				return $fowd;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function continueRegistration($regNumber){
			try{
				$cont = $this->db->prepare("SELECT * FROM admission_registration_step2 WHERE regNum=:regNumber");
				$arrCont = array(':regNumber'=>$regNumber);
				$cont->execute($arrCont);
				if($cont->rowCount()> 0){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function getProgrammeCourseIdentification($procourse_id){
			try{
				$uope = $this->db->prepare("SELECT * FROM programme_course WHERE procourse_id=:procourse_id");
				$arruope = array(':procourse_id'=>$procourse_id);
				$uope->execute($arruope);
				$kope = $uope->fetch();
				return $kope;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function getpPrevStudentMatricNumber($previous){
			try{
				$getdMatric = $this->db->prepare("SELECT * FROM admission WHERE student_matric_num=:previous");
				$arrdMatric = array(':previous'=>$previous);
				$getdMatric->execute($arrdMatric);
				$fowd = $getdMatric->fetch();
				return $fowd;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function getingIdentification($procourse_id){
			try{
				$follow = $this->db->prepare("SELECT * FROM programme_course WHERE procourse_id=:procourse_id");
				$arrFollow = array(':procourse_id'=>$procourse_id);
				$follow->execute($arrFollow);
				$dele = $follow->fetch();
				return $dele;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function grantStudentAdmission($regNumber, $student_matric_num, $dept_id, $prog_id, $level_id, $admission_status, $admission_year, $school_id){
			try{
				$grantAdmission = $this->db->prepare("INSERT INTO admission(regNumber, student_matric_num, dept_name, prog_id, level, admission_status, admission_year, school_id)VALUES(:regNumber, :student_matric_num, :dept_id, :prog_id, :level_id, :admission_status, :admission_year, :school_id)");
				$arrGrant = array(':regNumber'=>$regNumber, ':student_matric_num'=>$student_matric_num, ':dept_id'=>$dept_id, ':prog_id'=>$prog_id, ':level_id'=>$level_id, ':admission_status'=>$admission_status, ':admission_year'=>$admission_year, ':school_id'=>$school_id);
				if(!empty($grantAdmission->execute($arrGrant))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function updateGrantAdmission($admission_id, $student_matric_num, $dept_id, $prog_id, $level_id, $admission_year, $school_id){
			try{
				$updateAdmin = $this->db->prepare("UPDATE admission SET student_matric_num=:student_matric_num, dept_name=:dept_id, prog_id=:prog_id, level=:level_id, admission_year=:admission_year, school_id=:school_id WHERE admission_id=:admission_id");
				$arrUpAdmin = array(':admission_id'=>$admission_id, ':student_matric_num'=>$student_matric_num, ':dept_id'=>$dept_id, ':prog_id'=>$prog_id, ':level_id'=>$level_id, ':admission_year'=>$admission_year, ':school_id'=>$school_id);
				if(!empty($updateAdmin->execute($arrUpAdmin))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}

		}

		public function checkingStudentAdmission($student_matric_num){
			try{
				$admin =$this->db->prepare("SELECT * FROM admission WHERE student_matric_num=:student_matric_num");
				$arrAdmin = array(':student_matric_num'=>$student_matric_num);
				$admin->execute($arrAdmin);
				if($admin->rowCount()>0){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function gettingAdmission($regNumber){
			try{
				$adminf =$this->db->prepare("SELECT * FROM admission WHERE regNumber=:regNumber");
				$arrAdmifn = array(':regNumber'=>$regNumber);
				$adminf->execute($arrAdmifn);
				$you = $adminf->fetch();
				return $you;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function acceptAdmission($regNumber){
			try{
				$accept = $this->db->prepare("UPDATE admission_registration_step1 SET admission_status=1 WHERE regNumber=:regNumber");
				$arrAccept = array(':regNumber'=>$regNumber);
				if(!empty($accept->execute($arrAccept))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		
		public function getMatricNumber($regNumber){
			try{
				$getMatric = $this->db->prepare("SELECT * FROM admission WHERE regNumber=:regNumber");
				$arrMatric = array(':regNumber'=>$regNumber);
				$getMatric->execute($arrMatric);
				$fow = $getMatric->fetch();
				return $fow;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function updateMatricNumber($regNumber, $student_matric_num){
			try{
				$gepMatric = $this->db->prepare("UPDATE admission SET student_matric_num=:$student_matric_num WHERE regNumber=:regNumber");
				$arpMatric = array(':student_matric_num'=>$student_matric_num, ':regNumber'=>$regNumber);
				if(!empty($gepMatric->execute($arpMatric))){
					return true;
				}else{
					return false;
				}
				
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function student_login($student_matric_num, $passwording){
			try{
				$add_user = $this->db->prepare("INSERT INTO  student_login(user_name, password)
					VALUES(:student_matric_num, :passwording)");
				$arra = array(':student_matric_num'=>$student_matric_num, ':passwording'=>$passwording);
				$add_user->execute($arra);
				if($add_user){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function checkingStudentLogin($student_matric_num){
			try{
				$log = $this->db->prepare("SELECT * FROM student_login WHERE user_name=:student_matric_num");
				$arrLog = array(':student_matric_num'=>$student_matric_num);
				$log->execute($arrLog);
				if($log->rowCount()>0){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function checkingStudentLoginDetsild($student_matric_num){
			try{
				$loge = $this->db->prepare("SELECT * FROM student_login WHERE user_name=:student_matric_num");
				$arrLo = array(':student_matric_num'=>$student_matric_num);
				$loge->execute($arrLo);
				if($loge->rowCount()==0){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function gettingStudentLoginDetsild($student_matric_num){
			try{
				$loce = $this->db->prepare("SELECT * FROM student_login WHERE user_name=:student_matric_num");
				$arrLoc = array(':student_matric_num'=>$student_matric_num);
				$loce->execute($arrLoc);
				$fope = $loce->fetch();
				return $fope;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function gettingStudentIDLoginDetsild($student_id){
			try{
				$loce = $this->db->prepare("SELECT * FROM student_login WHERE user_name=:student_id");
				$arrLoc = array(':student_id'=>$student_id);
				$loce->execute($arrLoc);
				$fope = $loce->fetch();
				return $fope;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}
		public function deleteStudentBiodata($regNumber){
			try{
				$delData = $this->db->prepare("DELETE FROM admission_registration_step1 WHERE regNumber=:regNumber");
				$arrDelData = array(':regNumber'=>$regNumber);
				if(!empty($delData->execute($arrDelData))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function deleteStudentQuailifications($regNumber){
			try{
				$delDataQua = $this->db->prepare("DELETE FROM admission_registration_step2 WHERE regNum=:regNumber");
				$arrDelDataQua = array(':regNumber'=>$regNumber);
				if(!empty($delDataQua->execute($arrDelDataQua))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function deleteStudentAdmission($student_matric_num){
			try{
				$delAdmin = $this->db->prepare("DELETE FROM admission WHERE student_matric_num=:student_matric_num");
				$arrDelAdmin= array(':student_matric_num'=>$student_matric_num);
				if(!empty($delAdmin->execute($arrDelAdmin))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function deleteStudentLogin($student_matric_num){
			try{
				$delStu = $this->db->prepare("DELETE FROM student_login WHERE user_name=:student_matric_num");
				$arrdelSu = array(':student_matric_num'=>$student_matric_num);
				if(!empty($delStu->execute($arrdelSu))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function getProg($prog_id){
			try{
				$prog= $this->db->prepare("SELECT * FROM programme WHERE prog_id=:prog_id");
				$arrPro = array(':prog_id'=>$prog_id);
				$prog->execute($arrPro);
				$dep = $prog->fetch();
				return $dep;;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function checkRegistrationNumber($regNumber)
		{
			try {
				$checkRegNumber = $this->db->prepare("SELECT * FROM admission_registration_step1 WHERE regNumber=:regNumber");
				$arrCheckRegNum = array(':regNumber'=>$regNumber);
				$checkRegNumber->execute($arrCheckRegNum);
				if($checkRegNumber->rowCount()==0){
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

	
	class courseRegistration extends oldStudentRegistration
	{
		
		function __construct($db){
			parent:: __construct($db);
		}

		public  function checkAvailableRegistration(){
			try{
				$checkReg = $this->db->prepare("SELECT * FROM school_course");
				$arrcheckReg= array(':dept_id'=>$dept_id);
				$checkReg->execute($arrcheckReg);
				if($checkReg->rowCount()==0){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}
		public function getCourseDetails($course_code){
			try{
				$getting = $this->db->prepare("SELECT * FROM school_course WHERE course_code=:course_code");
				$arrGet = array(':course_code'=>$course_code);
				$getting->execute($arrGet);
				$see = $getting->fetch();
				return $see;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function registerForCourse($level_id, $dept_id, $prog_id){
			try{
				$course = $this->db->prepare("SELECT * FROM course_allocation WHERE level_id=:level_id AND dept_id=:dept_id AND prog_id=:prog_id");
				$arrCourse= array(':level_id'=>$level_id, ':dept_id'=>$dept_id, ':prog_id'=>$prog_id);
				$course->execute($arrCourse);
				$count = 1;
				while($now = $course->fetch()){ ?>
					
					<tbody>
						<td><?php echo $count; ?></td>
						<td><?php echo $course_code = $now['course_code']; 
							$vode = $this->getCourseDetails($course_code); ?>
								
						</td>
						<td><?php echo $vode['course_title']; ?></td>
						<td><?php echo $now['course_status']; ?></td>
						<td><?php echo $vode['course_unit']; ?></td>
						<td>
                            <input type="checkbox" name="add_course">Add Course
                        </td>
						<input type="hidden" name="course_code<?php echo $y ?>" value="<?php echo $course_code ?>">
					</tbody><?php
					$count++;
				} 

			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}
	}
?>