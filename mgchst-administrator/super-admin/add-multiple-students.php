<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
?>
<ul class="breadcrumb">
    <li><a href="./">Home</a></li> 
    <li><a href="add-multiple-students.php">Add Multiple Students</a></li>                     
    <li><a href="add-students.php">Add Student</a></li>  
    <li><a href="all-school-student-details.php">View All Students</p></a></li>  
    <li class="active">Add Multiple Students</li>   
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
            <form action="process-add-multiple-students.php" method="post" class="form-horizontal" enctype="multipart/form-data">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    <h3 class="panel-title"><strong>Import Multiple </strong> Students Biodata Through Excel</h3>
	                    
	                </div>
	                <div class="panel-body">
	                    <p style="color: red;">Please Select An Excel File With 58 Coloumns To Add Multiple Students Details.</p>
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

	                	<div class="form-group col-md-12">
	                		<label class="col-md-1 col-xs-11 control-label">STUDENT DETAILS</label>
	                        <div class="col-md-11 col-xs-1">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
	                                <input type="file" class="form-control" name="file" placeholder="Please Enter the Course Title" required />
	                            </div>                                            
	                                                                   
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>

	                    </div>
	                    
	                </div>
	                <div class="panel-footer col-md-12">                                 
	                    <button class="btn btn-success pull-right" name="import-students">IMPORT THE STUDENTS DETAILS</button>
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