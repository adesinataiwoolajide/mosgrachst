<?php 
    session_start();
    require("../../connection/connection.php");
    require("../super-admin/libs_dev/students-registration/students-registration.php");
    include("../super-admin/libs_dev/department/department-class.php");
    include("../dev/general/all_purpose_class.php");
    
    try{
        $student = new oldStudentRegistration($db);
        $department = new schoolDepartment($db);
        $all_purpose = new all_purpose($db);
        
        if(isset($_POST['transfer-student'])){
            $email = $_SESSION['user_name'];
            $student_matric_num = $_POST['student_matric_num'];
            $regNumber = $_POST['regNumber'];
            $prev_dept = $_POST['prev_dept'];
            $new_dept = $all_purpose->sanitizeInput($_POST['dept_name']);

            if($student->transferStudent($student_matric_num, $new_dept) AND ($student->insertIntoTransfer($student_matric_num, $prev_dept, $new_dept))){
                $_SESSION['success'] = "You Have Transfered The $student_matric_num From $prev_dept to $new_dept Successfully";
                $all_purpose->redirect("all-school-student-details.php");
            }else{
                $_SESSION['error'] = "Unable to Transfer The $student_matric_num From $prev_dept to $new_dept at the moment, Please Try Again Later";
                $all_purpose->redirect("transfer-student.php?student_matric_number=$student_matric_num &&registration_number=$regNumber");
            }
            
        }else{
            $_SESSION['error'] = "Please Select The Student's New Department From The List";
            $all_purpose->redirect("transfer-student.php?student_matric_number=$student_matric_num &&registration_number=$regNumber");
        }
    }catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
        $all_purpose->redirect("transfer-student.php?student_matric_number=$student_matric_num &&registration_number=$regNumber");
    }