<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
    include("../super-admin/libs_dev/staffs/staff_class.php");
    require("../super-admin/libs_dev/course/course_class.php");
    $school_course = new addNewSchoolCourse($db);
    $staff_details = new schoolStaffs($db);
    $staff_email = $_SESSION['user_name'];
    $staff = $staff_details->gettingStafftEmail($staff_email);
    $dept_id = $staff['dept_id'];

    $lecturer = $db->prepare("SELECT * FROM staff WHERE dept_id=:dept_id");
    $arrLet = array(':dept_id'=>$dept_id);
    $lecturer->execute($arrLet);

    $semester = $db->prepare("SELECT * FROM semester");
	$semester->execute();

	$course = $db->prepare("SELECT * FROM departmental_courses WHERE dept_id=:dept_id");
	$arrCourse = array(':dept_id'=>$dept_id);
	$course->execute($arrCourse);

	$cou = $db->prepare("SELECT * FROM departmental_courses WHERE dept_id=:dept_id");
	$arrCou = array(':dept_id'=>$dept_id);
	$cou->execute($arrCou);

	$level = $db->prepare("SELECT * FROM level");
	$level->execute();

	$program = $db->prepare("SELECT * FROM programme");
	$program->execute();

	$session = $db->prepare("SELECT * FROM session");
	$session->execute(); 
?>
<ul class="breadcrumb">
    <li><a href="./">Home</a></li>                    
    <li><a href="allocate-lecturer-course.php">Allocate Course</a></li>  
    <li><a href="view-allocated-courses.php">View Allocated Courses</a></li> 
    <li class="active">Allocate New Course</li>   
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
            <form action="process-allocate-lecturer-courses.php" method="post" class="form-horizontal" enctype="multipart/form-data">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    <h3 class="panel-title"><strong>Departmental Course </strong> Allocation Form</h3>
	                    
	                </div>
	                <div class="panel-body">
	                    <p>Please fill the below form to Add A Course Details</p>
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
	                    	<label class="col-md-1 col-xs-6 control-label">Lecturer</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
	                                <select class="form-control " name="staff_number" required>
                                        <option value="">-- Select The Lecturer Name From The List --
                                        </option>
                                        <option value=""></option><?php
                                    	while($oga = $lecturer->fetch()){ ?>
                                    		<option value="<?php echo $oga['staff_number']; ?>"><?php echo $oga['staff_name']. " ". $oga['staff_number']; ?></option><?php
                                    	} ?>
                                        
                                    </select>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>  
	                        
	                    	<label class="col-md-1 col-xs-6 control-label">Course Code</label>
	                    	<?php
                            if($course->rowCount()==0){ ?>
                            	<p style="color: red;">No Course Has Been Added to Your Departmental Course List, Please Add Course To The Department First. Please Click <a href="add-departmental-courses.php" class="btn-success">To Add Course To Your Department</a>Thanks</p><?php
                            }else{ ?>
		                        <div class="col-md-5 col-xs-6">                                            
		                            <div class="input-group">
		                                <span class="input-group-addon"><span class="fa fa-bars"></span></span>
		                                <select class="form-control " name="dept_course_id" required>
	                                        <option value="">-- Select The Course Code From The List --
	                                        </option>
	                                        <option value=""></option><?php
	                                        while($gov = $course->fetch()){ 
	                                        	$course_id = $gov['course_id']; 
	                                        	$rov = $school_course->getCourseIdentity($course_id); ?>
	                                        	<option value="<?php echo $gov['dept_course_id']; ?>"><?php echo $rov['course_title']." ". $rov['course_code']; ?></option><?php
	                                        } ?>
	                                    </select>
		                            </div>                                            
		                            <span class="help-block" style="color: red;">This is field is Required.</span>
		                        </div><?php
		                    }?>
	                    </div>
	                    <div class="form-group col-md-12">
	                    	<label class="col-md-1 col-xs-6 control-label">Level</label>
	                        <div class="col-md-5 col-xs-5">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-times"></span></span>
	                                <select class="form-control " name="level" required>
                                        <option value="">-- Select The Level From The List --
                                        </option>
                                        <option value=""></option><?php
                                        while($see_level = $level->fetch()){ ?>
	                                        <option value="<?php echo $see_level['level_id']; ?>"><?php echo $see_level['level_name']; ?></option><?php
	                                    } ?>
                                    </select>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div> 

	                        <label class="col-md-1 col-xs-6 control-label">Programme</label>
	                        <div class="col-md-5 col-xs-5">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
	                                <select class="form-control " name="program" required>
                                        <option value="">-- Select The Level From The List --
                                        </option>
                                        <option value=""></option><?php
                                        while($see_prog = $program->fetch()){ ?>
	                                        <option value="<?php echo $see_prog['prog_id']; ?>"><?php echo $see_prog['prog_name']; ?></option><?php
	                                    } ?>
                                    </select>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div> 
	                    	
	                    </div>
	                    <div class="form-group col-md-12">
	                    	<label class="col-md-1 col-xs-6 control-label">Semester</label>
	                        <div class="col-md-5 col-xs-5">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-bars"></span></span>
	                                <select class="form-control " name="semester" required>
                                        <option value="">-- Select The Semester From The List --
                                        </option value=""><option></option><?php
                                        while($see_semester = $semester->fetch()){ ?>
	                                        <option value="<?php echo $see_semester['semester_id']; ?>"><?php echo $see_semester['semester_name']; ?></option><?php
	                                    } ?>
                                    </select>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                    	
	                    	<label class="col-md-1 col-xs-6 control-label">School Session</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-bars"></span></span>
	                                <select class="form-control " name="school_session" required>
                                        <option value="">-- Select The Session From The List --
                                        </option>
                                        <option value=""></option><?php
                                        while($see_session = $session->fetch()){ ?>
                                        	<option value="<?php echo $see_session['session_id']; ?>"><?php echo $see_session['session_name']; ?></option><?php
                                        } ?>
                                    </select>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                    </div>
	                    <input type="hidden" name="dept_id" value="<?php echo $dept_id; ?>">
	                   
	                </div>
	                <div class="panel-footer col-md-12">                                 
	                    <button class="btn btn-success pull-right" name="allocate-course">ALLOCATE THE COURSE</button>
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