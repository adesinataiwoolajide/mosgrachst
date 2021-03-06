<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
    include("../super-admin/libs_dev/staffs/staff_class.php");
    $staff_details = new schoolStaffs($db);
    $staff_email = $_SESSION['user_name'];
    
?>
<ul class="breadcrumb">
    <li><a href="./">Home</a></li>                    
    <li><a href="add-departmental-courses.php">Add Course to Department</a></li>  
    <li><a href="view-departmental-courses.php">View Departmental Courses</a></li>  
    <li><a href="delete-departmental-courses.php">Delete Departmental Courses</p></a></li>  
    <li class="active">Add Departmental Courses</li>   
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
            $admit = $db->prepare("SELECT * FROM school_course ORDER BY course_code ASC");
            $admit->execute();
            if($admit->rowCount()<1){ ?>
                <p align="center" style="color: red">The School Course List Is Empty</p><?php
            }else{ ?>


                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"> School Course List</h3>
                        <?php include("../table-modal.php"); ?>
                    </div>
                    <div class="panel-body">
                        <form action="process-add-departmental-courses.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <select class="form-control" name="dept_id" required>
                                <option value="">-- Select The School Department --</option>
                                <option value=""></option><?php
                                $dept = $db->prepare("SELECT * FROM department ORDER BY dept_name ASC");
                                $dept->execute();
                                while($see_dept = $dept->fetch()){ ?>
                                    <option value="<?php echo $see_dept['dept_id']; ?>"><?php echo $see_dept['dept_name']; ?></option><?php
                                } ?>
                            </select>
                            <table id="customers2" class="table datatable">
                            	<thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>COURSE TITLE</th>
                                        <th>COURSE CODE</th>
                                        <th>COURSE UNIT</th>
                                        <th>COURSE STATUS</th>
                                        <th>OPERATION</th>
                                     </tr>  
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>S/N</th>
                                        <th>COURSE TITLE</th>
                                        <th>COURSE CODE</th>
                                        <th>COURSE UNIT</th>
                                        <th>COURSE STATUS</th>
                                        <th>OPERATION</th>
                                     </tr>  
                                </tfoot>
                                <tbody> <?php                                    
                                    $y =1;
                                    while($see = $admit->fetch()){
                                        $course_id = $see['course_id'];?>
                                        <tr>
                                            <td><?php echo $y; ?></td>
                                            <td><?php echo $see['course_title']; ?></td>
                                            <td><?php echo $see['course_code']; ?></td>
                                            <td><?php echo $see['course_unit']; ?></td>
                                            <td><?php echo $see['course_status']; ?></td>
                                            <td>
                                                <input type="checkbox" name="add_course<?php echo $y; ?>"  value="<?php echo 1 ?>">
                                               Add Course
                                            </td>
                                            <input type="hidden" name="course_id<?php echo $y; ?>" value="<?php echo $course_id; ?>">
                                        </tr><?php $y++;
                                    } ?>  
                                </tbody>
                            </table>
                            <div class="col-sm-12" align="center">
                                <div class="md-form-group">
                                    <input type="hidden" name="show" value="<?php echo $y; ?>">
                                    <button type="submit" class="btn btn-success">ADD COURSES TO THE DEPARTMENT</button>
                                </div>
                            </div>
                        <form>
                    </div>
                </div><?php
            } ?>
        </div>
    </div>             
</div>  

<?php
    include("../log-out-modal.php");
	include("../table-footer.php");
?>
