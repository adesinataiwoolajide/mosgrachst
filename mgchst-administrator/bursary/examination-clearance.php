<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
?>
<ul class="breadcrumb">
    <li><a href="./">Home</a></li>                    
    <li><a href="examination-clearance.php">Examination Clearance</a></li> 
    <li><a href="">View Clearance List</a></li>  
    <li><a href="">Cancel Examination Clearance</p></a></li>   
    <li class="active">Examination Clearance</li>   
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
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Student Examination Clearance</h3>
                    <?php //include("../table-modal.php"); ?>
                </div>
                <div class="panel-body">
                    <p align="center" style="color: green">Click on The School Academic Session To Prepare The Students Examination Clearance</p><?php
                    $reg = $db->prepare("SELECT * FROM session ORDER BY session_name ASC");
                    $reg->execute();
                    while($see_reg = $reg->fetch()){ 
                        $session_name = $see_reg['session_name']; 
                        $session_id = $see_reg['session_id']; ?>
                        <div class="col-md-3">
                            <div class="widget widget-default widget-item-icon" onclick="location.href='academic-sessions-exam-clearance.php?session_name=<?php echo $session_name ?>&&academic-session=<?php echo$session_id ?>';">
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
	include("../table-footer.php");
?>
