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
                <div class="widget widget-default widget-item-icon" onclick="location.href='my-courses.php';">
                    <div align="center">
                        <img src="../icons/Ebooks.jpg" style="width: 100px; height: 100px;" align="center">                    
                        <p >My Courses</p>
                    </div>         
                </div>                            
            </div>
            
            <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='compute-course-result.php';">
                    <div align="center">
                        <img src="../icons/Ebooks.jpg" style="width: 100px; height: 100px;" align="center">                    
                        <p >Student Results</p>
                    </div>         
                </div>                            
            </div>

             <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='admission-list.php';">
                    <div align="center">
                        <img src="../icons/admissiin.jpg" style="width: 100px; height: 100px;" align="center">                    
                        <p align="center">Students Transcript</p>
                    </div>         
                </div>                            
            </div>
            <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='view-departmental-lecturers.php';">
                    <div align="center">
                        <img src="../icons/students.jpg" style="width: 100px; height: 100px;" align="center">                    
                        <p align="center">Messages</p>
                    </div>      
                </div>                            
            </div>
            

            <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='';">
                    <div align="center">
                        <img src="../icons/images (1).jpg" style="width: 100px; height: 100px;" align="center">                    
                        <p align="center">Bulletin</p>
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