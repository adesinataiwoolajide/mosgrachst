<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
?>
<ul class="breadcrumb">
    <li><a href="./">Home</a></li>                    
    <li><a href="add-school_course.php">Add Course</a></li>  
    <li><a href="import-multiple-courses.php">Import Multiple Course</a></li> 
    <li><a href="view-all-courses.php">View All Courses</p></a></li>  
    <li class="active">Add New Course</li>   
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
            <form action="process-import-multiple-courses.php" method="post" class="form-horizontal" enctype="multipart/form-data">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    <h3 class="panel-title"><strong>Import Multiple </strong> New Course</h3>
	                    
	                </div>
	                <div class="panel-body">
	                    <p>Please Select An Excel File With 5 Coloumn To Add Multiple Course Details (Course Title, Course Code, Course Unit, Course Status and Course Department</p>
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
	                		<label class="col-md-1 col-xs-11 control-label">COURSE TITLE</label>
	                        <div class="col-md-11 col-xs-1">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
	                                <input type="file" class="form-control" name="file" id="file" placeholder="Please Enter the Course Title" required minlength="" />
	                            </div>                                            
	                                                                   
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                        
	                    </div>

	                    
	                </div>
	                <div class="panel-footer col-md-12">                                 
	                    <button class="btn btn-success pull-right" name="adding-course">IMPORT THE COURSES</button>
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