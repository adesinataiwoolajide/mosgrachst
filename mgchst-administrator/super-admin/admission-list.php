<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
    include("../../inc/dev/admission/admission_class.php");
    include("libs_dev/department/department-class.php");
    $department = new schoolDepartment($db);
    $admin = new studentAdmission($db);
?>
<ul class="breadcrumb">
    <li><a href="./">Home</a></li>  

    <li><a href="admission-list.php">View All Admitted Students</p></a></li>           
    <li><a href="admit-students.php">Admit Students</a></li>  
    <li><a href="cancel-admission.php">Cancel Admission</a></li>  
    <li class="active">View Admission By Category</li>   
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
                 <?php 
                $admit = $db->prepare("SELECT * FROM admission ORDER BY admission_year DESC");
                $admit->execute();
                if($admit->rowCount()<1){ ?>
                    <p align="center" style="color: red">No Student Have Been Admitted.<br> Please Click on Admit Students to Admit New Students</p><?php
                }else{ ?>

                    <div class="panel-heading">
                        <h3 class="panel-title">Students Admission Lists.</h3>
                        <?php include("../table-modal.php"); ?>
                    </div>
                    <div class="panel-body">
                        <form action="process-admitted-student.php" method="post">
                            <table id="customers2" class="table datatable">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>REGISTRATION NUMBER </th>
                                        <th>FULL NAME</th>
                                        <th>MATRIC NUMBER</th>
                                        <th>DEPARTMENT</th>
                                        <th>PROGRAMME</th>
                                        <th>LEVEL</th>
                                        <th>ADMISSION STATUS</th>
                                        <th>ADMISSION YEAR</th>
                                        <th>SCHOOL</th>
                                     </tr>  
                                </thead>
                                <tfoot>
                                    <tr>
                                       <th>S/N</th>
                                        <th>REGISTRATION NUMBER </th>
                                        <th>FULL NAME</th>
                                        <th>MATRIC NUMBER</th>
                                        <th>DEPARTMENT</th>
                                        <th>PROGRAMME</th>
                                        <th>LEVEL</th>
                                        <th>ADMISSION STATUS</th>
                                        <th>ADMISSION YEAR</th>
                                        <th>SCHOOL</th>
                                     </tr>  
                                </tfoot>
                                <tbody> <?php
                                    
                                    $y =1;
                                    while($see = $admit->fetch()){

                                        $regNumber = $see['regNumber'];
                                        $name = $admin->getAdmissionStepOne($regNumber);
                                        $foll = $admin->getMatricNumber($regNumber);
                                        $prog_id= $see['prog_id'];
                                        $details = $department->getProgramme($prog_id);
                                        ?>
                                        <tr>
                                            <td><?php echo $y; ?></td>
                                            <td><?php echo $regNumber; ?></td>
                                            
                                            <td><?php echo $name['surname']. " ".$name['other_names']; ?></td>
                                            <td><?php echo $see['student_matric_num']; ?></td>
                                            <td><?php echo $foll['dept_name']; ?></td>
                                           
                                            <td><?php $prog_id = $details['prog_id']; 
                                                $prof = $department->getProgramme($prog_id); 
                                                echo $prof['prog_name'];    ?>
                                            </td>
                                            <td><?php echo $see['level']; ?></td>
                                            <td><p style="color: green">Student Admitted</p>
                                            <td><?php echo $see['admission_year']; ?></td>
                                            <td><?php $school_id = $see['school_id'];
                                                if($school_id == 1){ ?>
                                                    <p style="color: pink">Moses And Grace</p><?php
                                                }else{ ?>
                                                    <p style="color: green">Afriford University</p><?php
                                                } ?>
                                            </td>
                                            </td>
                                            <input type="hidden" name="regNumber<?php echo $y; ?>" value="<?php echo $regNumber; ?>">
                                            <input type="hidden" name="dept_name<?php echo $y; ?>" value="<?php echo $details['dept_id']; ?>">
                                            <input type="hidden" name="prog_course<?php echo $y; ?>" value="<?php echo $details['prog_course']; ?>">
                                            <input type="hidden" name="level<?php echo $y; ?>" value="<?php echo "100" ?>">
                                            <input type="hidden" name="prog_id<?php echo $y; ?>" value="<?php echo $prog_id; ?>">
                                        </tr><?php $y++;
                                    } ?>  
                                   
                                </tbody>
                            </table>
                            
                        <form>
                    </div><?php
                } ?>
            </div>
        </div>
    </div>             
</div>  
<script>
    function confirmToDelete(){
        return confirm("Click okay to Delete Subject details and cancel to stop");
    }
</script>

<script>
    function confirmToEdit(){
        return confirm("Click okay to Edit Subject and cancel to stop");
    }
</script>      

<?php
    include("../log-out-modal.php");
    include("../table-footer.php");
?>
