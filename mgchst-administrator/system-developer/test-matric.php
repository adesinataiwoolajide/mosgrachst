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
    <li><a href="test-matric.php">Update All Password</a></li>   
    <li class="active">Update All Students Password</li>   
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
        $stu = $db->prepare("SELECT * FROM student_login");
        $stu->execute();
        if($stu->rowCount()==0){ ?>
            <p style="color: red;" align="center">The Students List is Empty.</p><?php
        }else{ ?>
    </div>
        
        <div class="row">
            <div class="col-md-12"> 
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">The List of All Students Login Details</h3>
                        <?php include("../table-modal.php"); ?>
                    </div>
                    <div class="panel-body">
                        <form action="update-new-password.php" method="post" enctype="multipart/form-data">
                            <table id="customers2" class="table datatable">
                                <thead>
                                    <th>S/N</th>
                                    <th>Matric Number</th>
                                    <th>Previous Password</th>
                                    <th>New Password</th>
                                    <th>Operation</th>
                                </thead>
                                <tfoot>
                                    <th>S/N</th>
                                    <th>Matric Number</th>
                                    <th>Previous Password</th>
                                    <th>New Password</th>
                                    <th>Operation</th>
                                </tfot>
                                <tbody><?php
                                    $y =1;
                                    while($new = $stu->fetch()){ 
                                        $student_matric_num = $new['user_name']; ?>
                                        <tr>
                                            <td><?php echo $y ?></td>
                                            <td><?php echo $matric = $student_matric_num ?></td>
                                            <td><?php echo $new['password']; ?></td>
                                            <td><?php echo sha1($matric); ?></td>
                                            <td><input type="checkbox" name="update<?php echo $y ?>" value="1">Update Matric</td>
                                        </tr>
                                        <input type="hidden" name="student_matric_num<?php echo $y ?>" value="<?php echo $matric ?>">

                                        <input type="hidden" name="student_id<?php echo $y ?>" value="<?php echo $new['student_id'] ?>"><?php
                                        $y++;
                                    }?>  
                                </tbody>
                            </table>
                            <div class="col-sm-12" align="center">
                                <div class="md-form-group">
                                    <input type="hidden" name="show" value="<?php echo $y; ?>">
                                    <button type="submit" class="btn btn-success">UPDATE PASSWORD</button>
                                </div>
                            </div>
                        </form>
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
