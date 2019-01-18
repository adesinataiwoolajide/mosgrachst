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
    <li><a href="admit-students.php">Admit Students</a></li>  
    <li><a href="cancel-admission.php">Cancel Admission</a></li>  
    <li><a href="admission-list.php">View Admitted Students</p></a></li>  
    <li class="active">Admit Student</li>   
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
        <div class="col-md-12"> <?php 
            $admit = $db->prepare("SELECT * FROM admission_registration_step1 WHERE admission_status=0 ORDER BY surname ASC");
            $admit->execute();
            if($admit->rowCount()<1){ ?>
                <p align="center" style="color: red">The Admission Registration List is Empty</p><?php
            }else{ ?>


                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Admit Student Panel</h3>
                        <?php include("../table-modal.php"); ?>
                    </div>
                    <div class="panel-body">
                        <form action="process-admitted-student.php" method="post" class="form-horizontal" enctype="multipart/form-data">
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
                                        <th>YEAR OF ADMISSION</th>
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
                                        <th>YEAR OF ADMISSION</th>
                                        <th>OPERATION</th>
                                     </tr>  
                                </tfoot>
                                <tbody> <?php
                                    
                                    $y =1;
                                    while($see = $admit->fetch()){

                                        $regNumber = $see['regNumber'];
                                        $depp = $admin->getAdmissionStepOne($regNumber);
                                        $procourse_id= $see['procourse_id'];
                                        $details = $admin->getingIdentification($procourse_id);
                                        ?>
                                        <tr>
                                            <td><?php echo $y; ?></td>
                                            <td><?php echo $regNumber; ?></td>
                                            <td><?php echo $see['surname']. " ".$see['other_names']; ?></td>
                                            <td><?php $dept_id = $details['dept_id']; 
                                            $get = $department->getDepartmentDetails($dept_id); 
                                            echo $get['dept_name']; ?></td>

                                            <td><?php $prog_id = $depp['prog_id']; 
                                                $prof = $department->getProgramme($prog_id); 
                                                echo $prof['prog_name'];    ?>
                                            </td>
                                            <td><?php echo $details['prog_course']; ?></td>
                                            
                                            <td><input type="text" class="form-control" name="level<?php echo $y; ?>" value="<?php echo $depp['level_id']; ?>">
                                            </td>
                                            <td>
                                                <select class ="form-control" name ="year_admit<?php echo $y;?>">
                                                    <option value="">-- Please Select The Admission Year --</option>
                                                    <option value=""></option>
                                                    <option value="2020">2020</option>
                                                    <option value="2019">2019</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2015">2015</option>
                                               </select>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="topping<?php echo $y; ?>"  value="1">
                                                Grant Admission
                                            </td>
                                            <input type="hidden" name="regNumber<?php echo $y; ?>" value="<?php echo $regNumber; ?>">

                                            <input type="hidden" name="dept_id<?php echo $y; ?>" value="<?php echo $get['dept_id']; ?>">

                                            <input type="hidden" name="prog_course<?php echo $y; ?>" value="<?php echo $details['prog_course']; ?>">

                                            <input type="hidden" name="prog_id<?php echo $y; ?>" value="<?php echo $prog_id; ?>">

                                        </tr><?php $y++;
                                    } ?>  
                                   
                                </tbody>
                            </table>
                            <div class="col-sm-12" align="center">
                                <div class="md-form-group">
                                    <input type="hidden" name="show" value="<?php echo $y; ?>">
                                    <button type="submit" class="btn btn-success" name="check">ADMIT STUDENTS</button>
                                </div>
                            </div>
                        <form>
                    </div>
                </div><?php
            } ?>
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
