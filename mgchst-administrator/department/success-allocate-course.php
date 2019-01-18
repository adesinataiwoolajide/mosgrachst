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
            $dept_id = $staff['dept_id'];

            $staff_number = $all_purpose->sanitizeInput($_POST['staff_number']);
            $dept_course_id = $all_purpose->sanitizeInput($_POST['dept_course_id']);
            $level_id = $all_purpose->sanitizeInput($_POST['level']);
            $semester_id = $all_purpose->sanitizeInput($_POST['semester']);
            $session_id = $all_purpose->sanitizeInput($_POST['school_session']);
            $prog_id = $all_purpose->sanitizeInput($_POST['program']);
            $course_status = $all_purpose->sanitizeInput($_POST['status']);

            $data = $deptCourse->getDeptCourseDetails($dept_course_id);
            $course_id = $data['course_id'];
            $identify = $school_course->getCourseIdentity($course_id);
            $code = $identify['course_code'];

            if($lecturer->checkExistenceCourse($course_id)){
                $_SESSION['error'] = "You have Allocated $code to A Lecturer In Your Department Before";
                $all_purpose->redirect("allocate-lecturer-course.php");
            }else{
                if(!empty($lecturer->insertAllocatedCourseNN($staff_number, $dept_course_id, $level_id,  $semester_id, $session_id, $dept_course_id, $dept_id, $prog_id, $course_status))){

                    $action ="Allocated $code to $staff_number";
                    $his = $all_purpose->getUserDetailsandAddActivity($email, $action);
                    $_SESSION['success'] = "You Have Allocated $code to $staff_number Successfully";
                    $all_purpose->redirect("allocate-lecturer-course.php");
                }else{
                    $_SESSION['error'] = "Unable to Allocate $code to $staff_number at the moment, Please try Again Later";
                    $all_purpose->redirect("allocate-lecturer-course.php");
                }
            }
        }else{
            $_SESSION['error'] = "Please fill the below form to allocate a course";
            $all_purpose->redirect("allocate-lecturer-course.php");
        }

    }catch(PDOException $e){
        $_SESSION['error']= $e->getMessage();
        $all_purpose->redirect("allocate-lecturer-course.php");

    }

?>