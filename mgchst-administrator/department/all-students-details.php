<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
    require("../super-admin/libs_dev/students-registration/students-registration.php");
    include("../super-admin/libs_dev/department/department-class.php");
    include("../../inc/dev/admission/admission_class.php");
    include("../super-admin/libs_dev/staffs/staff_class.php");
    $staff_details = new schoolStaffs($db);
    $staff_email = $_SESSION['user_name'];
    $staff = $staff_details->gettingStafftEmail($staff_email);
    $dept_id = $staff['dept_id'];
    $staff_number =$staff['staff_number'];
    $staff_name = $staff['staff_name'];
    $department = new schoolDepartment($db);
    $student = new oldStudentRegistration($db);
    $details = $department->getDepartmentDetails($dept_id);
    $dept_name = $details['dept_name'];
    $department = new schoolDepartment($db);
    $student = new oldStudentRegistration($db);
?>
<ul class="breadcrumb">
    <li><a href="./">Home</a></li>                    
    <li><a href="all-students-details.php"><?php echo "$dept_name Students Details" ?></a></li>   
    <li class="active"><?php echo "$dept_name Students List" ?></li>   
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
        $stu = $db->prepare("SELECT * FROM admission WHERE dept_name=:dept_name OR new_dept=:dept_name ORDER BY student_matric_num ASC");
        $arrStu = array(':dept_name'=>$dept_name);
        $stu->execute($arrStu);
        if($stu->rowCount()==0){ ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                     <p style="color: red;" align="center">There are No Students in Your Department<?php echo $dept_name  ?>.</p>
                </div>
            </div>
           <?php
        }else{ ?>
    </div>
        
        <div class="row">
            <div class="col-md-12"> 
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">The List of <?php echo "$dept_name Students Details" ?></h3>
                        <?php include("../table-modal.php"); ?>
                    </div>
                    <div class="panel-body">
                        <table id="customers2" class="table datatable">
                            <thead>
                                <th>S/N</th>
                                <th>Passport</th>
                                <th>Student Name</th>
                                <th>Matric Number</th>
                                <th>Prev Dept</th>
                                <th>New Dept</th>
                                <th>Programme</th>
                                <th>Level</th>
                                <th>Admission Year</th>
                                <th>School</th>
                                <th>Operation</th>
                            </thead>
                            <tfoot>
                                <th>S/N</th>
                                <th>Passport</th>
                                <th>Student Name</th>
                                <th>Matric Number</th>
                                <th>Prev Dept</th>
                                <th>New Dept</th>
                                <th>Programme</th>
                                <th>Level</th>
                                <th>Admission Year</th>
                                <th>School</th>
                                <th>Operation</th>
                            </tfot>
                            <tbody><?php
                                $y =1;
                                while($new = $stu->fetch()){ 
                                    $student_matric_num = $new['student_matric_num'];
                                    $regNumber = $new['regNumber'];
                                    $now =  $student->getMatricNumber($regNumber);
                                    $deed = $student->getAdmissionStepOne($regNumber);
                                    $dept_name = $new['dept_name'];
                                    $new_dept=$new['new_dept']; ?>
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
                                        <td>
                                            <p style="color: green"><?php echo $new_dept; ?> </p>
                                        </td>
                                        <td><?php $prog_id = $new['prog_id']; $gov = $student->getProg($prog_id); echo $gov['prog_name']; ?></td>
                                        <td><?php echo $new['level']; ?></td>
                                        <td><?php echo $new['admission_year']; ?></td>
                                        <td><?php $school_id = $new['school_id'];
                                                if($school_id == 1){ ?>
                                                    <p style="color: pink">Moses And Grace</p><?php
                                                }else{ ?>
                                                    <p style="color: green">Afriford University</p><?php
                                                } ?>
                                            </td>
                                        <td>
                                            
                                            <a href="student-details.php?student_matric_num=<?php echo $student_matric_num;?>&&register_number=<?php echo $regNumber; ?>" class="btn btn-success pull-left"onclick=""><i class="glyphicon glyphicon-user"></i>More Details
                                            </a>  <br><br>
                                            <a href="student-course-registration.php?student-matric-number=<?php echo $new['student_matric_num'] ?>&&registration_number=<?php echo $regNumber;?>" class="btn btn-primary pull-left"onclick=""><i class="glyphicon glyphicon-pencil"></i>Register Course 
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
