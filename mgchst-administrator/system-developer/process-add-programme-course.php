<?php
	
	session_start();
	require("../../connection/connection.php");
    include("../super-admin/libs_dev/department/department-class.php");
    include("../dev/general/all_purpose_class.php");
    try{
    	$proc = new programmeCourse($db);
        $department = new schoolDepartment($db);
    	$all_purpose = new all_purpose($db);
    	if(isset($_POST['adding-course'])){
    		$email = $_SESSION['user_name'];
    		$prog_course = $all_purpose->sanitizeInput($_POST['name']);
    		$dept_id = $all_purpose->sanitizeInput($_POST['dept_id']);
            $requirement = $all_purpose->sanitizeInput($_POST['requirement']);
            $certification = $all_purpose->sanitizeInput($_POST['certification']);
            $duration = $all_purpose->sanitizeInput($_POST['duration']);

            $depo = $department->getDepartmentDetails($dept_id);
            $name = $depo['dept_name'];

    		if($proc->checkProgCourse($prog_course, $dept_id)){
    			$_SESSION['error'] = "You have Added This $prog_course Course and to this Department $name Before";
    			$all_purpose->redirect("add-programme-courses.php");
    		}else{
                $proCourse = $db->prepare("INSERT INTO programme_course(prog_course, requirement, certification, duration, dept_id)VALUES(:prog_course, :requirement, :certification, :duration, :dept_id)");
                $arrProC =array(':prog_course'=>$prog_course, ':requirement'=>$requirement, ':certification'=>$certification, ':duration'=>$duration, ':dept_id'=>$dept_id);
                if(!empty($proCourse->execute($arrProC))){
    			//if(!empty($proc->addProgrammeCourse($prog_course, $requirement, $certification,$duration, $$dept_id))){
    				$action ="Added $prog_course Course to Department $name ";
					$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
					$_SESSION['success'] = "You Have Added $prog_course Course to $name Department Successfully";
					$all_purpose->redirect("view-all-programme-courses.php");
    			}else{
    				$_SESSION['error'] = "Unable to Add $prog_course Course to $programme_name Programme at the moment, Please try Again Later";
    				$all_purpose->redirect("add-programme-courses.php");
    			}
    		}
		}else{
    		$_SESSION['error'] = "Please fill the below form to Add Programme Course Details";
    		$all_purpose->redirect("add-programme-courses.php");
    	}
    }catch(PDOException $e){
    	$_SESSION['error'] = $e->getMessage();
    	$all_purpose->redirect("add-programme-courses.php");
    }
?>