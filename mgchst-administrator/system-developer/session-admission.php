<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
    
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
                            <div class="widget widget-default widget-item-icon" onclick="location.href='see-session-admission.php?academic_session=<?php echo $session_name ?>';">
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
