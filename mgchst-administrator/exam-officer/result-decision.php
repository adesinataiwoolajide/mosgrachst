<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
    require("../super-admin/libs_dev/students-registration/students-registration.php");
    include("../super-admin/libs_dev/department/department-class.php");
    include("../../inc/dev/admission/admission_class.php");
?>
    <ul class="breadcrumb">
        <li><a href="./">Home</a></li>
        <li><a href="result-decision.php"> Result Decision</a></li>                    
        <li class="active">Result Decision</li>
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
                    <h3 class="panel-title" style="color: green">
                        Please Click on Your Action
                    </h3>
                </div>
                <h3><p align="center">Please Select Your Action Below</p></h3>
                
                <div class="col-md-4">
                    <div class="widget widget-default widget-item-icon" onclick="location.href='select-result.php';">
                        <div align="center">
                            <img src="../icons/images (3).png" style="width: 100px; height: 100px;" align="center">                    
                            <p align="center">Compute Result</p>
                        </div>   
                        <p style="color: green" align="center">Please Click to Compute Students Results</p>      
                    </div>                                  
                </div>
                <div class="col-md-4">
                    <div class="widget widget-default widget-item-icon" onclick="location.href='view-all-students-results.php';">
                        <div align="center">
                            <img src="../icons/downloads.jpg" style="width: 100px; height: 100px;" align="center">                    
                            <p align="center">View Results</p>
                        </div> 
                        <p style="color: green" align="center">Please Click to View Students Results</p>             
                    </div>                            
                </div>
                <div class="col-md-4">
                    <div class="widget widget-default widget-item-icon" onclick="location.href='senate-approved-result.php';">
                        <div align="center">
                            <img src="../icons/teac.jpg" style="width: 100px; height: 100px;" align="center">                    
                            <p align="center">Senate Approved Students Results</p>
                        </div> 
                        <p style="color: green" align="center">Please Click to View Sanete Approved Students Results</p>             
                    </div>                            
                </div>
                <div class="col-md-4">
                    <div class="widget widget-default widget-item-icon" onclick="location.href='bursery-approved-result.php';">
                        <div align="center">
                            <img src="../icons/teac.jpg" style="width: 100px; height: 100px;" align="center">                    
                            <p align="center">Bursery Approved Students Results</p>
                        </div> 
                        <p style="color: green" align="center">Please Click to View Bursery Approved Students Results</p>             
                    </div>                            
                </div>
                <div class="col-md-4">
                    <div class="widget widget-default widget-item-icon" onclick="location.href='hod-approved-result.php';">
                        <div align="center">
                            <img src="../icons/teac.jpg" style="width: 100px; height: 100px;" align="center">                    
                            <p align="center">HOD Approved Students Results</p>
                        </div> 
                        <p style="color: green" align="center">Please Click to View HOD Approved Students Results</p>             
                    </div>                            
                </div>
                <div class="col-md-4">
                    <div class="widget widget-default widget-item-icon" onclick="location.href='all-approved-result.php';">
                        <div align="center">
                            <img src="../icons/diploma-and-mortarboard_23-2147504572.jpg" style="width: 100px; height: 100px;" align="center">                    
                            <p align="center">All Approved Result</p>
                        </div> 
                        <p style="color: green" align="center">Please Click to View All Approve Students Results</p>        
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