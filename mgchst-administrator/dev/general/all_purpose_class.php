<?php
	class all_purpose{
		private $db;

		function __construct($db){
			$this->db= $db;
		}

		public function gettingUserimage($user){
			try{
				$bringing = $this->db->prepare("SELECT * FROM passports WHERE email=:user");
				$are = array(':user'=>$user);
				$bringing->execute($are);
				$dev = $bringing->fetch();
				return $dev;
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function gettingStaffActivities($user){
			try{
				$act = $this->db->prepare("SELECT * FROM activity WHERE user_details=:user ORDER BY act_id DESC LIMIT 1,10");
				$arr = array(':user'=>$user);
				$act->execute($arr);
				while($flop=$act->fetch()){ ?>
					<small class="text-muted"><?php echo $flop['time_added']; ?></small>
                    <p><?php echo $flop['action']; ?></p><?php
				}
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function sanitizeInput($input){
			$input=trim($input);
			$input=strip_tags($input);
			$input=stripslashes($input);
			$input=htmlentities($input);
			return $input;
		}

		public function accesses(){
			$redi = $this->redirect($url);
			if(!isset($_SESSION['id'])){
				$_SESSION['error'] = "Please Login your details to access the system";
				redirect(".././");
				die();
			}
		}

		public function gettingUserdetails($user_id){
			try{
				$bringing = $this->db->prepare("SELECT * FROM admin_login WHERE useer_id=:user_id");
				$are = array(':user_id'=>$user_id);
				if($bringing->execute($are)){
					return true;
				}else{
					return false;
				}

			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function operationHistory($action, $email){
			try{
				$history = $this->db->prepare("INSERT INTO activity(action, user_details)VALUES(:action, :email)");
				$arrr = array(':action'=>$action, ':email'=>$email);
				$result = $history->execute($arrr);
				if(!empty($result)){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function redirect($url){
		    header('Location: '.$url);
		    exit();
		}

		public function userRole($access){
			if($access == 1){
				echo "Administrator";
			}elseif($access == 2){
				echo "Staff";
			}else{
				echo "Unauthorize User";
			}
		}

		public function userAccessLevel($access, $action, $email){
			if($access ==1){
				$nn= $this->operationHistory($action, $email);
				$_SESSION['success'] = $_SESSION['name']. " ". "Welcome to Moses & Grace College of Health Sciences and Technology Super Admin Panel";
				$this->redirect("super-admin/./");
			}elseif($access ==2){
				$nn= $this->operationHistory($action, $email);
				$_SESSION['success'] = $_SESSION['name']. " ". "Welcome to Moses & Grace College of Health Sciences and Technology Bursery Admin Panel";
				$this->redirect("bursary/./");
			}elseif($access ==3){
			$nn= $this->operationHistory($action, $email);
			$_SESSION['success'] = $_SESSION['name']. " ". "Welcome to Moses & Grace College of Health Sciences and Technology HOD Panel";
			$this->redirect("department/./");
			}elseif($access ==4){
				$nn= $this->operationHistory($action, $email);
				$_SESSION['success'] = $_SESSION['name']. " ". "Welcome to Moses & Grace College of Health Sciences and Technology Lecturer Panel";
				$this->redirect("lecturer/./");
			
			}elseif($access ==5){
				$nn= $this->operationHistory($action, $email);
				$_SESSION['success'] = $_SESSION['name']. " ". "Welcome to Moses & Grace College of Health Sciences and Technology Admission Officer's Panel";
				$this->redirect("admission-officer/./");

			}elseif($access ==6){
				$nn= $this->operationHistory($action, $email);
				$_SESSION['success'] = $_SESSION['name']. " ". "Welcome to Moses & Grace College of Health Sciences and Technology Exam Officer's Panel";
				$this->redirect("exam-officer/./");
			}elseif($access ==11){
				$nn= $this->operationHistory($action, $email);
				$_SESSION['success'] = $_SESSION['name']. " ". "Welcome to Moses & Grace College of Health Sciences and Technology Developer's Panel";
				$this->redirect("system-developer/./");
			}else{
				$_SESSION['error'] = "Your account have not been Activated";
				$this->redirect("../.././");
			}
			return $access;
		}

		public function getUserDetailsandAddActivity($email, $action){
			try{
				$loging_out = $this->db->prepare("SELECT * FROM admin_login WHERE user_name =:email");
				$arr = array(':email' =>$email);
				$loging_out->execute($arr);
				$feting = $loging_out->fetch();	
				$new =$this->operationHistory($action, $email);
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		
		}

		public function gettingPlayerdetails($username, $action){
			try{
				$player = $this->db->prepare("INSERT INTO activity(action, user_details)VALUES(:action, :username)");
				$arrr = array(':action'=>$action, ':username'=>$username);
				$result = $player->execute($arrr);
				if(!empty($result)){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		
	}
?>