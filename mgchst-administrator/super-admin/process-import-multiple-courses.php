<?php
	
	session_start();
	require("../../connection/connection.php");
    require("libs_dev/course/course_class.php");
    include("../dev/general/all_purpose_class.php");
    try{
    	$course = new addNewSchoolCourse($db);
    	$all_purpose = new all_purpose($db);
    	if(isset($_POST['adding-course'])){
    		$email = $_SESSION['user_name'];
            $check =0;      
            $filename=$_FILES["file"]["tmp_name"];
            if($_FILES["file"]["size"] > 0)
            {
                $file = fopen($filename, "r");
                while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
                {
                    $course_title = $emapData[0];
                    $code =$emapData[1];
                    $course_unit =$emapData[2];
                    $course_status = $emapData[3];
                    $dept_id = $emapData[4];
                    $course_code = strtoupper($code);
                    if($course->checkDuplicateCourseCode($course_code)){
                        $_SESSION['error'] = "You Have Added $course_code to the Course List Before, Two Courses can not have the same Course Code";
                        $all_purpose->redirect("view-all-courses.php");
                    }else{
     
                       if(!empty($course->insertNewCourse($course_title, $course_code, $course_unit, $course_status, $dept_id))){
                            $action ="Imported $course_code Course to the Course List";
                            $his = $all_purpose->getUserDetailsandAddActivity($email, $action);
                            
                        }else{
                            $_SESSION['error']="Unable to Import $course_code to the Course List at the Moment, Please Try Again Later";
                            $all_purpose->redirect("import-multiple-courses.php");

                        }
                    }
                }
                $_SESSION['success']="You Have Imported the Course Successfully";
                $all_purpose->redirect("view-all-courses.php");
                fclose($file);    
            }

        }else{
            $_SESSION['error'] = "Please Select The Excel File";
            $all_purpose->redirect("import-multiple-courses.php");
        }
    }catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
        $all_purpose->redirect("import-multiple-courses.php");
    }
