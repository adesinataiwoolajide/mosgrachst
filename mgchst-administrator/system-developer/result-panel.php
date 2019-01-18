<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
?>
<ul class="breadcrumb">
    <li><a href="./">Home</a></li>                    
    <li><a href="result-panel.php">Students Results Panel</a></li>  
    <li><a href="computing-student-results.php">Compute Result</a></li>  
    <li class="active">Students Results Panel</li>   
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
                    <h3 class="panel-title"><strong>Compute </strong> Student Result</h3>
                    
                </div>
                <div class="panel-body">
                    <h2><p style="color: green">Please Select The Student School Below</p></h2>
                </div>
                <?php
                if((isset($_SESSION['success'])) OR ((isset($_SESSION['error'])) === true)){ ?>
                    <div class="alert alert-info" align="center">
                        <button class="close" data-dismiss="alert">
                            <i class="ace-icon fa fa-times"></i>
                        </button>
                     <?php include("../includes/feed-back.php"); ?>
                    </div><?php 
                }  ?> 
                <div class="panel-body form-group-separated"> 
                    <div class="form-group col-md-12"><?php      
                        $school = $db->prepare("SELECT * FROM school");
                        $school->execute(); 
                        while($see_School = $school->fetch()){ $school_id = $see_School['school_id']; ?>           
                            <div class="col-md-6 col-xs-6">                                            
                                <div class="widget widget-default widget-item-icon" onclick="location.href='approve-result.php?school_name=<?php echo $see_School['school_name']?>&&school_identification=<?php echo $school_id ?>';">
                                    <div align="center"><?php
                                        if($school_id ==1){ ?>
                                            <img src="../../images/form-logo.png" alt="Moses And Grace " style="width: 450px; height: 100px; "> <?php
                                        }else{ ?>
                                            <img src="../../images/afriweblogo.jpg" alt="Afriford University" style="width: 450px; height: 100px; "><?php
                                        }  ?>                
                                        <h4><p align="center" style="color: green"><b>
                                            <?php echo $see_School['school_name']; ?></b></p>
                                        </h4>
                                    </div>         
                                </div>                  
                                <span class="help-block" style="color: red;" align="center">Please Click on The Student School To Approve The Students Results.</span>
                            </div><?php
                        } ?>    
                    </div>
                </div>  
            </div>
        </div>
    </div>             
</div> <?php             
include("../log-out-modal.php");
include("../footer.php");
?>