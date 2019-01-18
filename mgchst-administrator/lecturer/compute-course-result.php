<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
    require("../super-admin/libs_dev/course/course_class.php");
    include("../super-admin/libs_dev/department/department-class.php");
    include("../super-admin/libs_dev/staffs/staff_class.php");
    $staff_details = new schoolStaffs($db);
    $staff_email = $_SESSION['user_name'];
    $staff = $staff_details->gettingStafftEmail($staff_email);
    $dept_id = $staff['dept_id'];
    $staff_number =$staff['staff_number'];
    $staff_name = $staff['staff_name'];
    $course = new addNewSchoolCourse($db);
    $department = new schoolDepartment($db);
    $deptCourse = new departmentalCourses($db);

    $details = $department->getDepartmentDetails($dept_id);
    $dept_name = $details['dept_name'];

    $semester = $db->prepare("SELECT * FROM semester");
	$semester->execute();

	$level = $db->prepare("SELECT * FROM level");
	$level->execute();

	$program = $db->prepare("SELECT * FROM programme");
	$program->execute();

	$session = $db->prepare("SELECT * FROM session");
	$session->execute(); 

	$query = $db->prepare("SELECT * FROM course_allocation WHERE dept_id=:dept_id AND staff_number=:staff_number");
    $arr = array(':dept_id'=>$dept_id, ':staff_number'=>$staff_number);
    $query->execute($arr);  
?>
<ul class="breadcrumb">
   <ul class="breadcrumb">
        <li><a href="./">Home</a></li>                    
        
        <li><a href="compute-course-result.php">Compute Result</a></li> 
        <li><a href="view-computed-course-result.php">View Results</a></li> 
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
	                    	<label class="col-md-1 col-xs-12 control-label">Course Code</label>
	                        <div class="col-md-10 col-xs-12">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-times"></span></span>
	                                <select class="form-control " name="course_code" required>
                                        <option value="">-- Select The Course Code From The List From The List --
                                        </option>
                                        <option value=""></option><?php
				                    	while($rest =$query->fetch()){ 
				                    		echo $course_code = $rest['course_code'] ; 
				                    		$delo = $course->getCourseDetails($course_code);?>
	                                        <option value="<?php echo $course_code; ?>">
	                                        	<?php echo $delo['course_title']; ?>
	                                        		
	                                        </option><?php
	                                    } ?>
                                    </select>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div> 

	                    </div>
	                    <div class="form-group col-md-12">
	                       
	                    	<label class="col-md-1 col-xs-12 control-label">Session</label>
	                        <div class="col-md-10 col-xs-12">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-bars"></span></span>
	                                <select class="form-control " name="session_id" required>
                                        <option value="">-- Select The Session From The List --
                                        </option value=""><option></option><?php
                                        while($see_semester = $session->fetch()){ ?>
	                                        <option value="<?php echo $see_semester['session_name']; ?>"><?php echo $see_semester['session_name']; ?></option><?php
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