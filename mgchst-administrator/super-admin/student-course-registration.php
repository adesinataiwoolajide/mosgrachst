<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
    $student_number = $_GET['student-matric-number'];
    $regNumber = $_GET['registration_number'];
    require("libs_dev/students-registration/students-registration.php");
    include("libs_dev/department/department-class.php");
    include("../../inc/dev/admission/admission_class.php");
    
    $department = new schoolDepartment($db);
    $student = new oldStudentRegistration($db);
    $proc = new programmeCourse($db);
    $details = $student->getAdmissionStepOne($regNumber);
    $detaila3 = $student->gettingAdmission($regNumber);
    $surname =$details['surname'];
    $other_names = $details['other_names'];
    $student_email = $details['student_email'];
    $details2 = $student->getAdmissionStepTwo($regNumber);
?>
    <ul class="breadcrumb">
        <li><a href="./">Home</a></li>
        <li><a href="student-course-registration.php?student-matric-number=<?php echo $student_number ?>&&registration_number=<?php echo $regNumber;?>"> Course Registration</a></li>                    
        <li class="active"><?php echo "$surname $other_names "?>  Course Registration</li>
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
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title" style="color: green"><?php echo strtoupper("Please Click on The Academic session to Register Courses for $surname $other_names" );?> 
                    </h3>
                </div><br><br><?php
                $reg = $db->prepare("SELECT * FROM session ORDER BY session_name ASC");
                $reg->execute();
                while($see_reg = $reg->fetch()){ $session_name = $see_reg['session_name']; ?>
                    <div class="col-md-3">
                        <div class="widget widget-default widget-item-icon" onclick="location.href='course-registration.php?student-matric-number=<?php echo $student_number ?>&&registration_number=<?php echo $regNumber;?>&&session_name=<?php echo $session_name ?>&&academic-session=<?php echo $see_reg['session_id']; ?>';">
                            <div align="center">
                                <img src="../icons/Ebooks.jpg" style="width: 100px; height: 100px;" align="center">                    
                                <p ><?php echo $session_name. " Academic Session"; ?></p>
                            </div>         
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
	include("../footer.php");
?>