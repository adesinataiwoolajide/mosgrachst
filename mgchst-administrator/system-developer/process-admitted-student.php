<?php
	session_start();
	require("../../connection/connection.php");
    include("../dev/general/all_purpose_class.php");
    include("../super-admin/libs_dev/department/department-class.php");
    require("../super-admin/libs_dev/students-registration/students-registration.php");
    include("../../inc/dev/admission/admission_class.php");
    $student = new oldStudentRegistration($db);
    $department = new schoolDepartment($db);
    $admin = new studentAdmission($db);
    $all_purpose = new all_purpose($db);
    try{
		if($_POST){
			$y = $_POST["show"];
			$school_name =  'MGCHST';
			$admission_status =1;
			$email = $_SESSION['user_name'];
			
			for($i = 1; $i <= $y; $i++){
				$grant = $_POST["topping$i"];
				$lasting = $admin->gettingLastMatric();
				$ro = $lasting+1;
				$number = "0$ro";
				$last = $number;
				if($grant ==1){
					$regNumber = $_POST["regNumber$i"];
					$dept_id=$_POST["dept_id$i"];
					$prog_id = $_POST["prog_id$i"];
					$year_admit = $_POST["year_admit$i"];
					$level = $_POST["level$i"];
					$geting = $db->prepare("SELECT * FROM department WHERE dept_id=:dept_id");
					$arret = array(':dept_id'=>$dept_id);
					$geting->execute($arret);
					$cme = $geting->fetch();
	    			$cut = $cme['dept_abv'];
					$year = substr($year_admit, 2,2);
		    		//$sla = "/";
		    		$dept_name= $cme['dept_name'];
		    		$adding =1;
		    		if($prog_id == 1){
		    			$school_id = 1;
		    		}else{
		    			$school_id =2;
		    		}

					if(($prog_id ==1)OR($prog_id ==3)){
		    			 echo $student_matric_num =$year."/".$cut."/".$number;
		    			
		    		}elseif($prog_id ==2)  {
		    			$roll = "DIP";
		    			echo $student_matric_num =$school_name."/".$year."/".$cut."/".$roll."/".$number;
		    		}else{
		    			 echo $student_matric_num = "$year/".$number;
		    		}
					
					$passwording = sha1($student_matric_num);

					if(!empty($admin->grantStudentAdmission($regNumber, $student_matric_num, $dept_name, $prog_id, $level, $admission_status, $year_admit, $school_id)) AND (!empty($admin->acceptAdmission($regNumber))) AND(!empty($admin->student_login($student_matric_num, $passwording))) AND (!empty($admin->insertLastMatric($last)))){
						//$insert = $admin->insertLastMatric($student_matric_num);
						$action ="Admitted $student_matric_num";
						$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
					}else{
						$_SESSION['error'] = "Unable to Admit the Selected Students at the Moment, Please try again later";
						$all_purpose->redirect("admit-students.php");
					}
				}
			}
			$_SESSION['success'] = "Students Admmitted Into The School Successfully";
			$all_purpose->redirect("admission-list.php");
		}
	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("admit-students.php");
	}
