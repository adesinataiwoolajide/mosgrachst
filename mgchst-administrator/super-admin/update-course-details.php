<?php
	
	session_start();
	require("../../connection/connection.php");
    require("libs_dev/course/course_class.php");
    include("../dev/general/all_purpose_class.php");
    try{
    	$course = new addNewSchoolCourse($db);
    	$all_purpose = new all_purpose($db);
    	if(isset($_POST['update-course'])){
    		$email = $_SESSION['user_name'];
    		$course_title = $all_purpose->sanitizeInput($_POST['title']);
            $code = $all_purpose->sanitizeInput($_POST['code']);
            $course_unit = $all_purpose->sanitizeInput($_POST['unit']);
            $course_status = $all_purpose->sanitizeInput($_POST['status']);
            $dept_id = $all_purpose->sanitizeInput($_POST['dept_id']);
            $course_code = strtoupper($code);
            $course_id = $_POST['course_id'];

            if(!empty($course->updateCourseDetails($course_id, $course_title, $course_code, $course_unit, $course_status, $dept_id))){
                $action ="Updated $course_code Details";
                $his = $all_purpose->getUserDetailsandAddActivity($email, $action);
                $_SESSION['success'] = "You Have Updated $course_code Details Successfully";
                $all_purpose->redirect("view-all-courses.php");
            }else{
                $return = $_POST['return'];
                $_SESSION['error']="Unable to Update $course_code Course Details at the Moment, Please Try Again Later";
                $all_purpose->redirect($return);
            }

        }else{
            $return = $_POST['return'];
            $_SESSION['error'] = "Please fill the below form to Update The Course Details";
            $all_purpose->redirect($return);
        }
    }catch(PDOException $e){
        $return = $_POST['return'];
        $_SESSION['error'] = $e->getMessage();
        $all_purpose->redirect($return);
    }
