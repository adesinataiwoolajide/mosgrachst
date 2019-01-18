<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
?>
<ul class="breadcrumb">
    <li><a href="./">Home</a></li>                    
    <li><a href="add-students.php">Add Student</a></li>  
    <li><a href="all-school-student-details.php">Afriford and Moses And Grace Students</a></li>   
    <li class="active">Add New Student</li>   
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
            <form action="process-add-course.php" method="post" class="form-horizontal" enctype="multipart/form-data">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    <h3 class="panel-title"><strong>Add A </strong> New Student To The School</h3>
	                    
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
		                            
		                            <div class="widget widget-default widget-item-icon" onclick="location.href='add-student-biodata.php?school_name=<?php echo $see_School['school_name']; ?>&&school_identification=<?php echo $school_id; ?>';">
					                    <div align="center"><?php
					                    	if($school_id ==1){ ?>
						                        <img src="../../images/form-logo.png" alt="Moses And Grace " style="width: 450px; height: 100px; "> <?php
						                    }else{ ?>
						                    	<img src="../../images/afriweblogo.jpg" alt="Afriford University" style="width: 450px; height: 100px; "><?php
						                    }  ?>                
					                        <h4><p align="center" style="color: green"><b><?php echo $see_School['school_name']; ?></b></p></h4>
					                    </div>         
					                </div>                  
		                            <span class="help-block" style="color: red;">Please Click on The Student School.</span>
		                        </div><?php
		                    } ?>  
	                        
	                        
	                    </div>
	                </div>

	                
	            </div>
            </form>
        </div>

    </div>             
</div>        
        
<?php
    include("../log-out-modal.php");
	include("../footer.php");
?>