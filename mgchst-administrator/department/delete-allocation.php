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
        if(isset($_GET['allocate_id'])){
            $email = $_SESSION['user_name'];
            $staff_email = $_SESSION['user_name'];
            $staff = $staff_details->gettingStafftEmail($staff_email);
            $staff_name = $staff['staff_name'];
            $dept_id = $staff['dept_id'];

            $allocation_id = $_GET['allocate_id'];
            $course_code = $_GET['course_code'];
            $staff_number = $_GET['staff_number'];
            $deta = $lecturer->getAllocationDetails($allocation_id);
            $session_id = $deta['session_id'];
            $semester_id = $deta['semester_id'];
            if($semester_id ==1){
                $semester_name = "First Semester";
            }else{
                $semester_name = "Second Semester";
            }
            $sess = $db->prepare("SELECT * FROM session WHERE session_id=:session_id");
            $arrSeS = array(':session_id'=>$session_id);
            $sess->execute($arrSeS);
            $see_ses = $sess->fetch();
            $session_name = $see_ses['session_name'];
            
            if(!empty($lecturer->deleteCOurseAllocation($allocation_id))){
                $action ="Deleted $course_code Allocated To $staff_number in $semester_name for $session_name Academic Session";
                $his = $all_purpose->getUserDetailsandAddActivity($email, $action);
                $_SESSION['success'] = "You Have Deleted $course_code Allocated To $staff_number in $semester_name for $session_name Academic Session Successfully";
                $all_purpose->redirect("view-allocated-courses.php");
            }else{
                
                $_SESSION['error']="Unable to Delete $course_code Allocated To $staff_number in $semester_name for $session_name Academic Session at the moment, Please try Again Later";
                $all_purpose->redirect("view-allocated-courses.php");
            }
        }else{
            
            $_SESSION['error'] = "Please Click On Delete To Delete The Allocated Course";
            $all_purpose->redirect("view-allocated-courses.php");
        }

    }catch(PDOException $e){
        
        $_SESSION['error']= $e->getMessage();
        $all_purpose->redirect("view-allocated-courses.php");

    }

?>