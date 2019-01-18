<?php  
	class studentAdmission{
		private $db;
		function __construct($db){
			$this->db=$db;
		}

		public function insertLastMatric($last, $school_id, $session_id)
		{
			try{
				$insert_Last = $this->db->prepare("INSERT INTO last_matric(last_matric, school_id, session_id) VALUES(:last, :school_id, :session_id)");
			    $arrInsLast = array(':last'=>$last, ':school_id'=>$school_id, ':session_id'=>$session_id);
			    if(!empty($insert_Last->execute($arrInsLast))){
			    	return true;
			    }else{
			    	return false;
			    }
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function gettingLastMatric($school_id, $session_id)
		{
			try {
				$last = $this->db->prepare("SELECT * FROM last_matric WHERE school_id=:school_id AND session_id=:session_id ORDER BY last_id DESC LIMIT 0,1");
				$arrLa = array(':school_id'=>$school_id, ':session_id'=>$session_id);
			    $last->execute($arrLa);
			    $see_last = $last->fetch();
			    $num = $see_last['last_matric'];
			    return $num;
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

		
		public function generateStudentMatricNumber($length = 4) {
			$lel = "3160";
		    $characters = $lel;
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
		    return $randomString;
		}

		public function checkEmailExistence($student_email){
			try{
				$check = $this->db->prepare("SELECT * FROM admission_registration_step1 WHERE student_email=:student_email");
				$arrCheck = array(':student_email'=>$student_email);
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

		public function addRegistrationStepOne($file_name, $regNumber, $surname, $other_names, $date_birth, $nationality, $state_origin, $phone_number, $student_email, $address, $dept_id, $prog_id, $procourse_id, $sex){
			try{
				$insertStepOne = $this->db->prepare("INSERT INTO admission_registration_step1(passport_url, regNumber, surname, other_names, date_birth, state_origin, phone_number, student_email, address, dept_id, prog_id, procourse_id, nationality, sex)VALUES(:file_name, :regNumber, :surname, :other_names, :date_birth, :state_origin, :phone_number, :student_email, :address, :dept_id, :prog_id, :procourse_id, :nationality, :sex)");
				$arrSetpOne = array(':file_name'=>$file_name, ':regNumber'=>$regNumber, ':surname'=>$surname, ':other_names'=>$other_names, ':date_birth'=>$date_birth, ':state_origin'=>$state_origin, ':phone_number'=>$phone_number, ':student_email'=>$student_email, ':address'=>$address, ':dept_id'=>$dept_id, ':prog_id'=>$prog_id, ':procourse_id'=>$procourse_id, ':nationality'=>$nationality, ':sex'=>$sex);
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

		public function addRegistrationStepTwo($regNumber, $school1, $from_date1, $to_date1, $degree1, $school2, $from_date2, $to_date2, $degree2, $school3, $from_date3, $to_date3, $degree3, $school4, $from_date4, $to_date4, $degree_4, $school5, $from_date5, $to_date5, $degree5, $sub1, $grade1, $sub2, $grade2, $sub3, $grade3, $sub4, $grade4, $sub5, $grade5, $sub6, $grade6, $sub7, $grade7, $sub8, $grade8, $sub9, $grade9, $qua){
			try{
				 $insertStepTwo = $this->db->prepare("INSERT INTO admission_registration_step2(regNum, school1, from_date1, to_date1, degree1, school2, from_date2, to_date2, degree2, school3, from_date3, to_date3, degree3, school4, from_date4, to_date4, degree_4, school5, from_date5, to_date5, degree5, sub1, grade1, sub2, grade2, sub3, grade3, sub4, grade4, sub5, grade5, sub6, grade6, sub7, grade7, sub8, grade8, sub9, grade9, qua)VALUES(:regNumber, :school1, :from_date1, :to_date1, :degree1, :school2, :from_date2, :to_date2, :degree2, :school3, :from_date3, :to_date3, :degree3, :school4, :from_date4, :to_date4, :degree_4, :school5, :from_date5, :to_date5, :degree5, :sub1, :grade1, :sub2, :grade2, :sub3, :grade3, :sub4, :grade4, :sub5, :grade5, :sub6, :grade6, :sub7, :grade7, :sub8, :grade8, :sub9, :grade9, :qua)");
                $arrStepTwo = array(':regNumber'=>$regNumber, ':school1'=>$school1, ':from_date1'=>$from_date1, 
                    ':to_date1'=>$to_date1, ':degree1'=>$degree1, ':school2'=>$school2, ':from_date2'=>$from_date2, 
                    ':to_date2'=>$to_date2, ':degree2'=>$degree2, ':school3'=>$school3, ':from_date3'=>$from_date3,
                    ':to_date3'=>$to_date3, ':degree3'=>$degree3, ':school4'=>$school4, ':from_date4'=>$from_date4,
                    ':to_date4'=>$to_date4, ':degree_4'=>$degree_4, ':school5'=>$school5, ':from_date5'=>$from_date5
                    , ':to_date5'=>$to_date5, ':degree5'=>$degree5, ':sub1'=>$sub1, ':grade1'=>$grade1, ':sub2'=>$sub2, ':grade2'=>$grade2, ':sub3'=>$sub3, ':grade3'=>$grade3, ':sub4'=>$sub4, ':grade4'=>$grade4, ':sub5'=>$sub5, ':grade5'=>$grade5, ':sub6'=>$sub6, ':grade6'=>$grade6, ':sub7'=>$sub7, ':grade7'=>$grade7, ':sub8'=>$sub8, ':grade8'=>$grade8, ':sub9'=>$sub9, ':grade9'=>$grade9, ':qua'=>$qua);
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

		public function updateRegistrationStepTwo($regNumber, $school1, $from_date1, $to_date1, $degree1, $school2, $from_date2, $to_date2, $degree2, $school3, $from_date3, $to_date3, $degree3, $school4, $from_date4, $to_date4, $degree_4, $school5, $from_date5, $to_date5, $degree5, $sub1, $grade1, $sub2, $grade2, $sub3, $grade3, $sub4, $grade4, $sub5, $grade5, $sub6, $grade6, $sub7, $grade7, $sub8, $grade8, $sub9, $grade9, $qua){
			try{
				$updateStep2 = $this->db->prepare("UPDATE admission_registration_step2 SET 
					school1=:school1, from_date1=:from_date1, to_date1=:to_date1, degree1=:degree1, 
					school2=:school2, from_date2=:from_date2, to_date2=:to_date2, degree2=:degree2, 
					school3=:school3, from_date3=:from_date3, to_date3=:to_date3, degree3=:degree3, 
					school4=:school4, from_date4=:from_date4, to_date4=:to_date4, degree_4=:degree_4, 
					school5=:school5, from_date5=:from_date5, to_date5=:to_date5, degree5=:degree5, 
					sub1=:sub1, grade1=:grade1, sub2=:sub2, grade2=:grade2, sub3=:sub3, grade3=:grade3, 
					sub4=:sub4, grade4=:grade4, sub5=:sub5, grade5=:grade5, sub6=:sub6, grade6=:grade6, 
					sub7=:sub7, grade7=:grade7, sub8=:sub8, grade8=:grade8, sub9=:sub9, grade9=:grade9, qua=:qua 
					WHERE regNum=:regNumber");
				$arrupdateTwo= array(':regNumber'=>$regNumber, ':school1'=>$school1, ':from_date1'=>$from_date1, 
	                ':to_date1'=>$to_date1, ':degree1'=>$degree1, ':school2'=>$school2, ':from_date2'=>$from_date2, 
	                ':to_date2'=>$to_date2, ':degree2'=>$degree2, ':school3'=>$school3, ':from_date3'=>$from_date3,
	                ':to_date3'=>$to_date3, ':degree3'=>$degree3, ':school4'=>$school4, ':from_date4'=>$from_date4,
	                ':to_date4'=>$to_date4, ':degree_4'=>$degree_4, ':school5'=>$school5, ':from_date5'=>$from_date5
	                , ':to_date5'=>$to_date5, ':degree5'=>$degree5, ':sub1'=>$sub1, ':grade1'=>$grade1, 
	                ':sub2'=>$sub2, ':grade2'=>$grade2, ':sub3'=>$sub3, ':grade3'=>$grade3, ':sub4'=>$sub4,
	                 ':grade4'=>$grade4, ':sub5'=>$sub5, ':grade5'=>$grade5, ':sub6'=>$sub6, ':grade6'=>$grade6, 
	                 ':sub7'=>$sub7, ':grade7'=>$grade7, ':sub8'=>$sub8, ':grade8'=>$grade8, ':sub9'=>$sub9, ':grade9'=>$grade9, ':qua'=>$qua
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

		public function updateRegistrationStepOne($regNumber, $surname, $other_names, $date_birth, $nationality, $state_origin, $phone_number, $student_email, $address,$sex){
			try{
				$updateStep1 = $this->db->prepare("UPDATE admission_registration_step1 SET surname=:surname, other_names=:other_names, date_birth=:date_birth, state_origin=:state_origin, phone_number=:phone_number, address=:address, nationality=:nationality, sex=:sex WHERE regNumber=:regNumber");
				$arrupdateOne = array(':regNumber'=>$regNumber, ':surname'=>$surname, ':other_names'=>$other_names, ':date_birth'=>$date_birth, ':state_origin'=>$state_origin, ':phone_number'=>$phone_number, ':address'=>$address, ':nationality'=>$nationality, ':sex'=>$sex);
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

		public function grantStudentAdmission($regNumber, $student_matric_num, $dept_name, $prog_id, $level, $admission_status, $year_admit){
			try{
				$grantAdmission = $this->db->prepare("INSERT INTO admission(regNumber, student_matric_num, dept_name, prog_id, level, admission_status, admission_year)VALUES(:regNumber, :student_matric_num, :dept_name, :prog_id, :level, :admission_status, :year_admit)");
				$arrGrant = array(':regNumber'=>$regNumber, ':student_matric_num'=>$student_matric_num, ':dept_name'=>$dept_name, ':prog_id'=>$prog_id, ':level'=>$level, ':admission_status'=>$admission_status, ':year_admit'=>$year_admit);
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

		public function deleteStudentLogin($student_matric_num){
			try{
				$delLogin = $this->db->prepare("DELETE FROM student_login WHERE user_name=:student_matric_num");
				$arrDelLogin = array(':student_matric_num'=>$student_matric_num);
				$delLogin->execute($arrDelLogin);
				if($delLogin){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function cancelAdmission($regNumber){
			try{
				$cancel = $this->db->prepare("UPDATE admission_registration_step1 SET admission_status=0 WHERE regNumber=:regNumber");
				$arrCancel = array(':regNumber'=>$regNumber);
				if(!empty($cancel->execute($arrCancel))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function deleteAdmission($regNumber){
			try{
				$delAdmin = $this->db->prepare("DELETE FROM admission WHERE regNumber=:regNumber");
				$arrDelAdmin = array(':regNumber'=>$regNumber);
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


	
	}

	
?>