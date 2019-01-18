<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
    require("../super-admin/libs_dev/course/course_class.php");
    include("../dev/general/all_purpose_class.php");
    $course = new addNewSchoolCourse($db);
    $course_code = $_GET['course_code'];
    $details = $course->getCourseDetails($course_code);
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
            <form action="update-course-details.php" method="post" class="form-horizontal" enctype="multipart/form-data">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    <h3 class="panel-title"><strong>Course Update</strong>Form</h3>
	                    
	                </div>
	                <div class="panel-body">
	                    <p>Please fill the below form to Update Course Details</p>
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
	                                <input type="text" class="form-control" name="title" placeholder="Please Enter the Course Title" value="<?php echo $details['course_title']; ?>" required minlength="5" />
	                            </div>                                            
	                                                                   
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                        
	                    </div>

	                    <div class="form-group col-md-12">
	                    	<label class="col-md-1 col-xs-6 control-label">COURSE CODE</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
	                                <input type="text" class="form-control" name="code" placeholder="Please Enter the Course Code" required minlength="5" value="<?php echo $details['course_code']; ?>" />
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>  
	                        
	                    	<label class="col-md-1 col-xs-6 control-label">COURSE UNIT</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-calendar-o"></span></span>
	                                <input type="number" class="form-control " name="unit" placeholder="Please Enter the Course Unit" value="<?php echo $details['course_unit']; ?>" required />
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                        <input type="hidden" name="course_id" value="<?php echo $details['course_id']; ?>">
	                        <input type="hidden" name="return" value="<?php echo $_SERVER["REQUEST_URI"]; ?>">
	                    </div>
	                    <div class="form-group col-md-12">
	                    	<label class="col-md-1 col-xs-6 control-label">COURSE STATUS</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-sitemap"></span></span>
	                                <select class="form-control" required name="status">
	                                	<option value="<?php echo $details['course_status'] ?>"><?php echo $details['course_status'] ?></option>
	                                	<option value=""></option>
	                                	<option value="Compulsory">Compulsory</option>
	                                	<option value="Elective">Elective</option>
	                                	<option value="Required">Required</option>
	                                </select>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>  
	                        
	                    	<label class="col-md-1 col-xs-6 control-label">COURSE DEPT</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-calendar-o"></span></span>
	                                <select class="form-control" required name="dept_id">
	                                	<?php $dept_id = $details['dept_id']; 
	                                	$den = $course->DepartmentalCoursIDentitye($dept_id); ?>
	                                	<option value="<?php echo $details['dept_id'] ?>"><?php echo $den['dept_name']; ?></option>
	                                	<option value=""></option><?php
	                                	$dept = $db->prepare("SELECT * FROM department ORDER BY dept_name ASC");
	                                	$dept->execute();
	                                	while($see_dept = $dept->fetch()){ ?>
	                                		<option value="<?php echo $see_dept['dept_id']; ?>"><?php echo $see_dept['dept_name']; ?></option><?php
	                                	} ?>
	                                </select>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                    </div>
	                </div>
	                <div class="panel-footer col-md-12">                                 
	                    <button class="btn btn-success pull-right" name="update-course">UPDATE THE COURSE DETAILS</button>
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