<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
    include("../../inc/dev/admission/admission_class.php");
    include("../super-admin/libs_dev/department/department-class.php");
    $department = new schoolDepartment($db);
    $admin = new studentAdmission($db);
?>
<ul class="breadcrumb">
    <li><a href="./">Home</a></li>
    <li><a href="cancel-admission.php">Cancel Admission</a></li>                      
    <li><a href="admit-students.php">Admit Students</a></li>  
    <li><a href="admission-list.php">View Admitted Students</p></a></li>
      
    <li class="active"> Cancel Students Admission</li>   
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
                $admit = $db->prepare("SELECT * FROM admission_registration_step1 WHERE admission_status=1 ORDER BY surname ASC");
                $admit->execute();
                if($admit->rowCount()<1){ ?>
                    <p align="center" style="color: red">The Admission Registration List is Empty</p><?php
                }else{ ?>


                    <div class="panel-heading">
                        <h3 class="panel-title">Admission List.</h3>
                        <?php include("../table-modal.php"); ?>
                    </div>
                    <div class="panel-body">
                        <form action="process-cancel-admission.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <table id="customers2" class="table datatable">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>APPLICATION NUM </th>
                                        <th>FULL NAME</th>
                                        <th>DEPARTMENT</th>
                                        <th>PROGRAMME</th>
                                        <th>COURSE OF STUDY</th>
                                        <th>LEVEL</th>
                                        <th>ADMISSION YEAR</th>
                                        <th>OPERATION</th>
                                     </tr>  
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>S/N</th>
                                        <th>APPLICATION NUM </th>
                                        <th>FULL NAME</th>
                                        <th>DEPARTMENT</th>
                                        <th>PROGRAMME</th>
                                        <th>COURSE OF STUDY</th>
                                        <th>LEVEL</th>
                                        <th>ADMISSION YEAR</th>
                                        <th>OPERATION</th>
                                     </tr>  
                                </tfoot>
                                <tbody> <?php
                                    
                                    $y =1;
                                    while($see = $admit->fetch()){

                                        $regNumber = $see['regNumber'];
                                        $procourse_id= $see['procourse_id'];
                                        $details = $admin->getingIdentification($procourse_id);
                                        ?>
                                        <tr>
                                            <td><?php echo $y; ?></td>
                                            <td><?php echo $regNumber; ?></td>
                                            <?php $depp = $admin->getAdmissionStepOne($regNumber); ?>
                                            <td><?php echo $see['surname']. " ".$see['other_names']; ?></td>
                                            <td><?php $dept_id = $details['dept_id']; $get = $department->getDepartmentDetails($dept_id); echo $get['dept_name']; ?></td>
                                            <td><?php echo $details['prog_course']; ?></td>
                                            <td><?php $prog_id = $depp['prog_id']; 
                                                $prof = $department->getProgramme($prog_id); 
                                                echo $prof['prog_name'];    ?>
                                            </td><?php $tope= $admin->getMatricNumber($regNumber); ?>
                                            <td><?php echo $tope['level']; ?></td>
                                            
                                            <td><?php echo $tope['admission_year']; ?></td>
                                            <td>
                                                <input type="checkbox" name="cancel<?php echo $y; ?>"  value="1">
                                                Cancel Admission
                                            </td>
                                            <input type="hidden" name="regNumber<?php echo $y; ?>" value="<?php echo $regNumber; ?>">
                                            <input type="hidden" name="dept_id<?php echo $y; ?>" value="<?php echo $get['dept_id']; ?>">
                                            <input type="hidden" name="prog_course<?php echo $y; ?>" value="<?php echo $details['prog_course']; ?>">
                                            <input type="hidden" name="level<?php echo $y; ?>" value="<?php echo "100" ?>">
                                            <input type="hidden" name="prog_id<?php echo $y; ?>" value="<?php echo $prog_id; ?>">
                                        </tr><?php $y++;
                                    } ?>  
                                   
                                </tbody>
                            </table>
                            <div class="col-sm-12" align="center">
                                <div class="md-form-group">
                                    <input type="hidden" name="show" value="<?php echo $y; ?>">
                                    <button type="submit" class="btn btn-success">CANCEL STUDENTS ADMISSION</button>
                                </div>
                            </div>
                        <form>
                    </div><?php
                } ?>
            </div>
        </div>
    </div>             
</div>  


<?php
    include("../log-out-modal.php");
    include("../table-footer.php");
?>
