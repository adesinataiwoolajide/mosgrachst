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
                        <img src="../icons/admissiin.jpg" style="width: 100px; height: 100px;" align="center">                    
                        <p align="center">Admission</p>
                    </div>         
                </div>                            
            </div>
            

            <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='my-activities.php';">
                    <div align="center">
                        <img src="../icons/images (2).png" style="width: 100px; height: 100px;" align="center">                    
                        <p align="center">My Activities</p>
                    </div>         
                </div>                            
            </div>
            
            <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='view-students.php';">
                    <div align="center">
                        <img src="../icons/students.jpg" style="width: 100px; height: 100px;" align="center">                    
                        <p align="center">Students by Category</p>
                    </div>         
                </div>                            
            </div>

            <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='all-school-student-details.php';">
                    <div align="center">
                        <img src="../icons/students.jpg" style="width: 100px; height: 100px;" align="center">                    
                        <p align="center">View All Students </p>
                    </div>         
                </div>                            
            </div>
           
            <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='';">
                    <div align="center">
                        <img src="../icons/284454.png" style="width: 100px; height: 100px;" align="center">                    
                        <p align="center">Medical Facilities</p>
                    </div>         
                </div>                            
            </div>
            <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='';">
                    <div align="center">
                        <img src="../icons/images (8).jpg" style="width: 100px; height: 100px;" align="center">                    
                        <p align="center">School Events</p>
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