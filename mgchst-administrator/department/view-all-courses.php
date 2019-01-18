<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
    require("../super-admin/libs_dev/course/course_class.php");
    $course = new addNewSchoolCourse($db);
    include("../super-admin/libs_dev/department/department-class.php");
    include("../super-admin/libs_dev/staffs/staff_class.php");
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
    <li><a href="view-all-courses.php">Manage All Courses</p></a></li>   
    <li><a href="view-departmental-courses.php">View Departmental Courses</a></li>                  
    <li><a href="add-school-course.php">Add Course</a></li> 
    <li><a href="import-multiple-courses.php">Import Multiple Course</a></li> 
    <li class="active">View All Courses</li>   
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
            <div class="panel panel-default">
                <div class="panel-heading"><?php
                $query = ("SELECT * FROM school_course WHERE dept_id=:dept_id ORDER BY course_code ASC");
                $sepp = $db->prepare($query);
                $arrSep = array(':dept_id'=>$dept_id);
                $sepp->execute($arrSep);   
                if($sepp->rowCount()==0){ ?>
                    <h3><p align="center" style="color: red">The School Course List is Empty.<br>Please Click on Add Course to add A New Course to the Course List</p></h3><?php
                }else{ ?></div>
                    <div class="panel-heading">
                        <h3 class="panel-title">School Course List</h3>
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
                                    <th>Course Status</th>
                                    <th>Department</th>
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
                                    <th>Department</th>
                                    <th>Operations </th>
                                </tr>
                            </tfoot>
                            <tbody><?php 
                                $y =1;
                                while($vope=$sepp->fetch()){  
                                    $course_id = $vope['course_id']; ?>
                                    <tr>
                                        <td><?php echo $y; ?></td>
                                        <td><?php echo $name = $vope['course_title']; ?></td>
                                        <td><?php echo $code = $vope['course_code']; ?></td>
                                        <td><?php echo $unit = $vope['course_unit']; ?></td>
                                        <td><?php echo $status = $vope['course_status']; ?></td>
                                        <td><?php $dept_id = $vope['dept_id']; $nam= $course-> DepartmentalCoursIDentitye($dept_id);
                                            echo $nam['dept_name'];
                                         ?></td>
                                        <td>
                                            <a href="edit-school-course.php?course_code=<?php echo $code; ?>" class="btn btn-success" id="" onclick="return(confirmToEdit());"><i class="glyphicon glyphicon-pencil"></i>Edit
                                            </a>
                                            <a href="delete-course-details.php?course_code=<?php echo $code; ?>&&course_identification=<?php echo $vope['course_id'];?>&&department=<?php echo $dept_name ?>" class="btn btn-danger" onclick="return(confirmToDelete());"><i class="glyphicon glyphicon-trash"></i>Delete
                                            </a>
                                            
                                        </td>
                                    </tr><?php  $y++;
                                } ?>
                                </tbody>
                        </table> 
                    </div><?php
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
