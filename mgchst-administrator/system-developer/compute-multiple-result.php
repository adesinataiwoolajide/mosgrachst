<?php
	
    session_start();
    include("../header.php");
    include("../side-bar.php");
    include("../dev/general/all_purpose_class.php");
    try{
        $all_purpose = new all_purpose($db);
        if(isset($_POST['compute'])){
        	$course_code = $_POST['course_code'];
        	$session_id = $_POST['session_id'];
        	$course_id = $_POST['course_id'];

        }else{
        	$_SESSION['error'] = "Please Select The Academic Session";

        }
    }catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }
	

?>