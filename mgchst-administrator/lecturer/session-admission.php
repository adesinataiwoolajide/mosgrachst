<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
    include("../../inc/dev/admission/admission_class.php");
    require("../super-admin/libs_dev/students-registration/students-registration.php");
    require("../super-admin/libs_dev/course/course_class.php");
    include("../super-admin/libs_dev/department/department-class.php");
    include("../super-admin/libs_dev/staffs/staff_class.php");
    $department = new schoolDepartment($db);
    $admin = new studentAdmission($db);
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
        <li><a href="./">Home</a></li>
        <li><a href="session-admission.php">Session Admission</a></li>
        <li><a href="admit-students.php">Admit Students</a></li>  
        <li><a href="cancel-admission.php">Cancel Admission</a></li>  
        <li><a href="admission-list.php">View Admitted Students</p></a></li>   
        <li class="active">SESSION ADMISSION</li>
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
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12"> 
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: green"> </h3>
                    <?php include("../table-modal.php"); ?>
                </div>
                <div class="panel-body"><?php
                    $ses = $db->prepare("SELECT * FROM session ORDER BY session_name ASC");
                    $ses->execute();
                    while($see = $ses->fetch()){ 
                        $session_name = $see['session_name']; 
                        $session_id = $see['session_id']; ?>
                        <div class="col-md-3">
                            <div class="widget widget-default widget-item-icon" onclick="location.href='see-session-admission.php?department=<?php echo $dept_name ?>&&academic_session=<?php echo $session_name ?>';">
                                <div align="center">
                                    <img src="../icons/diploma-and-mortarboard_23-2147504572.jpg" style="width: 100px; height: 100px;" align="center">                    
                                    <p align="center"><?php echo $see['session_name']. " Acedemic Session" ?></p>
                                </div> 
                                <p style="color: green" align="center">Please Click to See Admission List</p>        
                            </div>                            
                        </div><?php
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
