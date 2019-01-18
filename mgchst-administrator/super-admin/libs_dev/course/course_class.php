<?php
	class addNewSchoolCourse{
		private $db;
		function __construct($db){
			$this->db=$db;
		}

		function checkDuplicateCourseCode($course_code){
			try{
				$check = $this->db->prepare("SELECT * FROM school_course WHERE course_code=:course_code");
				$arrCheck = array(':course_code'=>$course_code);
				$check->execute($arrCheck);
				if($check->rowCount()==1){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function insertNewCourse($course_title, $course_code, $course_unit, $course_status, $dept_id){
			try{
				$insert = $this->db->prepare("INSERT INTO school_course(course_title, course_code, course_unit, course_status, dept_id)VALUES(:course_title, :course_code, :course_unit, :course_status, :dept_id)");
				$arrInsert = array(':course_title'=>$course_title, ':course_code'=>$course_code, ':course_unit'=>$course_unit, ':course_status'=>$course_status, ':dept_id'=>$dept_id);
				if(!empty($insert->execute($arrInsert))){
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


		public function getCourseIdentity($course_id){
			try{
				$gepo = $this->db->prepare("SELECT * FROM school_course WHERE course_id=:course_id");
				$arrGepo = array(':course_id'=>$course_id);
				$gepo->execute($arrGepo);
				$fee = $gepo->fetch();
				return $fee;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function updateCourseDetails($course_id, $course_title, $course_code, $course_unit, $course_status, $dept_id){
			try{
				$update = $this->db->prepare("UPDATE school_course SET course_title=:course_title, course_code=:course_code, course_unit=:course_unit, course_status=:course_status, dept_id=:dept_id WHERE course_id=:course_id");
				$arrUpdate = array(':course_title'=>$course_title, ':course_code'=>$course_code, ':course_unit'=>$course_unit, ':course_id'=>$course_id, ':course_status'=>$course_status, ':dept_id'=>$dept_id);
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

		public function deleteCourseUnit($course_id){
			try{
				$delete = $this->db->prepare("DELETE FROM school_course WHERE course_id=:course_id");
				$arrDelete = array(':course_id'=>$course_id);
				if(!empty($delete->execute($arrDelete))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function DepartmentalCoursIDentitye($dept_id){
			try{
				$gettin = $this->db->prepare("SELECT * FROM department WHERE dept_id=:dept_id");
				$arrGetg = array(':dept_id'=>$dept_id);
				$gettin->execute($arrGetg);
				$ome = $gettin->fetch();
				return $ome;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function seeAllSchoolCourses($query){
			try{
				//$dept_id;
				$sepp = $this->db->prepare($query);
				//$arrSep = array(':dept_id'=>$dept_id);
				$sepp->execute();   
				if($sepp->rowCount()==0){ ?>
					<h3><p align="center" style="color: red">The School Course List is Empty.<br>Please Click on Add Course to add A New Course to the Course List</p></h3><?php
				}else{ ?>

					<table id="customers2" class="table datatable">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Course Title</th>
                                <th>Course Code</th>
                                <th>Course Unit</th>
                                <th>Course Status</th>
                                <th>Department</th>
                                <th>Operations </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S/N</th>
                                <th>Course Title</th>
                                <th>Course Code</th>
                                <th>Course Unit</th>
                                <th>Course Status</th>
                                <th>Department</th>
                                <th>Operations </th>
                            </tr>
                        </tfoot>
	                    <tbody><?php 
							$y =1;
	                        while($vope=$sepp->fetch()){  
	                        	$course_id = $vope['course_id']; ?>
	                            <tr>
	                                <td><?php echo $y; ?></td>
	                                <td><?php echo $name = $vope['course_title']; ?></td>
	                                <td><?php echo $code = $vope['course_code']; ?></td>
	                                <td><?php echo $unit = $vope['course_unit']; ?></td>
	                                <td><?php echo $status = $vope['course_status']; ?></td>
	                                <td><?php $dept_id = $vope['dept_id']; $nam= $this-> DepartmentalCoursIDentitye($dept_id);
	                                	echo $nam['dept_name'];
	                                 ?></td>
	                                <td>
	                                	<a href="edit-school-course.php?course_code=<?php echo $code; ?>" class="btn btn-success" id="" onclick="return(confirmToEdit());"><i class="glyphicon glyphicon-pencil"></i>Edit
	                                	</a>
	                                	<a href="delete-course-details.php?course_code=<?php echo $code; ?>&&course_identification=<?php echo $vope['course_id'];?>" class="btn btn-danger" onclick="return(confirmToDelete());"><i class="glyphicon glyphicon-trash"></i>Delete
	                                	</a>
                                        
                                    </td>
	                            </tr><?php  $y++;
                    		} ?>
	                        </tbody>
                    </table> <?php      
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}
	}

	class departmentalCourses extends addNewSchoolCourse {
		private $db;
		function __construct($db){
			$this->db=$db;
		}

		public function checkCouseExistence($course_id){
			try{
				$exist = $this->db->prepare("SELECT * FROM departmental_courses WHERE course_id=:course_id");
				$arrExist = array(':course_id'=>$course_id);
				$exist->execute($arrExist);
				if($exist->rowCount()==1){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function insertDepartmetalCourse($course_id, $dept_id){
			try{
				$addDeptCourse = $this->db->prepare("INSERT INTO departmental_courses(course_id, dept_id)VALUES(:course_id, :dept_id)");
				$arrDept = array(':course_id'=>$course_id, ':dept_id'=>$dept_id);
				if(!empty($addDeptCourse->execute($arrDept))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function getDeptCourseDetails($dept_course_id){
			try{
				$deptCourse = $this->db->prepare("SELECT * FROM departmental_courses WHERE dept_course_id=:dept_course_id");
				$arrrDept = array(':dept_course_id'=>$dept_course_id);
				$deptCourse->execute($arrrDept);
				$dope = $deptCourse->fetch();
				return $dope;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function updateDeptCourseDetails($course_id, $dept_id, $dept_course_id){
			try{
				$updateDEPT = $this->db->prepare("UPDATE departmental_courses SET course_id=:course_id, dept_id=:dept_id WHERE dept_course_id=:dept_course_id");
				$artupdate = array(':course_id'=>$course_id, ':dept_id'=>$dept_id, ':dept_course_id'=>$dept_course_id);
				if(!empty($updateDEPT->execute($artupdate))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function deleteDeptCourseDetails($dept_course_id){
			try{
				$deleteDeptCourse = $this->db->prepare("DELETE FROM departmental_courses WHERE dept_course_id=:dept_course_id");
				$afd = array(':dept_course_id'=>$dept_course_id);
				if(!empty($deleteDeptCourse->execute($afd))){
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