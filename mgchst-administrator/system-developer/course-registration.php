<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
   
    require("../super-admin/libs_dev/students-registration/students-registration.php");
    include("../super-admin/libs_dev/department/department-class.php");
    include("../../inc/dev/admission/admission_class.php");
    require("../super-admin/libs_dev/course/course_class.php");
    $course = new addNewSchoolCourse($db);

    $student_matric_num = $_GET['student-matric-number'];
    $regNumber = $_GET['registration_number'];
    $session_id = $_GET['academic-session'];
    $session_name = $_GET['session_name'];
    
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
        <li><a href="course-registration.php?student-matric-number=<?php echo $student_matric_num ?>&&registration_number=<?php echo $regNumber;?>&&session_name=<?php echo $session_name ?>&&academic-session=<?php echo $session_id; ?>">Course List</a></li>
        <li><a href="student-course-registration.php?student-matric-number=<?php echo $student_matric_num ?>&&registration_number=<?php echo $regNumber;?>">Student Course Registration</a></li>                    
        <li class="active"><?php echo "$surname $other_names "?> COURSE LIST</li>
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
                    <h3 class="panel-title" style="color: green"><?php echo strtoupper("Please Click on Add Course For $surname $other_names For $session_name Academic Session");?> </h3>
                    <?php include("../table-modal.php"); ?>
                </div>
                <div class="panel-body"><?php
                    $sepp = $db->prepare("SELECT * FROM school_course WHERE dept_id=:dept_id ORDER BY course_title ASC");
                    $arrSep = array(':dept_id'=>$dept_id);
                    $sepp->execute($arrSep);   
                    if($sepp->rowCount()==0){ ?>
                        <h3><p align="center" style="color: red">No Course is Available for <?php echo "dept_name at the moment, Please Add Course to The Departmental Courses" ?>.<br></p></h3><?php
                    }else{ ?>
                        <form action="process-student-course-registration.php" method="post" enctype="multipart/form-data">
                            <table id="customers2" class="table datatable">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Course Title</th>
                                        <th>Course Code</th>
                                        <th>Course Unit</th>
                                        <th>Course Status</th>
                                        <th>Operations </th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Course Title</th>
                                        <th>Course Code</th>
                                        <th>Course Unit</th>
                                        <th>Course Status</th>
                                        <th>Operations </th>
                                    </tr>
                                </tfoot>
                                <tbody> 
                                    <?php
                                    $y =1;
                                    while($vope=$sepp->fetch()){  
                                        $course_id = $vope['course_id']; ?>
                                        <tr>
                                            <td><?php echo $y; ?></td>
                                            <td><?php echo $name = $vope['course_title']; ?></td>
                                            <td><?php echo $course_code = $vope['course_code']; ?></td>
                                            <td><?php echo $unit = $vope['course_unit']; ?></td>
                                            <td><?php echo $sta = $vope['course_status']; ?></td>
                                            <td>
                                                <input type="checkbox" name="add_course<?php echo $y ?>" value="1">Add Course
                                                
                                            </td>
                                            <input type="hidden" name="course_code<?php echo $y; ?>" value="<?php echo $course_code; ?>">
                                            <input type="hidden" name="session_id" value="<?php echo $session_name ?>">
                                            <input type="hidden" name="level_id" value="<?php echo $level_name ?>">
                                            <input type="hidden" name="regNumber" value="<?php echo $regNumber ?>">
                                            <input type="hidden" name="session_name" value="<?php echo $session_name ?>">
                                            <input type="hidden" name="dept_name" value="<?php echo $dept_name ?>">
                                            <input type="hidden" name="prog_id" value="<?php echo $prog_id ?>">
                                            <input type="hidden" name="student_matric_num" value="<?php echo $student_matric_num ?>">
                                            <input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                                            
                                        </tr><?php  
                                        $y++;
                                    } ?>
                                </tbody>
                            </table>
                            <div class="col-sm-12" align="center">
                                <div class="md-form-group">
                                    <input type="hidden" name="show" value="<?php echo $y; ?>">
                                    <button type="submit" class="btn btn-success">REGISTER COURSES FOR THE STUDENT</button>
                                </div>
                            </div>
                        </form> <?php      
                    } ?>
                </div>
            </div>
        </div>
    </div>             
</div>  
<script>
    function confirmToDelete(){
        return confirm("Click Okay to Delete Course Details and Cancel to Stop");
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
