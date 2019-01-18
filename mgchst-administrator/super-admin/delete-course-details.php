<?php
	
	session_start();
	require("../../connection/connection.php");
    require("libs_dev/course/course_class.php");
    include("../dev/general/all_purpose_class.php");
    try{
    	$course = new addNewSchoolCourse($db);
    	$all_purpose = new all_purpose($db);
    	if(isset($_GET['course_identification'])){
    		$email = $_SESSION['user_name'];
            $course_id = $_GET['course_identification'];
            $course_code = $_GET['course_code'];

            if(!empty($course->deleteCourseUnit($course_id))){
                $action ="Deleted $course_code Details";
                $his = $all_purpose->getUserDetailsandAddActivity($email, $action);
                $_SESSION['success'] = "You Have Deleted $course_code Details Successfully";
                $all_purpose->redirect("view-all-courses.php");
            }else{
                $_SESSION['error']="Unable to Delete $course_code Course Details at the Moment, Please Try Again Later";
                $all_purpose->redirect("view-all-courses.php");
            }

        }else{
            $_SESSION['error'] = "Please Select The Course to be Deleted";
            $all_purpose->redirect("view-all-courses.php");
        }
    }catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
        $all_purpose->redirect("view-all-courses.php");
    }
