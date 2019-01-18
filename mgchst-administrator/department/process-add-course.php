<?php
	
	session_start();
	require("../../connection/connection.php");
    require("../super-admin/libs_dev/course/course_class.php");
    include("../dev/general/all_purpose_class.php");
    try{
    	$course = new addNewSchoolCourse($db);
    	$all_purpose = new all_purpose($db);
    	if(isset($_POST['adding-course'])){
    		$email = $_SESSION['user_name'];
    		$course_title = $all_purpose->sanitizeInput($_POST['title']);
            $code = $all_purpose->sanitizeInput($_POST['code']);
            $course_unit = $all_purpose->sanitizeInput($_POST['unit']);
            $course_status = $all_purpose->sanitizeInput($_POST['status']);
            $dept_id = $_POST['dept_id'];
            $dept_name = $_POST['dept_name'];
            $course_code = strtoupper($code);

            if($course->checkDuplicateCourseCode($course_code)){
                $_SESSION['error'] = "You Have Added $course_code to $dept_name Departmental Course List Before, Two Courses can not have the same Course Code";
                $all_purpose->redirect("add-school-course.php");
            }else{
                if(!empty($course->insertNewCourse($course_title, $course_code, $course_unit, $course_status, $dept_id))){
                    $action ="Added $course_code Course to $dept_name Departmental Course List";
                    $his = $all_purpose->getUserDetailsandAddActivity($email, $action);
                    $_SESSION['success'] = "You Have Added $course_code $dept_name Departmental Course List Successfully";
                    $all_purpose->redirect("add-departmental-courses.php");
                }else{
                    $_SESSION['error']="Unable to Add $course_code to $dept_name Departmental Course List at the Moment, Please Try Again Later";
                   $all_purpose->redirect("add-school-course.php");

                }
            }

        }else{
            $_SESSION['error'] = "Please fill the below form to Add The Course Details";
            $all_purpose->redirect("add-school-course.php");
        }
    }catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
        $all_purpose->redirect("add-school-course.php");
    }
