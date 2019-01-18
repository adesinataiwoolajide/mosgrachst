<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
    require("../super-admin/libs_dev/students-registration/students-registration.php");
    include("../super-admin/libs_dev/department/department-class.php");
    include("../../inc/dev/admission/admission_class.php");
    require("../super-admin/libs_dev/course/course_class.php");
    $course = new addNewSchoolCourse($db);

    $student_matric_num = $_GET['student_matric_number'];
    $regNumber = $_GET['registration_number'];
   
    
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
    <li><a href="transfer-student.php?student_matric_number=<?php echo $student_matric_num ?>&&registration_number=<?php echo $regNumber; ?>"> Tansfer Student</a></li>
    <li class="active"></li> 
    <li><a href="all-school-student-details.php"> View All Students Details</a></li>
    <li class="active">Transfer Student</li>   
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
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    
    <div class="row">
        <div class="col-md-12"> 
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Activities Details Table</h3>
                    <?php include("../table-modal.php"); ?>
                </div>
                <div class="panel-body">
                    <form action="process-transfer-student.php" method="post">
                        <table id="customers2" class="table datatable">
                            
                            <thead align="center">
                                <tr>
                          
                                    <th>Student Name</th>
                                    <th>Student Matric Number</th>
                                    <th>Previous Department</th> 
                                    <th>New Department</th> 
                                </tr>
                            </thead>
                            <tfoot align="center">
                                <tr>
                          
                                    <th>Student Name</th>
                                    <th>Student Matric Number</th>
                                    <th>Previous Department</th> 
                                    <th>New Department</th> 
                                </tr>
                            </tfoot>

                            <tbody>
                                <tr>
                                    
                                    <td><?php echo "$surname $other_names"; ?></td>
                                    <td><?php echo $student_matric_num; ?></td>
                                    <td><?php echo $dept_name; ?></td><?php
                                    $dept=$db->prepare("SELECT * FROM department ORDER BY dept_name ASC");
                                    $dept->execute(); ?>
                                    
                                    <td>
                                        <select name="dept_name" required class="form-control">
                                            <option value="">-- Select The New Department --</option>
                                            <option value=""></option><?php
                                            while($see = $dept->fetch()){ ?>
                                                <option value="<?php echo $see['dept_name']; ?>">
                                                <?php echo $see['dept_name']; ?>  
                                                </option><?php
                                            } ?>
                                        </select>
                                    </td>
                                    <input type="hidden" name="student_matric_num" value="<?php echo $student_matric_num ?>">
                                    <input type="hidden" name="prev_dept" value="<?php echo $dept_name ?>">
                                    <input type="hidden" name="regNumber" value="<?php echo $regNumber ?>">
                                </tr>
                            </tbody>
                        </table>
                        <div class="panel-footer">                                 
                            <button class="btn btn-success pull-right" name="transfer-student">TRANSFER THE STUDENT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>   
</div>  
<script>
    function confirmToDelete(){
        return confirm("Click okay to Delete The Staff Details details and cancel to stop");
    }
</script>

<script>
    function confirmToEdit(){
        return confirm("Click okay to Edit Staff and cancel to stop");
    }
</script>      

<?php
    include("../log-out-modal.php");
	include("../table-footer.php");
?>
