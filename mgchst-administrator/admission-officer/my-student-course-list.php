<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
   
    require("../super-admin/libs_dev/students-registration/students-registration.php");
    include("../super-admin/libs_dev/department/department-class.php");
    include("../../inc/dev/admission/admission_class.php");
    require("../super-admin/libs_dev/course/course_class.php");
    require '../../portal/student-dashboard/libs_dev/course-registration/course-registration-class.php';
    $course = new addNewSchoolCourse($db);
    $regid = new studentCourseRegistration($db);

    $student_matric_num = $_GET['student-matric-number'];
    $regNumber = $_GET['registration_number'];
    $session_id = $_GET['academic-session'];
    $session_name = $_GET['session_name'];
    $depo = $regid->getMyCourseList($student_matric_num, $session_id);
    
    $department = new schoolDepartment($db);
    $student = new oldStudentRegistration($db);
    $proc = new programmeCourse($db);
    $details = $student->getAdmissionStepOne($regNumber);
    $details2 = $student->getAdmissionStepTwo($regNumber);
    $detaila3 = $student->gettingAdmission($regNumber);
    $level_name = $detaila3['level'];
    $prog_id = $detaila3['prog_id'];
    $dept_name = $detaila3['dept_name'];

    $nnn = $department->getDepartmentDetailsName($dept_name);
    $dept_id = $nnn['dept_id'];
    $lel = $student->getLevelName($level_name);
    $level_id = $lel['level_id'];
    $surname =$details['surname'];
    $other_names = $details['other_names'];
    $student_email = $details['student_email'];
    
?>
    <ul class="breadcrumb">
        <li><a href="./">Home</a></li>
        <li><a href="my-student-course-list.php?student-matric-number=<?php echo $student_matric_num ?>&&registration_number=<?php echo $regNumber;?>&&session_name=<?php echo $session_name ?>&&academic-session=<?php echo $session_id; ?>">Student Course  List</a></li>
        <li><a href="course-registration.php?student-matric-number=<?php echo $student_matric_num ?>&&registration_number=<?php echo $regNumber;?>&&session_name=<?php echo $session_name ?>&&academic-session=<?php echo $session_id; ?>">Register Course</a></li>
        <li><a href="student-course-registration.php?student-matric-number=<?php echo $student_matric_num ?>&&registration_number=<?php echo $regNumber;?>">Student Course Registration</a></li>                    
        <li class="active"><?php echo "$surname $other_names "?> STUDENT COURSE LIST</li>
    </ul>
    <!-- END BREADCRUMB -->                       
    <?php
    if((isset($_SESSION['success'])) OR ((isset($_SESSION['error'])) === true)){ ?>
        <div class="alert alert-info" align="center">
            <button class="close" data-dismiss="alert">
                <i class="ace-icon fa fa-times"></i>
            </button>
         <?php include("../includes/feed-back.php"); ?>
        </div><?php 
    }  ?> 
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12"> 
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: green"><?php echo strtoupper("Please Click on Add Course For $surname $other_names For $session_name Academic Session" );?> </h3>
                    <?php include("../table-modal.php"); ?>
                </div>
                <div class="panel-body">
                    
                    <table id="customers2" class="table datatable">
                        <thead>
                            <th>S/N</th>
                            <th>COURSE CODE</th>
                            <th>COURSE TITLE</th>
                            <th>COURSE UNIT</th>
                            
                            <th>OPERATION</th>
                        </thead>
                        <tfoot>
                            <th>S/N</th>
                            <th>COURSE CODE</th>
                            <th>COURSE TITLE</th>
                            <th>COURSE UNIT</th>
                            
                            <th>OPERATION</th>
                            
                        </tfoot><?php
                        $myList = $db->prepare("SELECT * FROM course_registration WHERE student_matric_num=:student_matric_num AND session_id=:session_id");
                        $arrList = array(':student_matric_num'=>$student_matric_num, ':session_id'=>$session_id);
                        $myList->execute($arrList);
                        $count = 1;
                        while($now = $myList->fetch()){ ?>
                            
                            <tbody>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $course_code = $now['course_code']; 
                                    $vode = $course->getCourseDetails($course_code); ?>

                                </td>
                                <td><?php echo $vode['course_title']; ?></td>
                                <?php 
                                $see = $db->prepare("SELECT * FROM school_course WHERE course_code=:course_code");
                                $seeArr = array(':course_code'=>$course_code);
                                $see->execute($seeArr);
                                $sis = $see->fetch() ?>
                                    
                                <td><?php echo $vode['course_unit']; ?></td>
                                <td>
                                    <a href="remove-student-course.php?student-matric-number=<?php echo $student_matric_num; ?>&& registration-identification=<?php echo $now['registration_id']; ?>&&session_identification=<?php echo $depo['session_id']; ?>&&registration_number=<?php echo$regNumber ?>&&session_name=<?php echo $session_name ?>" class="btn btn-danger" onclick="confirmToDelete()"><i class="glyphicon glyphicon-trash"></i>
                                    Remove Course</a>
                                </td>
                                <input type="hidden" name="course_code<?php echo $count ?>" value="<?php echo $course_code ?>">

                                <input type="hidden" name="student_matric_num" value="<?php echo $student_matric_num ?>">
                                <input type="hidden" name="level_id" value="<?php echo $level_name; ?>">
                                <input type="hidden" name="prog_id" value="<?php echo $prog_id; ?>">

                                <input type="hidden" name="dept_name" value="<?php echo $dept_name; ?>">
                            </tbody><?php
                            $count++;
                        }  ?>
                    </table>
                    <div class="col-md-12" align="center">
                        <a href="my-student-course-form.php?student-matric-number=<?php echo $student_matric_num ?>&&session_name=<?php echo $session_name?>&&registration_number=<?php echo $regNumber?>&&academic-session=<?php echo $session_id?>" class="btn btn-success" >
                            <?php echo strtoupper("COMPLETE  $surname $other_names's REGISTRATION");?>       
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>             
</div>  
<script>
    function confirmToDelete(){
        return confirm("Click Okay to Delete Course From The Student Course List and Cancel to Stop");
    }
</script>

<script>
    function confirmToEdit(){
        return confirm("Click okay to Edit Course and Cancel to Stop");
    }
</script>      

<?php
    include("../log-out-modal.php");
    include("../table-footer.php");
?>
