<?php
	class addNewClass{
		private $db;
		function __construct($db){
			$this->db=$db;
		}

		public function checkingClassExistence($name, $arm_id){
			try{
				$check = $this->db->prepare("SELECT * FROM class WHERE class_name=:name AND arm_id=:arm_id");
				$arrCheck = array(':name'=>$name, ':arm_id'=>$arm_id);
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

		public function addingNewClassName($name, $arm_id, $capacity){
			try{
				$adding = $this->db->prepare("INSERT INTO class(class_name, arm_id, student_capacity) VALUES(:name, :arm_id, :capacity)");
				$arrAdding = array(':name'=>$name, ':arm_id'=>$arm_id, ':capacity'=>$capacity);
				if(!empty($adding->execute($arrAdding))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function getClassDetails($name, $class_id){
			try{
				$reve = $this->db->prepare("SELECT * FROM class WHERE class_name=:name AND class_id=:class_id");
				$arrReve = array(':name'=>$name, ':class_id'=>$class_id);
				$reve->execute($arrReve);
				$dope = $reve->fetch();
				return $dope;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function getClassIdDetails($class_id){
			try{
				$rev = $this->db->prepare("SELECT * FROM class WHERE class_id=:class_id");
				$arrRev = array(':class_id'=>$class_id);
				$rev->execute($arrRev);
				$tope = $rev->fetch();
				return $tope;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function deleteClass($name, $class_id){
			try{
				$del = $this->db->prepare("DELETE FROM class WHERE class_name=:name AND class_id=:class_id");
				$arrDel = array(':name'=>$name, ':class_id'=>$class_id);
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

		public function updateClassName($class_id, $name, $arm_id, $capacity){
			try{
				$update = $this->db->prepare("UPDATE class SET class_name=:name, arm_id=:arm_id, student_capacity=:capacity WHERE class_id=:class_id");
				$arrUpdate = array(':name'=>$name, ':class_id'=>$class_id, ':arm_id'=>$arm_id, ':capacity'=>$capacity);
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

		
	}

	class armClassing extends addNewClass{
		private $db;
		function __construct($db){
			$this->db=$db;
		}

		public function checkingClassArmExistence($arm_name){
			try{
				$arm = $this->db->prepare("SELECT * FROM class_arm WHERE class_arm=:arm_name");
				$arrArm = array(':arm_name'=>$arm_name);
				$arm->execute($arrArm);
				if($arm->rowCount()>0){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function seeAllCLassess($query){
			try{
				$sepp = $this->db->prepare($query);
				$sepp->execute();   
				if($sepp->rowCount()==0){ ?>
					<p>No Class Have Been Added To The Class List.</p><?php
				}else{ ?>
					<table id="customers2" class="table datatable">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Class Name</th>
                                <th>Class Arm</th>
                                <th>Student Capacity</th>
                                <th>Operations </th>
                            </tr>
                        </thead>
                        
						
	                        <tbody><?php 
							$y =1;
	                        while($vope=$sepp->fetch()){  $vope['class_id']; ?>
	                            <tr>
	                                <td><?php echo $y; ?></td>
	                                <td><?php echo $name = $vope['class_name']; ?></td>
	                                <td><?php 
	                                	$arm_id = $vope['arm_id']; 
	                                	$oya = $this->getClassArmName($arm_id);
	                                	echo $arm_name = $oya['arm_name'];	?>
	                                </td>
	                                <td><?php echo $capa = $vope['student_capacity']; ?></td>
	                                <td>
	                                	<a href="edit-class-details.php?class_name=<?php echo $name; ?>&&class_identification=<?php echo $vope['class_id'];?>" class="btn btn-success pull-left" onclick="return(confirmToEdit());"><i class="glyphicon glyphicon-pencil"></i>Edit Details
	                                	</a>
	                                	<a href="delete-class-details.php?class_name=<?php echo $name; ?>&&class_identification=<?php echo $vope['class_id'];?> &&arm_identification=<?php echo $arm_name; ?>" class="btn btn-danger pull-right" onclick="return(confirmToDelete());"><i class="glyphicon glyphicon-trash"></i>Delete Details
	                                	</a>
                                        <!-- <button type="button" class="btn btn-info mb-control" data-box="#message-box-sound-1"><i class="glyphicon glyphicon-pencil"></i>Edit</a></button>
                                        <button type="button" class="btn btn-danger mb-control" data-box="#message-box-sound-2"><i class="glyphicon glyphicon-trash"></i>Delete</button>

                                        <a href="delete.php" class="btn btn-info" data-container="body" data-toggle="popover" data-placement="top" data-content="Do You Want To Delete?">Popover on top</a> -->
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

		public function addingClassArm($arm_name){
			try{
				$addArm = $this->db->prepare("INSERT INTO class_arm(arm_name) VALUES(:arm_name)");
				$arrAddArm = array(':arm_name'=>$arm_name);
				if(!empty($addArm->execute($arrAddArm))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function getClassArmName($arm_id){
			try{
				$getArm = $this->db->prepare("SELECT * FROM class_arm WHERE arm_id=:arm_id");
				$arrGetArm= array(':arm_id'=>$arm_id);
				$getArm->execute($arrGetArm);
				$sek = $getArm->fetch();
				return $sek;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function deleteClassArm($arm_name){
			try{
				$Armdel = $this->db->prepare("DELETE FROM class_arm WHERE arm_name=:arm_name");
				$arrArmDel = array(':arm_name'=>$arm_name);
				if(!empty($Armdel->execute($arrArmDel))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function updateClassArmName($arm_id, $arm_name){
			try{
				$Armupdate=$this->db->prepare("UPDATE class_arm SET arm_name=:arm_name WHERE arm_id=:arm_id");
				$arrArmUpdate = array(':arm_name'=>$arm_name, ':arm_id'=>$arm_id);
				if(!empty($Armupdate->execute($arrArmUpdate))){
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