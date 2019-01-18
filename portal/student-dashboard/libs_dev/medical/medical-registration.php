<?php
	class studentMedicalRegistration{
		public $db;
		
		function __construct($db){
			$this->db=$db;
		}

		public function chekingMedicalRegStatus($student_matric_number)
		{
			try {
				$checkMedi = $this->db->prepare("SELECT * FROM student_medical WHERE student_matric_number=:student_matric_number");
				$arrCheMed= array(':student_matric_number'=>$student_matric_number);
				$checkMedi->execute($arrCheMed);
				if($checkMedi->rowCount()> 0){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function checkExistenceStudentMedical($student_matric_number)
		{
			try {
				$gettMedical = $this->db->prepare("SELECT * FROM student_medical WHERE student_matric_number=:student_matric_number");
				$arrGett = array(':student_matric_number'=>$student_matric_number);
				$gettMedical->execute($arrGett);
				if($gettMedical->rowCount()==0){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function addMedicalRegistration($hospital_number, $student_matric_number, $genotype, $blood_group, $guid_name, $guid_relationship, $guid_phone, $guid_address)
		{
			try {
				$insertMedical = $this->db->prepare("INSERT INTO student_medical(hospital_number, student_matric_number, genotype, blood_group, guid_name, guid_relationship, guid_phone, guid_address)VALUES(:hospital_number, :student_matric_number, :genotype, :blood_group, :guid_name, :guid_relationship, :guid_phone, :guid_address)");
				$arrInsert = array(':hospital_number'=>$hospital_number, ':student_matric_number'=>$student_matric_number, ':genotype'=>$genotype, ':blood_group'=>$blood_group, 
					':guid_name'=>$guid_name, ':guid_relationship'=>$guid_relationship, ':guid_phone'=>$guid_phone, ':guid_address'=>$guid_address);
				if(!empty($insertMedical->execute($arrInsert))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function updatingStudentMedical($student_matric_number, $genotype, $blood_group, $guid_name, $guid_relationship, $guid_phone, $guid_address)
		{
			try {
				$updateMedical = $this->db->prepare("UPDATE student_medical SET genotype=:genotype, blood_group=:blood_group, guid_name=:guid_name, guid_relationship=:guid_relationship, guid_phone=:guid_phone, guid_address=:guid_address WHERE student_matric_number=:student_matric_number");
				$arrUpMed = array(':student_matric_number'=>$student_matric_number, ':genotype'=>$genotype, 
					':blood_group'=>$blood_group, ':guid_name'=>$guid_name, ':guid_relationship'=>$guid_relationship, ':guid_phone'=>$guid_phone, ':guid_address'=>$guid_address);
				if(!empty($updateMedical->execute($arrUpMed))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function gettingStudentMedical($student_matric_number)
		{
			try {
				$gettMedical = $this->db->prepare("SELECT * FROM student_medical WHERE student_matric_number=:student_matric_number");
				$arrGett = array(':student_matric_number'=>$student_matric_number);
				$gettMedical->execute($arrGett);
				$dike = $gettMedical->fetch();
				return $dike;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function gettingStudentNumberMedical($student_matric_number)
		{
			try {
				$gettMedical = $this->db->prepare("SELECT * FROM student_medical WHERE student_matric_number=:student_matric_number");
				$arrGett = array(':student_matric_number'=>$student_matric_number);
				$gettMedical->execute($arrGett);
				$dike = $gettMedical->fetch();
				return $dike;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function deleteStudentMedical($hospital_number, $student_matric_number)
		{
			try {
				$deleteMed =$this->db->prepare("DELETE FROM student_medical WHERE student_matric_number=:student_matric_number OR hospital_number=:hospital_number");
				$arrDele = array(':hospital_number'=>$hospital_number, ':student_matric_number'=>$student_matric_number);
				if(!empty($deleteMed->execute($arrDele))){
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