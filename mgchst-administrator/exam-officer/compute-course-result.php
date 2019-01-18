<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
    require("../super-admin/libs_dev/course/course_class.php");
    include("../super-admin/libs_dev/department/department-class.php");
    include("../super-admin/libs_dev/staffs/staff_class.php");
    $staff_details = new schoolStaffs($db);
    $staff_email = $_SESSION['user_name'];
    
    
    $course = new addNewSchoolCourse($db);
    $department = new schoolDepartment($db);
    $deptCourse = new departmentalCourses($db);

    $department = $db->prepare("SELECT * FROM department ORDER BY dept_name ASC");
    $department->execute();

    $semester = $db->prepare("SELECT * FROM semester");
	$semester->execute();

	$level = $db->prepare("SELECT * FROM level");
	$level->execute();

	$program = $db->prepare("SELECT * FROM programme");
	$program->execute();

	$session = $db->prepare("SELECT * FROM session");
	$session->execute(); 

	$query = $db->prepare("SELECT * FROM school_course ORDER BY course_code");
    //$arr = array(':dept_id'=>$dept_id, ':staff_number'=>$staff_number);
    $query->execute();  
?>
<ul class="breadcrumb">
   <ul class="breadcrumb">
        <li><a href="./">Home</a></li>                    
        
        <li><a href="compute-course-result.php">Compute Multiple Result</a></li> 
        <li><a href="computing-student-results.php">Course Individual Result</a></li> 
        <li><a href="result-decision.php">Result Panel</a></li> 
        <li class="active">Compute Result</li>    
    </ul> 
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
            <form action="compute-students-results.php" method="post" class="form-horizontal" enctype="multipart/form-data">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    <h3 class="panel-title"><strong>Compute </strong> Students Results</h3>
	                    
	                </div>
	                <div class="panel-body">
	                    <p>Please fill the below form to Compute Your Course Result</p>
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
	                    	<label class="col-md-1 col-xs-6 control-label">Course Code</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-times"></span></span>
	                                <select class="form-control " name="course_code" required>
                                        <option value="">-- Select The Course Code From The List From The List --
                                        </option>
                                        <option value=""></option><?php
				                    	while($rest =$query->fetch()){ 
				                    		$course_code = $rest['course_code'] ; 
				                    		$course_title = $rest['course_title'];
				                    		//$delo = $course->getCourseDetails($course_code);?>
	                                        <option value="<?php echo $course_code; ?>">
	                                        	<?php echo $course_title. " ". $course_code; ?>
	                                        		
	                                        </option><?php
	                                    } ?>
                                    </select>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div> 

	                        <label class="col-md-1 col-xs-6 control-label">Department</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-times"></span></span>
	                                <select class="form-control " name="dept_name" required>
                                        <option value="">-- Select The Department From The List From The List --
                                        </option>
                                        <option value=""></option><?php
				                    	while($see_dept =$department->fetch()){ 
				                    		?>
	                                        <option value="<?php echo $see_dept['dept_id']; ?>">
	                                        	<?php echo $see_dept['dept_name']; ?>
	                                        		
	                                        </option><?php
	                                    } ?>
                                    </select>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div> 

	                    </div>
	                    <div class="form-group col-md-12">

	                    	
	                        <label class="col-md-1 col-xs-6 control-label">Academic Session</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-bars"></span></span>
	                               <select class="form-control " name="session_id" required>
                                        <option value="">-- Select The Session From The List --
                                        </option value=""><option></option><?php
                                        while($see_session = $session->fetch()){ ?>
	                                        <option value="<?php echo $see_session['session_id']; ?>"><?php echo $see_session['session_name']; ?></option><?php
	                                    } ?>
                                    </select>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div> 
	                        <label class="col-md-1 col-xs-6 control-label">Level</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-sitemap"></span></span>
	                                <select class="form-control " name="level_id" required>
                                        <option value="">-- Select The Level From The List --
                                        </option value=""><option></option><?php
                                        while($see_level = $level->fetch()){ ?>
	                                        <option value="<?php echo $see_level['level_id']; ?>"><?php echo $see_level['level_name']; ?></option><?php
	                                    } ?>
                                    </select>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                       
	                    	
	                    </div>

	                   
	                    <div class="form-group col-md-12">
	                    	
	                        <label class="col-md-1 col-xs-12 control-label">Programme</label>
	                        <div class="col-md-11 col-xs-11">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-smile-o"></span></span>
	                               <select class="form-control " name="prog_id" required>
                                        <option value="">-- Select The Programme From The List --
                                        </option value=""><option></option><?php
                                        while($see_pro = $program->fetch()){ ?>
	                                        <option value="<?php echo $see_pro['prog_id']; ?>"><?php echo $see_pro['prog_name']; ?></option><?php
	                                    } ?>
                                    </select>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>  
	                    </div>
	                </div>
	                <div class="panel-footer col-md-12">                                 
	                    <button class="btn btn-success pull-right" name="compute-result">COMPUTE THE COURSE RESULT</button>
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