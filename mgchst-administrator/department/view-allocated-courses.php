<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
    require("../super-admin/libs_dev/course/course_class.php");
    include("../super-admin/libs_dev/department/department-class.php");
    include("../super-admin/libs_dev/staffs/staff_class.php");
    require("../super-admin/libs_dev/lecturer/lecturer_class.php");
    $lecturer = new allocateNewDeptCourse($db);
    $staff_details = new schoolStaffs($db);
    $staff_email = $_SESSION['user_name'];
    $staff = $staff_details->gettingStafftEmail($staff_email);
    $dept_id = $staff['dept_id'];
    $course = new addNewSchoolCourse($db);
    $department = new schoolDepartment($db);
    $deptCourse = new departmentalCourses($db);

    $details = $department->getDepartmentDetails($dept_id);
    $dept_name = $details['dept_name'];
?>
<ul class="breadcrumb">
   <ul class="breadcrumb">
        <li><a href="./">Home</a></li>                    
        
        <li><a href="view-allocated-courses.php">View Allocated Courses</a></li> 
        <li><a href="allocate-lecturer-course.php">Allocate Course</a></li>  
        <li class="active">View Allocated Courses</li>    
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

                $query = $db->prepare("SELECT * FROM course_allocation WHERE dept_id=:dept_id");
                $arr = array(':dept_id'=>$dept_id);
                $query->execute($arr);   
                if($query->rowCount()==0){ ?>
                    <h3><p align="center" style="color: red">You Have Not Allocated Any Course To Any lecuter in the Department of <?php echo $dept_name ?> </p></h3><?php
                }else{ ?>

                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $dept_name ?> Departmental Course Allocation List</h3>
                    <?php include("../table-modal.php"); ?>
                </div>
                <div class="panel-body">
                    <table id="customers2" class="table datatable">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Staff Number</th>
                                <th>Staff Name</th>
                                <th>Course Code</th>
                                <th>Course Title</th>
                                <th>Programme</th>
                                <th>Level</th>
                                <th>Session</th>
                                <th>Semester</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S/N</th>
                                <th>Staff Number</th>
                                <th>Staff Name</th>
                                <th>Course Code</th>
                                <th>Course Title</th>
                                <th>Programme</th>
                                <th>Level</th>
                                <th>Session</th>
                                <th>Semester</th>
                                <th>Operation</th>
                                
                            </tr>
                        </tfoot>
                        <tbody><?php 
                            $y =1;
                            while($vope=$query->fetch()){  
                                $allocate_id = $vope['allocate_id']; 
                               // $foll = $course->getCourseIdentity($course_id);?>
                                <tr>
                                    <td><?php echo $y; ?></td>
                                    <td><?php echo  $staff_number = $vope['staff_number'] ; ?></td>
                                        <?php 
                                        $oga = $staff_details->gettingStafftDetails($staff_number); 
                                        $dept_course_id = $vope['dept_course_id'];
                                        $iden = $deptCourse->getDeptCourseDetails($dept_course_id);
                                        $course_id= $iden['course_id'];
                                        $ross = $course->getCourseIdentity($course_id);
                                         ?>
                                     <td><?php    echo $oga['staff_name']; ?></td>
                                    <td><?php echo $course_code= $ross['course_code'];  ?></td>
                                    <?php //$coding = $course->getCourseDetails($course_code); ?>
                                    <td><?php echo $ross['course_title'] ?></td>
                                    <td><?php  $prog_id = $vope['prog_id'] ?>
                                    <?php $yelo = $department->getProgramme($prog_id); ?>
                                    <?php echo $yelo['prog_name']; ?></td>
                                    <td><?php $level_id = $vope['level_id'];  
                                        if($level_id ==1){
                                            echo "100";
                                        }elseif($level_id ==2){
                                            echo "200";
                                        }elseif($level_id ==3){
                                            echo "300"; 
                                        }elseif($level_id ==4){
                                            echo "400"; 
                                        
                                        }elseif($level_id ==5){
                                            echo "500"; 
                                        }else{
                                            echo "600";
                                        } ?></td>
                                    <td><?php 
                                        $session_id= $vope['session_id'];
                                        $sess = $db->prepare("SELECT * FROM session WHERE session_id=:session_id");
                                        $arrSeS = array(':session_id'=>$session_id);
                                        $sess->execute($arrSeS);
                                        while($foll = $sess->fetch()){
                                            echo $foll['session_name'];
                                        }
                                     ?>
                                         
                                     </td>
                                    <td><?php $semester_id = $vope['semester_id'];
                                        if($semester_id ==1){
                                            echo "First Semester";
                                        }else{
                                            echo "Second Semester";
                                        } ?></td>
                                   
                                    <td><a href="edit-allocated-course.php?allocation_identity=<?php echo $allocate_id; ?>" class="btn btn-success" id="" title="Edit" onclick="return(confirmToEdit());"><i class="glyphicon glyphicon-pencil"></i>
                                        </a>
                                        <a href="delete-allocation.php?course_code=<?php echo $course_code?>&&staff_number=<?php echo $staff_number?>&&allocate_id=<?php echo $allocate_id; ?>" class="btn btn-danger" title="Delete" onclick="return(confirmToDelete());"><i class="glyphicon glyphicon-trash"></i>
                                        </a></td>
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
        return confirm("Click Okay to Delete Allocation Details and Cancel to Stop");
    }
</script>

<script>
    function confirmToEdit(){
        return confirm("Click okay to Edit Allocation and Cancel to Stop");
    }
</script>      

<?php
    include("../log-out-modal.php");
	include("../table-footer.php");
?>
