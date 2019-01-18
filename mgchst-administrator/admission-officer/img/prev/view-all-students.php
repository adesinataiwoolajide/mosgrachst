<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
    require("../super-admin/libs_dev/students-registration/students-registration.php");
    include("../super-admin/libs_dev/department/department-class.php");
    include("../../inc/dev/admission/admission_class.php");
    
    $department = new schoolDepartment($db);
    $student = new oldStudentRegistration($db);
?>
<ul class="breadcrumb">
    <li><a href="./">Home</a></li>                    
    <li><a href="view-all-students.php">View All Students</p></a></li> 
    <li><a href="add-student-biodata.php">Add Student</a></li>  
    <li><a href="add-multiple-students.php">Add Multiple Students</a></li>   
    <li class="active">View All Students</li>   
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
    <div class="panel panel-default">
        <?php 
        $stu = $db->prepare("SELECT * FROM admission ORDER BY student_matric_num ASC");
        $stu->execute();
        if($stu->rowCount()==0){ ?>
            <p style="color: red;" align="center">The Students List is Empty.</p><?php
        }else{ ?>
    </div>
        
        <div class="row">
            <div class="col-md-12"> 
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Student Details Table</h3>
                        <?php include("../table-modal.php"); ?>
                    </div>
                    <div class="panel-body">
                        <table id="customers2" class="table datatable">
                            <thead>
                                <th>S/N</th>
                                <th>Passport</th>
                                <th>Student Name</th>
                                <th>Matric Number</th>
                                <th>Department</th>
                                <th>Programme</th>
                                <th>Level</th>
                                <th>Operation</th>
                            </thead>
                            <tfoot>
                                <th>S/N</th>
                                <th>Passport</th>
                                <th>Student Name</th>
                                <th>Matric Number</th>
                                <th>Department</th>
                                <th>Programme</th>
                                <th>Level</th>
                                <th>Operation</th>
                            </tfot>
                            <tbody><?php
                                $y =1;
                                while($new = $stu->fetch()){ 
                                    $student_matric_num = $new['student_matric_num'];
                                    $regNumber = $new['regNumber'];
                                    $now =  $student->getMatricNumber($regNumber);
                                    $deed = $student->getAdmissionStepOne($regNumber);
                                    $dept_name = $new['dept_name']; ?>
                                    <tr>
                                        <td><?php echo $y; ?></td>
                                        <td><img src="<?php echo "../../portal/application-form/studentadmissionimages/".$deed['passport_url']; ?>" style="width: 50px; height: 50px;" alt="<?php echo "$regNumber"; ?>">
                                        </td>
                                        <td><?php $sur = $deed['surname']; 
                                            $other = $deed['other_names']; 
                                            $nnn = strtoupper("$sur");
                                            $ooo = strtoupper("$other");
                                            echo "$nnn $ooo";  ?></td>
                                        <td><?php echo $new['student_matric_num']; ?></td>
                                        <td><?php echo $dept_name ?></td>
                                        <td><?php $prog_id = $new['prog_id']; $gov = $student->getProg($prog_id); echo $gov['prog_name']; ?></td>
                                        <td><?php echo $new['level']; ?></td>
                                        <td>
                                            <a href="edit-matric-number.php?registration_number=<?php echo $regNumber; ?>" class="btn btn-warning pull-left"onclick=""><i class="glyphicon glyphicon-user"></i>Edit Student Matric Number
                                            </a><br><br>
                                            <a href="student-details.php?student_matric_num=<?php echo $student_matric_num;?>&&register_number=<?php echo $regNumber; ?>" class="btn btn-success pull-left"onclick=""><i class="glyphicon glyphicon-user"></i>More Details
                                            </a>
                                            <a href="delete-student-details.php?student_matric_num=<?php echo $student_matric_num;?>&&register_number=<?php echo $regNumber; ?>" class="btn btn-danger pull-right"onclick="return(confirmToDelete());"><i class="glyphicon glyphicon-trash"></i>Delete
                                            </a>
                                        </td>

                                    </tr><?php
                                    $y++;
                                 
                                }?>  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <?php 
    } ?>          
</div>  
<script>
    function confirmToDelete(){
        return confirm("Click okay to Delete The Student Details and cancel to stop");
    }
</script>

<script>
    function confirmToEdit(){
        return confirm("Click okay to Edit Student and cancel to stop");
    }
</script>      

<?php
    include("../log-out-modal.php");
	include("../table-footer.php");
?>
