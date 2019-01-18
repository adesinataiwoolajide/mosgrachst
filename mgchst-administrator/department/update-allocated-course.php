<?php
    session_start();
    require("../../connection/connection.php");
    require("../super-admin/libs_dev/staffs/staff_class.php");
    require("../super-admin/libs_dev/course/course_class.php");
    require("../super-admin/libs_dev/lecturer/lecturer_class.php");
    include("../super-admin/libs_dev/department/department-class.php");
    require("../dev/general/all_purpose_class.php");

    try{
        $lecturer = new allocateNewDeptCourse($db);
        $school_course = new addNewSchoolCourse($db);
        $staff_details = new schoolStaffs($db);
        $all_purpose = new all_purpose($db);
        $deptCourse = new departmentalCourses($db);
        if(isset($_POST['allocate-course'])){
            $email = $_SESSION['user_name'];
            $staff_email = $_SESSION['user_name'];
            $staff = $staff_details->gettingStafftEmail($staff_email);
            $staff_name = $staff['staff_name'];
            $dept_id = $staff['dept_id'];

            $allocation_id = $_POST['allocation_id'];
            $staff_number = $all_purpose->sanitizeInput($_POST['staff_number']);
            $course_id = $all_purpose->sanitizeInput($_POST['course_id']);
            $level_id = $all_purpose->sanitizeInput($_POST['level']);
            $semester_id = $all_purpose->sanitizeInput($_POST['semester']);
            $session_id = $all_purpose->sanitizeInput($_POST['school_session']);
            $prog_id = $all_purpose->sanitizeInput($_POST['program']);
            $oya = $lecturer->gettingAlloCourseCode($course_id);
            $dept_course_id = $oya['dept_course_id'];

            $data = $deptCourse->getDeptCourseDetails($dept_course_id);
            $course_id = $data['course_id'];
            $identify = $school_course->getCourseIdentity($course_id);
            $course_code = $identify['course_code'];
            $previous = $_POST['previous'];

            $new = $staff_details->gettingStafftDetails($staff_number);
            $newer = $new['staff_name'];

            $tele = $staff_details->gettingPreviousStafftDetails($previous);
            $tele_name = $tele['staff_name'];
            
            if(!empty($lecturer->updateLecturerCourse($allocation_id, $staff_number, $dept_course_id, 
                $dept_id, $prog_id, $level_id, $session_id, $semester_id))){
                $action ="De-Allocated $course_code From $tele_name to $newer";
                $his = $all_purpose->getUserDetailsandAddActivity($email, $action);
                $_SESSION['success'] = "You Have De-Allocated $course_code From $tele_name to $newer Successfully";
                $all_purpose->redirect("view-allocated-courses.php");
            }else{
                $return = $_POST['return'];
                $_SESSION['error']="Unable to De-Allocate $course_code From $tele_name to $newer at the moment, Please try Again Later";
                $all_purpose->redirect("$return");
            }
        }else{
            $return = $_POST['return'];
            $_SESSION['error'] = "Please fill the below form to Deallocate $course_code From $tele_name to $newer";
            $all_purpose->redirect("$return");
        }

    }catch(PDOException $e){
        $return = $_POST['return'];
        $_SESSION['error']= $e->getMessage();
        $all_purpose->redirect("$return");

    }

?>