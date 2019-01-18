<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
    require("../super-admin/libs_dev/course/course_class.php");
    include("../super-admin/libs_dev/department/department-class.php");
    include("../super-admin/libs_dev/staffs/staff_class.php");
    $staff_details = new schoolStaffs($db);
    $staff_email = $_SESSION['user_name'];

    //$department = new schoolDepartment($db);
    //$admin = new studentAdmission($db);
    $staff_details = new schoolStaffs($db);
    $staff_email = $_SESSION['user_name'];
    $staff = $staff_details->gettingStafftEmail($staff_email);
    $dept_id = $staff['dept_id'];
    $staff_number =$staff['staff_number'];
    $staff_name = $staff['staff_name'];
    $course = new addNewSchoolCourse($db);
    $department = new schoolDepartment($db);
    $deptCourse = new departmentalCourses($db);
    $details = $department->getDepartmentDetails($dept_id);
    $dept_name = $details['dept_name'];   
?>
<ul class="breadcrumb">
   <ul class="breadcrumb">
        <li><a href="./">Home</a></li>                    
        <li><a href="view-departmental-courses.php">View Departmental Courses</a></li> 
        <li><a href="add-departmental-courses.php">Add Course</a></li>   
        <li><a href="delete-departmental-courses.php">Delete Departmental Courses</p></a>
            <li><a href="view-all-courses.php">Manage Departmental Courses</p></a></li>  
    </ul> 
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
            <div class="panel panel-default"><?php

                $query = $db->prepare("SELECT * FROM departmental_courses WHERE dept_id=:dept_id ORDER BY dept_id ASC");
                $rr = array(':dept_id'=>$dept_id);
                $query->execute($rr);   
                if($query->rowCount()==0){ ?>
                    <h3><p align="center" style="color: red">Departmental Course List is Empty<br>Please Click on Add Course to add A New Course to the Departmental Course List</p></h3><?php
                }else{ ?>

                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $dept_name ?> Departmental Course List</h3>
                    <?php include("../table-modal.php"); ?>
                </div>
                <div class="panel-body">
                    <table id="customers2" class="table datatable">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Course Title</th>
                                <th>Course Code</th>
                                <th>Course Unit</th>
                                <th>Department</th>
                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S/N</th>
                                <th>Course Title</th>
                                <th>Course Code</th>
                                <th>Course Unit</th>
                                <th>Department</th>
                            </tr>
                        </tfoot>
                        <tbody><?php 
                            $y =1;
                            while($vope=$query->fetch()){  
                                $course_id = $vope['course_id']; 
                                $foll = $course->getCourseIdentity($course_id);?>
                                <tr>
                                    <td><?php echo $y; ?></td>
                                    <td><?php echo $name = strtoupper($foll['course_title']); ?></td>
                                    <td><?php echo $code = $foll['course_code']; ?></td>
                                    <td><?php echo $unit = $foll['course_unit']; ?></td>
                                    <td><?php $dept_id = $vope['dept_id'];
                                     $details = $department->getDepartmentDetails($dept_id);
                                       echo $dept_name = $details['dept_name']; ?></td>
                                </tr><?php  $y++;
                            } ?>
                        </tbody>
                    </table> <?php      
                } ?>
                </div>
            </div>
        </div>
    </div>             
</div>  
<script>
    function confirmToDelete(){
        return confirm("Click Okay to Delete User Details and Cancel to Stop");
    }
</script>

<script>
    function confirmToEdit(){
        return confirm("Click okay to Edit User and Cancel to Stop");
    }
</script>      

<?php
    include("../log-out-modal.php");
	include("../table-footer.php");
?>
