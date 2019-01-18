<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
?>
    <ul class="breadcrumb">
        <li><a href="./">Home</a></li>                    
        <li class="active"></li>
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
            <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='admission-list.php';">
                    <div align="center">
                        <img src="../icons/students.jpg" style="width: 100px; height: 100px;" align="center">                    
                        <p align="center">Admission</p>
                    </div>         
                </div>                            
            </div>
            <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='all-school-student-details.php';">
                    <div align="center">
                        <img src="../icons/download (1).jpg" style="width: 100px; height: 100px;" align="center">                    
                        <p align="center"> All Students</p>
                    </div>         
                </div>                            
            </div>
            <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='view-all-school-staff.php';">
                    <div align="center">
                        <img src="../icons/course=reg (11).png" style="width: 100px; height: 100px;" align="center">                    
                        <p align="center">Staff</p>
                    </div>      
                </div>                            
            </div>
            <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='admission-payments-lists.php';">
                    <div align="center">
                        <img src="../icons/learning.png" style="width: 100px; height: 100px;" align="center">                    
                        <p align="center">Payments</p>
                    </div>         
                </div>                            
            </div>
            <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='view-all-programme-courses.php';">
                    <div align="center">
                        <img src="../icons/Ebooks.jpg" style="width: 100px; height: 100px;" align="center">                    
                        <p >Programme Courses</p>
                    </div>         
                </div>                            
            </div>
            <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='view-all-courses.php';">
                    <div align="center">
                        <img src="../icons/images (1).jpg" style="width: 100px; height: 100px;" align="center">                    
                        <p align="center">School Courses</p>
                    </div>         
                </div>                            
            </div>
            

            <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='my-activities.php';">
                    <div align="center">
                        <img src="../icons/images.jpeg" style="width: 100px; height: 100px;" align="center">                    
                        <p align="center">My Activities</p>
                    </div>         
                </div>                            
            </div>
            
            <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='view-all-departments.php';">
                    <div align="center">
                        <img src="../icons/images (2).jpeg" style="width: 100px; height: 100px;" align="center">                    
                        <p align="center">School Department</p>
                    </div>         
                </div>                            
            </div>

            <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='result-panel.php';">
                    <div align="center">
                        <img src="../icons/unnamed (1).png" style="width: 100px; height: 100px;" align="center"><p align="center">Student Result</p>
                    </div>         
                </div>                            
            </div>
            <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='view-departmental-courses.php';">
                    <div align="center">
                        <img src="../icons/unnamed (3).png" style="width: 100px; height: 100px;" align="center">                    
                        <p align="center">Departmental Courses</p>
                    </div>         
                </div>                            
            </div>
            
            <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='view-students.php';">
                    <div align="center">
                        <img src="../icons/course=reg (4).png" style="width: 100px; height: 100px;" align="center">                    
                        <p align="center">Students</p>
                    </div>         
                </div>                            
            </div>
           
            <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='';">
                    <div align="center">
                        <img src="../icons/unnamed (4).png" style="width: 100px; height: 100px;" align="center">                    
                        <p align="center">Students Transcript</p>
                    </div>         
                </div>                            
            </div>
            
        </div> 
    </div>                           
</div>            
</div>
<?php
    include("../log-out-modal.php");
	include("../footer.php");
?>