<?php 
    session_start();
    require("../../connection/connection.php");
    require("libs_dev/students-registration/students-registration.php");
    include("../dev/general/all_purpose_class.php");
    
    try{
        $student = new oldStudentRegistration($db);
        $all_purpose = new all_purpose($db);
        
        if(isset($_POST['update_matric_number'])){
            $email = $_SESSION['user_name'];
            $regNumber = $_POST['regNumber'];
            $previous = $_POST['previous'];
            $student_matric_num = $all_purpose->sanitizeInput($_POST['new_matric']);
            $gepMatric = $db->prepare("UPDATE admission SET student_matric_num=:student_matric_num WHERE regNumber=:regNumber");
            $arpMatric = array(':student_matric_num'=>$student_matric_num, ':regNumber'=>$regNumber);
            if(!empty($gepMatric->execute($arpMatric))){
           // if(!empty($student->updateMatricNumber($regNumber, $student_matric_num))){
                $action =" Changed The Student Matric Number From $previous to $student_matric_num";
                $his = $all_purpose->getUserDetailsandAddActivity($email, $action);
                $_SESSION['success'] = "You Have Changed The Student Matric Number From $previous to $student_matric_num";
                $all_purpose->redirect("view-all-students.php");
            }else{
                $return = $_POST['return'];
                $_SESSION['error'] = "Unable to Change The Student Matric Number From $previous to $student_matric_num at the Momnet, Please try Again Later";
                $all_purpose->redirect($return);
            }
            
        }else{
            $return = $_POST['return'];
            $_SESSION['error'] = "Please Enter The New Student Matric Number";
            $all_purpose->redirect($return);
        }

    }catch(PDOException $e){
        $return = $_POST['return'];
        $_SESSION['error'] = $e->getMessage();
        $all_purpose->redirect($return);
    }