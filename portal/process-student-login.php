<?php
	session_start();
	require("../connection/connection.php");
	require("../mgchst-administrator/dev/general/all_purpose_class.php");
	try{
		$all_purpose = new all_purpose($db);
		if(isset($_POST['login'])){
			$matric = $all_purpose->sanitizeInput($_POST['matric']);
			$password = sha1($_POST['password']);
			$email = $matric;
			$query = $db->prepare("SELECT * FROM student_login  WHERE user_name=:matric AND password=:password");
			$arr=array(':matric'=>$matric, ':password'=>$password);
			$query->execute($arr);
			$check = $query->rowCount();
			if($check == 0){
				$_SESSION['error'] = "Oooops!!! Invalid username or password";
				$all_purpose->redirect("./");
			}else{
				$result = $query->fetch();
				$_SESSION['user_name'] = $result['user_name'];
				$_SESSION['id'] = $result['student_id'];
				$user_matric = $_SESSION['user_name'];

				$action ="Logged In";
				$log = $all_purpose->operationHistory($action, $email);
				$all_purpose->redirect("student-dashboard/./");
				
			}
		}else{
			$_SESSION['error'] = "Please Login with your details";
			$all_purpose->redirect("./");
		}
	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("./");
	}