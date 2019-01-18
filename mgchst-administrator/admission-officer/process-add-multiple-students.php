<?php
	session_start();
	require("../../connection/connection.php");
    require("../super-admin/libs_dev/students-registration/students-registration.php");
    include("../super-admin/libs_dev/department/department-class.php");
    include("../dev/general/all_purpose_class.php");
    
    try{
    	$student = new oldStudentRegistration($db);
    	$department = new schoolDepartment($db);
    	$all_purpose = new all_purpose($db);

    	if(isset($_POST['import-students'])){
    		$email = $_SESSION['user_name'];
    		$check =0;      
            $filename=$_FILES["file"]["tmp_name"];
            
            if($_FILES["file"]["size"] > 0)
            {
                $file = fopen($filename, "r");
                
                while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE){
                	$new = $emapData;
                	
                	$reg = $student->generateStudentRegistrationNumber();
                	
                	$passport = $emapData[0];
                    $student_matric_num = $emapData[1];
		    		$surname = $emapData[2]; 
		    		$other_names = $emapData[3];
		    		$date_birth = $emapData[4];
		    		$state_origin = $emapData[5];
		    		$phone_number = $emapData[6];
		    		$student_email = $emapData[7];
		    		$address = $emapData[8];
		    		$dept_name = $emapData[9];
		    		$pro = $emapData[10];
		    		$procourse_id = $emapData[11];
		    		$level_id = $emapData[12];
		    		$sex = $emapData[13];
		    		$marital_status = $emapData[14];
		    		$religion = $emapData[15];
		    		$nationality = $emapData[16];
		    		$kin_name = $emapData[17];
		    		$kin_phone = $emapData[18];
		    		$kid_address = $emapData[19];
		    		$admission_status=1;
		    		
		    		$school1 = $emapData[20];
		    		$from_date1 = $emapData[21];
		    		$to_date1 = $emapData[22];
		    		$degree1 = $emapData[23];
		    		
		    		$school2 = $emapData[24];
		    		$from_date2 = $emapData[25];
		    		$to_date2 = $emapData[26];
		    		$degree2 = $emapData[27];

		    		$school3 = $emapData[28];
		    		$from_date3 = $emapData[29];
		    		$to_date3 = $emapData[30];
		    		$degree3 = $emapData[31];

		    		$school4 = $emapData[32];
		    		$from_date4 = $emapData[33];
		    		$to_date4 = $emapData[34];
		    		$degree_4 = $emapData[35];

		    		$school5 = $emapData[36];
		    		$from_date5 = $emapData[37];
					$to_date5 = $emapData[38];
					$degree5 = $emapData[39];

					$sub1 = $emapData[40];
					$grade1 = $emapData[41];

					$sub2 = $emapData[42];
					$grade2 = $emapData[43];

					$sub3 = $emapData[44];
					$grade3 = $emapData[44];

					$sub4 = $emapData[46];
					$grade4 = $emapData[47];

					$sub5 = $emapData[48];
					$grade5 = $emapData[49];

					$sub6 = $emapData[50];
					$grade6 = $emapData[51];

					$sub7 = $emapData[52];
					$grade7 = $emapData[53];

					$sub8 = $emapData[54];
					$grade8 = $emapData[55];

					$sub9 = $emapData[56];
					$grade9 = $emapData[57];
		            $qua = $emapData[58];

		            $regNumber = "MGCHST".$reg;
		           
		            $depo = $department-> getDepartmentDetailsName($dept_name);
		    		$cut = $depo['dept_abv'];
		    		$dept_id=$dept_name;
		    		$admission_year = date("Y");
		    		$year = substr($admission_year, 2,3);
		    		

		            if(($pro == "Degree FT") OR ($pro == "degree ft") OR ($pro == "Degree ft") OR ($pro == "Degree FT") OR ($pro == "degree Ft") OR ($pro == "DEGREE FT")){
		    			$prog_id = 1;
		    		}elseif(($pro == "Diploma") OR ($pro == "diploma") OR ($pro == "DIPLOMA")){
		    			$prog_id = 2;
		    		}elseif(($pro == "Degree FT") OR ($pro == "degree ft") OR ($pro == "Degree pt") OR ($pro == "Degree") OR ($pro == "degree Pt") OR ($pro == "DEGREE PT") OR ($pro == "Degree PT")){
		    			$prog_id = 3;
		    		}else{
		    			$prog_id =0;
		    		}

		    		if(($prog_id == 1) OR ($prog_id==3)){
		    			$school_name ="Afriford University";
		    			$school_id = 2;
		    		}else{
		    			$school_name = "Moses And Grace College of Health Science and Technology";
		    			$school_id =1;
		    		}
		    		//$lasting = $admin->gettingLastMatric($school_id);
		    		$lat = $db->prepare("SELECT * FROM last_matric WHERE school_id=:school_id ORDER BY last_id DESC LIMIT 0,1");
					$arrLa = array(':school_id'=>$school_id);
				    $lat->execute($arrLa);
				    //echo  $late= $lat->lastInsertId();
				    while($see_last = $lat->fetch()){ 
					    $num = $see_last['last_matric'];
					    $id = $see_last['school_id'];
						$ro = $num+1;
						if($id == 2){
			    			$number = "0$ro";
			    			$last = $number;
			    		}else{
			    			$number ="000$ro";
			    			$last = $number;
			    		}

						if(!empty($admin->insertLastMatric($last,$school_id))){
						
							if($prog_id ==1){
				    			$roll = "DFT";
				    			$student_matric_num = "$year/$cut/".$number;
				    			$passwording = sha1($student_matric_num);
				    		}elseif($prog_id ==2){
				    			$roll = "DIP";
				    			$student_matric_num = "MGCHST/$year"."/$cut/$roll/".$number;
				    			$passwording = sha1($student_matric_num);
				    			
				    		}elseif($prog_id == 3){
				    			$student_matric_num = "$year/$cut/".$number;
				    			$passwording = sha1($student_matric_num);
				    		}else{
				    			$roll = "$year/".$number;
				    			$passwording = sha1($student_matric_num);
				    		}
				    		$regNumber = "MGCHST".$student->generateStudentRegistrationNumber();
							$passwording = sha1($student_matric_num);

				            if((!empty($student->addRegistrationStepOneM($passport, $regNumber, $surname, $other_names, $date_birth,  $state_origin, $phone_number, $student_email, $address,$dept_id, $prog_id, $procourse_id,$nationality, $sex, $marital_status, $kin_name, $kin_phone, $kid_address, $admission_status, $religion, $level_id))) AND (!empty($student->addRegistrationStepTwo($regNumber, $school1, $from_date1, $to_date1, $degree1, $school2, $from_date2, $to_date2, $degree2, $school3, $from_date3, $to_date3, $degree3, $school4, $from_date4, $to_date4, $degree_4, $school5, $from_date5, $to_date5, $degree5, $sub1, $grade1, $sub2, $grade2, $sub3, $grade3, $sub4, $grade4, $sub5, $grade5, $sub6, $grade6, $sub7, $grade7, $sub8, $grade8, $sub9, $grade9, $qua))) AND(!empty($student->grantStudentAdmission($regNumber, $student_matric_num, $dept_id, $prog_id, $level_id, $admission_status, $admission_year, $school_id)))AND(!empty($student->student_login($student_matric_num, $passwording)))){
			    				$action ="Imported $student_matric_num Biodata and  Details";
								$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
			    			}else{
			    				$_SESSION['error']="Unable to Complete Import The Student Registration Details at the moment, Please try Again Later";
			    				$all_purpose->redirect("add-multiple-students.php");
			    			}
			    		}else{
			    			$_SESSION['error']="Unable To Insert The Last Matric Number";
			    			$all_purpose->redirect("add-multiple-students.php");
			    		}
			    	}
                }
                $_SESSION['success']="You Have Imported the Students Details Successfully";
                $all_purpose->redirect("all-school-student-details.php");
                fclose($file);  
            }  
    	}else{
    		$_SESSION['error'] = "Please Select the Excel File to Import the Students Records";
    		$all_purpose->redirect("add-multiple-students.php");
    	}

    }catch(PDOException $e){
    	$_SESSION['error'] = $e->getMessage();
    	$all_purpose->redirect("add-multiple-students.php");
    } ?>