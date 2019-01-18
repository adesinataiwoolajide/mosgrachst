<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
    require("libs_dev/course/course_class.php");
    include("libs_dev/department/department-class.php");
    include("libs_dev/staffs/staff_class.php");
    $staff_details = new schoolStaffs($db);
    $staff_email = $_SESSION['user_name'];
    $staff = $staff_details->gettingStafftEmail($staff_email);
    // $dept_id = $staff['dept_id'];
    // $staff_number =$staff['staff_number'];
    // $staff_name = $staff['staff_name'];
    $course = new addNewSchoolCourse($db);
    $department = new schoolDepartment($db);
    $deptCourse = new departmentalCourses($db);

    
?>
<ul class="breadcrumb">
   <ul class="breadcrumb">
        <li><a href="./">Home</a></li>                    
        <li><a href="select-result.php">Course Result Panel</a></li> 
        <li><a href="view-all-students-results.php">View All Results</a></li> 
        <li><a href="result-panel.php">Students Results Panel</a></li>  
        <li class="active">Course Results</li>    
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

                $query = $db->prepare("SELECT * FROM course_allocation");
                $query->execute();   
                if($query->rowCount()==0){ ?>
                    <h3><p align="center" style="color: red">No Courses Have Been Allocated To Any Department in Your School </p></h3><?php
                }else{ ?>

                <div class="panel-heading">
                    <h3 class="panel-title"><p style="color: green;"> Below Are The Courses Allocated To You School Department</p></h3>
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
                                <th>Department</th>
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
                                <th>Department</th>
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
                                        <?php $oga = $staff_details->gettingStafftDetails($staff_number); ?>
                                    <td><?php    echo $oga['staff_name']; ?></td><?php
                                        $dept_course_id = $vope['dept_course_id'];
                                        $iden = $deptCourse->getDeptCourseDetails($dept_course_id);
                                        $course_id= $iden['course_id'];
                                        $coding = $course->getCourseIdentity($course_id); ?>
                                    <td><?php echo $course_code= $coding['course_code']; ?></td>
                                    <td><?php echo $coding['course_title'] ?></td>
                                    <td><?php   $dept_id = $vope['dept_id'] ; 
                                    $details = $department->getDepartmentDetails($dept_id);
                                        echo $dept_name = $details['dept_name']; ?>
                                            
                                        </td>
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
                                        } ?>
                                            
                                    </td><?php
                                   
                                    $sess = $db->prepare("SELECT * FROM session WHERE session_id=:session_id");
                                    $arrSeS = array(':session_id'=>$session_id);
                                    $sess->execute($arrSeS);
                                    $joy = $sess->fetch(); ?>
                                    <td>
                                        <a href="compute-students-results.php?course_code=<?php echo $course_code ?>&&session_identification=<?php echo $joy['session_name']; ?>&&department=<?php echo $dept_name; ?>" class="btn btn-success">Compute Result
                                        </a> <br>
                                        <a href="student-results.php?course_code=<?php echo $course_code ?>&&session_identification=<?php echo $joy['session_name']; ?>&&department=<?php echo $dept_name; ?>" class="btn btn-warning">View Result
                                        </a>
                                    </td>
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
<?php
    include("../log-out-modal.php");
    include("../table-footer.php");
?>
