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
                <div class="widget widget-default widget-item-icon" onclick="location.href='admission-payments-lists.php';">
                    <div align="center">
                        <img src="../icons/download (1).jpg" style="width: 100px; height: 100px;" align="center">                    
                        <div class="widget-data">
                            <div class="widget-title">Payments</div>
                        </div>
                    </div>         
                </div>                            
            </div>
            <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='';">
                    <div align="center">
                        <img src="../icons/images (1).jpg" style="width: 100px; height: 100px;" align="center">                    
                        <div class="widget-data">
                            <div class="widget-title">Staff</div>
                        </div>
                    </div>         
                </div>                            
            </div>

            <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='examination-clearance.php';">
                    <div align="center">
                        <img src="../icons/diploma-and-mortarboard_23-2147504572.jpg" style="width: 100px; height: 100px;" align="center">                    
                        <div class="widget-data">
                            <div class="widget-title">Exam Clearance</div>
                        </div>
                    </div>         
                </div>                            
            </div>
            <div class="col-md-3">
                <div class="widget widget-default widget-item-icon" onclick="location.href='';">
                    <div align="center">
                        <img src="../icons/Ebooks.jpg" style="width: 100px; height: 100px;" align="center">                    
                        <div class="widget-data">
                            <div class="widget-title">Reports</div>
                        </div>
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