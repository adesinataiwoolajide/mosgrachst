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
                <div class="widget widget-default widget-item-icon" onclick="location.href='view-departmental-courses.php';">
                    <div align="center">
                        <img src="../icons/Ebooks.jpg" style="width: 100px; height: 100px;" align="center">                    
                        <p >Department Courses</p>
                    </div>         
                </div>                            
            </div>
            
            <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='allocate-lecturer-course.php';">
                    <div align="center">
                        <img src="../icons/Ebooks.jpg" style="width: 100px; height: 100px;" align="center">                    
                        <p >Allocate Courses</p>
                    </div>         
                </div>                            
            </div>

             <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='session-admission.php';">
                    <div align="center">
                        <img src="../icons/admissiin.jpg" style="width: 100px; height: 100px;" align="center">                    
                        <p align="center">New Admitted Students</p>
                    </div>         
                </div>                            
            </div>
            <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='view-departmental-lecturers.php';">
                    <div align="center">
                        <img src="../icons/students.jpg" style="width: 100px; height: 100px;" align="center">                    
                        <p align="center">Lecturer</p>
                    </div>      
                </div>                            
            </div>
            

            <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='all-students-details.php';">
                    <div align="center">
                        <img src="../icons/images (1).jpg" style="width: 100px; height: 100px;" align="center">                    
                        <p align="center">Students</p>
                    </div>         
                </div>                            
            </div>
            
            <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='students-results.php';">
                    <div align="center">
                        <img src="../icons/university-student-cap-mortar-board-and-diploma_3446-334.jpg" style="width: 100px; height: 100px;" align="center">                    
                        <p align="center">Students Results</p>
                    </div>         
                </div>                            
            </div>
            <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='';">
                    <div align="center">
                        <img src="../icons/diploma-and-mortarboard_23-2147504572.jpg" style="width: 100px; height: 100px;" align="center">                    
                        <p align="center">Transcript</p>
                    </div>         
                </div>                            
            </div>
            
            <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='';">
                    <div align="center">
                        <img src="../icons/images.png" style="width: 100px; height: 100px;" align="center">                    
                        <p align="center"> Time Table</p>
                    </div>         
                </div>                            
            </div>
            <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='';">
                    <div align="center">
                        <img src="../icons/education-connection-concept_23-2147508028.jpg" style="width: 100px; height: 100px;" align="center">                    
                        <p align="center">E-Learning</p>
                    </div>         
                </div>                            
            </div>
            
            <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='';">
                    <div align="center">
                        <img src="../icons/images.png" style="width: 100px; height: 100px;" align="center">                    
                        <p align="center">Students Transcript</p>
                    </div>         
                </div>                            
            </div>

            <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='';">
                    <div align="center">
                        <img src="../icons/images.jpg" style="width: 100px; height: 100px;" align="center"><p align="center">General Office</p>
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