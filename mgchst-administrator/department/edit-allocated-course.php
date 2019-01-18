<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
    include("../super-admin/libs_dev/staffs/staff_class.php");
    include("../super-admin/libs_dev/department/department-class.php");
    require("../super-admin/libs_dev/course/course_class.php");
     require("../super-admin/libs_dev/lecturer/lecturer_class.php");
    $school_course = new addNewSchoolCourse($db);
    $staff_details = new schoolStaffs($db);
    $lecturer = new allocateNewDeptCourse($db);
    $deptCourse = new departmentalCourses($db);
    $department = new schoolDepartment($db);
    $staff_email = $_SESSION['user_name'];
    $staff = $staff_details->gettingStafftEmail($staff_email);
    $dept_id = $staff['dept_id'];

    $allocation_id = $_GET['allocation_identity'];
    $allocate = $lecturer->getAllocationDetails($allocation_id);

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
    <li><a href="edit-allocated-course.php?allocation_identity=<?php echo $allocate_id; ?>">Allocate Course</a></li>                   
    <li><a href="allocate-lecturer-course.php">Edit Allocated Course</a></li>  
    <li><a href="view-allocated-courses.php">View Allocated Courses</a></li> 
    <li class="active">Edit Allocated Course</li>   
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
            <form action="update-allocated-course.php" method="post" class="form-horizontal" enctype="multipart/form-data">
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
	                                	<?php 
	                                		$staff_number = $allocate['staff_number'];
	                                		$oga = $staff_details->gettingStafftDetails($staff_number); ?>
                                        <option value="<?php echo $staff_number; ?>"><?php echo $oga['staff_name'] ?>
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
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-bars"></span></span>
	                                <select class="form-control " name="course_id" required>
	                                	<?php 
	                                	// $course_code = $allocate['course_code'];
	                                	// $deep = $school_course->getCourseDetails($course_code);
	                                	// $idd = $deep['course_id'];
	                                	$dept_course_id = $allocate['dept_course_id'];
                                        $iden = $deptCourse->getDeptCourseDetails($dept_course_id);
                                        $course_id= $iden['course_id'];
                                        $ross = $school_course->getCourseIdentity($course_id);
	                                	 ?>
                                       <option value="<?php echo $course_id; ?>">
                                       		<?php echo $ross['course_title']. " ". $ross['course_code']; ?></option>
                                        <option value=""></option><?php
                                        while($gov = $course->fetch()){ 
                                        	$course_id = $gov['course_id']; 
                                        	$rov = $school_course->getCourseIdentity($course_id);
                                        	 ?>
                                        	
                                        	<option value="<?php echo $course_id; ?>"><?php echo $rov['course_title']. " ". $rov['course_code']; ?></option><?php
                                        } ?>
                                    </select>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                    </div>
	                    <div class="form-group col-md-12">
	                    	<label class="col-md-1 col-xs-4 control-label">Level</label>
	                        <div class="col-md-3 col-xs-4">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-times"></span></span>
	                                <select class="form-control " name="level" required>
	                                	<?php $level_id = $allocate['level_id']; 
	                                	if($level_id ==1){
                                            	$lop= "100";
	                                        }elseif($level_id ==2){
	                                            $lop= "200";
	                                        }elseif($level_id ==3){
	                                            $lop= "300"; 
	                                        }elseif($level_id ==4){
	                                            $lop= "400"; 
	                                        
	                                        }elseif($level_id ==5){
	                                            $lop ="500"; 
	                                        }else{
	                                            $lop= "600";
	                                        } ?>
                                        <option value="<?php echo $level_id; ?>"><?php  echo $lop;
                                        	?>
                                        </option>
                                        <option value=""></option><?php
                                        while($see_level = $level->fetch()){ ?>
	                                        <option value="<?php echo $see_level['level_id']; ?>"><?php echo $see_level['level_name']; ?></option><?php
	                                    } ?>
                                    </select>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div> 

	                        <label class="col-md-1 col-xs-4 control-label">Programme</label>
	                        <div class="col-md-3 col-xs-4">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
	                                <select class="form-control " name="program" required><?php
	                                	$prog_id = $allocate['prog_id'];
                                    	$yelo = $department->getProgramme($prog_id); ?>
                                    
                                        <option value="<?php echo $prog_id; ?>"><?php echo $yelo['prog_name']; ?>
                                        </option>
                                        <option value=""></option><?php
                                        while($see_prog = $program->fetch()){ ?>
	                                        <option value="<?php echo $see_prog['prog_id']; ?>"><?php echo $see_prog['prog_name']; ?></option><?php
	                                    } ?>
                                    </select>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div> 
	                    	<label class="col-md-1 col-xs-4 control-label">Semester</label>
	                        <div class="col-md-3 col-xs-4">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-bars"></span></span>
	                                <select class="form-control " name="semester" required><?php
	                                	$semester_id = $allocate['semester_id'];
	                                	$sess = $db->prepare("SELECT * FROM semester WHERE semester_id=:semester_id");
                                        $arrSeS = array(':semester_id'=>$semester_id);
                                        $sess->execute($arrSeS);
                                        while($foll = $sess->fetch()){ ?>
                                        	<option value="<?php echo $semester_id; ?>"><?php echo $foll['semester_name']; ?>
	                                        </option>
	                                        <option value=""></option><?php
	                                        while($see_semester = $semester->fetch()){ ?>
		                                        <option value="<?php echo $see_semester['semester_id']; ?>"><?php echo $see_semester['semester_name']; ?></option><?php
		                                    } 
		                                }?>
                                    </select>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                    </div>
	                    <div class="form-group col-md-12">
	                    	
	                    	
	                    	<label class="col-md-1 col-xs-12 control-label">School Session</label>
	                        <div class="col-md-11 col-xs-12">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-bars"></span></span>
	                                <select class="form-control " name="school_session" required>
	                                	<?php 
	                                	$session_id= $allocate['session_id'];
                                        $sess = $db->prepare("SELECT * FROM session WHERE session_id=:session_id");
                                        $arrSeS = array(':session_id'=>$session_id);
                                        $sess->execute($arrSeS);
                                        while($fol = $sess->fetch()){ ?>
	                                        <option value="<?php echo $session_id; ?>"><?php echo $fol['session_name']; ?>
	                                        	
	                                        </option><?php
	                                    }?>
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
	                    <input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
	                    <input type="hidden" name="previous" value="<?php echo $staff_number; ?>">
	                   	<input type="hidden" name="allocation_id" value="<?php echo $allocation_id; ?>">
	                </div>
	                <div class="panel-footer col-md-12">                                 
	                    <button class="btn btn-success pull-right" name="allocate-course">UPDATE ALLOCATED COURSE</button>
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