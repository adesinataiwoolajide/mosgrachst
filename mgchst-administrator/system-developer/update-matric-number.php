<?php 
    session_start();
    require("../../connection/connection.php");
    require("../super-admin/libs_dev/students-registration/students-registration.php");
    include("../dev/general/all_purpose_class.php");
    
    try{
        $student = new oldStudentRegistration($db);
        $all_purpose = new all_purpose($db);
        
        if(isset($_POST['update_matric_number'])){
            $email = $_SESSION['user_name'];
            $regNumber = $_POST['regNumber'];
            $previous = $_POST['previous'];
            $student_matric_num = $all_purpose->sanitizeInput($_POST['new_matric']);
            $details = $student->getpPrevStudentMatricNumber($previous);
            $student_id = $details['student_matric_num'];
            $nope = $student->gettingStudentIDLoginDetsild($student_id);
            $id = $nope['student_id'];

            $password = sha1($student_matric_num);

            $check = $db->prepare("SELECT * FROM admission WHERE student_matric_num=:student_matric_num");
            $arrCHeck = array(':student_matric_num'=>$student_matric_num);
            $check->execute($arrCHeck);

            $gepMatric = $db->prepare("UPDATE admission SET student_matric_num=:student_matric_num WHERE regNumber=:regNumber");
            $arpMatric = array(':student_matric_num'=>$student_matric_num, ':regNumber'=>$regNumber);

            $updateStudentLogin = $db->prepare("UPDATE student_login SET user_name=:student_matric_num, password=:password WHERE student_id=:id");
            $arrUpper = array(':student_matric_num'=>$student_matric_num, ':password'=>$password, ':id'=>$id);

            if($check->rowCount()==1){
                $return = $_POST['return'];
                $_SESSION['error']="$student_matric_num is Already in Use By Another Student, Please Use Another Matric Number";
                $all_purpose->redirect($return);
            }else{
                if(!empty($gepMatric->execute($arpMatric)) AND (!empty($updateStudentLogin->execute($arrUpper)))){
                    $action =" Changed The Student Matric Number From $previous to $student_matric_num";
                    $his = $all_purpose->getUserDetailsandAddActivity($email, $action);
                    $_SESSION['success'] = "You Have Changed The Student Matric Number From $previous to $student_matric_num";
                    $all_purpose->redirect("all-school-student-details.php");
                }else{
                    $return = $_POST['return'];
                    $_SESSION['error'] = "Unable to Change The Student Matric Number From $previous to $student_matric_num at the Momnet, Please try Again Later";
                    $all_purpose->redirect($return);
                }
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