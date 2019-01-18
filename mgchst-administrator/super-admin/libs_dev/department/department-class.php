<?php
	class schoolDepartment{
		private $db;
		function __construct($db){
			$this->db=$db;
		}

		public function checkExistenceDepartment($department_name){
			try{
				$check = $this->db->prepare("SELECT * FROM department WHERE dept_name=:department_name");
				$check_arr = array(':department_name'=>$department_name);
				$check->execute($check_arr);
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

		public function addingDepartment($department_name, $abv_name){
			try{
				$insert = $this->db->prepare("INSERT INTO department(dept_name, dept_abv)VALUES(:department_name, :abv_name)");
				$arrIns = array(':department_name'=>$department_name, ':abv_name'=>$abv_name);
				if(!empty($insert->execute($arrIns))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function getProgramme($prog_id){
			try{
				$programme = $this->db->prepare("SELECT * FROM programme WHERE prog_id=:prog_id");
				$arrPro = array(':prog_id'=>$prog_id);
				$programme->execute($arrPro);
				$bing = $programme->fetch();
				return $bing;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function getProgrammeName($prog_name){
			try{
				$programe = $this->db->prepare("SELECT * FROM programme WHERE prog_name=:prog_name");
				$arrPr = array(':prog_name'=>$prog_name);
				$programe->execute($arrPr);
				$ing = $programe->fetch();
				return $ing;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function getDepartmentDetails($dept_id){
			try{
				$getting = $this->db->prepare("SELECT * FROM department WHERE dept_id=:dept_id");
				$arrGet = array(':dept_id'=>$dept_id);
				$getting->execute($arrGet);
				$come = $getting->fetch();
				return $come;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function getDepartmentDetailsName($dept_name){
			try{
				$geting = $this->db->prepare("SELECT * FROM department WHERE dept_name=:dept_name");
				$arret = array(':dept_name'=>$dept_name);
				$geting->execute($arret);
				$cme = $geting->fetch();
				return $cme;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function getDepartmentDetailsNameIDD($dept_id){
			try{
				$geting = $this->db->prepare("SELECT * FROM department WHERE dept_name=:dept_id");
				$arret = array(':dept_id'=>$dept_id);
				$geting->execute($arret);
				$cme = $geting->fetch();
				return $cme;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function updateDepartmentDetails($department_name, $abv_name, $dept_id){
			try{
				$update = $this->db->prepare("UPDATE department SET dept_name=:department_name, dept_abv=:abv_name WHERE dept_id=:dept_id");
				$arrUp = array(':department_name'=>$department_name, ':abv_name'=>$abv_name, ':dept_id'=>$dept_id);
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

		public function deleteDepartment($dept_id){
			try{
				$delete = $this->db->prepare("DELETE FROM department WHERE dept_id=:dept_id");
				$arrDel = array(':dept_id'=>$dept_id);
				if(!empty($delete->execute($arrDel))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function seeAllDepartments($query){
			try{
				$sepp = $this->db->prepare($query);
				$sepp->execute();   
				if($sepp->rowCount()==0){ ?>
					<p>The Department List is Empty.</p><?php
				}else{ ?>
					<table id="customers2" class="table datatable">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Department Name</th>
                                <th>Abbrevation Name</th>
                                <th>Operations </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S/N</th>
                                <th>Department Name</th>
                                <th>Abbrevation Name</th>
                                <th>Operations </th>
                            </tr>
                        </tfoot>
	                        <tbody><?php 
							$y =1;
	                        while($vope=$sepp->fetch()){  
	                        	$dept_id = $vope['dept_id']; ?>
	                            <tr>
	                                <td><?php echo $y; ?></td>
	                                <td><?php echo $name = $vope['dept_name']; ?></td>
	                                <td><?php echo $name = $vope['dept_abv']; ?></td>
	                                <td>
	                                	<a href="edit-department-details.php?department_name=<?php echo $name; ?>&&?>&&identification=<?php echo $dept_id ?>" class="btn btn-success pull-left" onclick="return(confirmToEdit());"><i class="glyphicon glyphicon-pencil"></i>Edit Details
	                                	</a>
	                                	<a href="delete-department.php?department_name=<?php echo $name;?>&&identification=<?php echo $dept_id ?>" class="btn btn-danger pull-right" onclick="return(confirmToDelete());"><i class="glyphicon glyphicon-trash"></i>Delete Details
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

	class programmeCourse extends schoolDepartment{
		private $db;
		function __construct($db){
			$this->db=$db;
		}

		public function checkProgCourse($prog_course, $dept_id){
			try{
				$checkProg = $this->db->prepare("SELECT * FROM programme_course WHERE prog_course=:prog_course  AND dept_id=:dept_id");
				$arrCheckProg = array(':prog_course'=>$prog_course, ':dept_id'=>$dept_id);
				$checkProg->execute($arrCheckProg);
				if($checkProg->rowCount()>0){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function addProgrammeCourse($prog_course, $requirement, $certification,$duration, 
			$dept_id){
			try{
				$proCourse = $this->db->prepare("INSERT INTO programme_course(prog_course, requirement, certification, duration, dept_id)VALUES(:prog_course, :requirement, :certification, :duration, :dept_id)");
				$arrProC =array(':prog_course'=>$prog_course, ':requirement'=>$requirement, ':certification'=>$certification, ':duration'=>$duration, ':dept_id'=>$dept_id);
				if(!empty($proCourse->execute($arrProC))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function updateProgrammeCourse($prog_course, $requirement, $certification,$duration, $dept_id, $procourse_id){
			try{
				$upDatePro = $this->db->prepare("UPDATE programme_course SET prog_course=:prog_course, requirement=:requirement, certification=:certification, duration=:duration, dept_id=:dept_id WHERE procourse_id=:procourse_id");
	            $arrYop = array(':prog_course'=>$prog_course, ':requirement'=>$requirement, ':certification'=>$certification, ':duration'=>$duration, ':dept_id'=>$dept_id, ':procourse_id'=>$procourse_id);
	            if(!empty($upDatePro->execute($arrYop))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function deleteProgrammeCourse($procourse_id){
			try{
				$deleProcou= $this->db->prepare("DELETE FROM programme_course WHERE procourse_id=:procourse_id");
				$arrDelPro = array(':procourse_id'=>$procourse_id);
				if(!empty($deleProcou->execute($arrDelPro))){
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

		public function DepartmentDetailsNow($dept_id){
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

		public function seeAllProgrammeCourses($query2){
			try{
				$sep = $this->db->prepare($query2);
				$sep->execute();   
				if($sep->rowCount()==0){ ?>
					<p style="color: red;">The Programme Course List is Empty.</p><?php
				}else{ ?>
					<div class="panel-heading">
	                    <h3 class="panel-title">Programme Course Table</h3>
	                    <?php include("../table-modal.php"); ?>
	                </div>
	                <div class="panel-body">
					<table id="customers2" class="table datatable">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Course Name</th>
                                <th> Department Name</th>
                                <th>Requirement</th>
                                <th>Certification</th>
                                <th>Duration</th>
                                <th>Operations </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S/N</th>
                                <th>Course Name</th>
                                <th> Department Name</th>
                                <th>Requirement</th>
                                <th>Certification</th>
                                <th>Duration</th>
                               
                                <th>Operations </th>
                            </tr>
                        </tfoot>
	                        <tbody><?php 
							$y =1;
	                        while($vope=$sep->fetch()){  
	                        	$procourse_id = $vope['procourse_id']; ?>
	                            <tr>
	                                <td><?php echo $y; ?></td>
	                                <td><?php echo $name = $vope['prog_course']; ?></td>
	                                <td><?php  
	                                	$dept_id = $vope['dept_id']; 
	                                	$fol = $this->DepartmentDetailsNow($dept_id);
	                                	echo $fol['dept_name'];
	                                	 ?>
	                                	 	
	                                </td>
	                                <td><?php echo $req = $vope['requirement']; ?></td>
	                                <td><?php echo $cer = $vope['certification']; ?></td>
	                                <td><?php echo $dur = $vope['duration']; ?></td>
	                                

	                                <td>
	                                	<a href="edit-programme-course.php?programme=<?php echo $name; ?>&&procourse_id=<?php echo $procourse_id ?>" class="btn btn-success pull-left" onclick="return(confirmToEdit());"><i class="glyphicon glyphicon-pencil"></i>Edit Details
	                                	</a>
	                                	<a href="delete-programme-course-details.php?programme=<?php echo $name; ?>&&procourse_id=<?php echo $procourse_id ?>" class="btn btn-danger pull-right" onclick="return(confirmToDelete());"><i class="glyphicon glyphicon-trash"></i>Delete Details
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
?>