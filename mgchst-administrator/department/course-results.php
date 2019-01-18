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

    $course = $db->prepare("SELECT * FROM departmental_courses WHERE dept_id=:dept_id");
    $arrCourse = array(':dept_id'=>$dept_id);
    $course->execute($arrCourse);

    $program = $db->prepare("SELECT * FROM programme");
	$program->execute();

	$session = $db->prepare("SELECT * FROM session");
	$session->execute(); 
?>
<ul class="breadcrumb">
    <li><a href="./">Home</a></li>                    
    <li><a href="course-results.php">Course Result</a></li>  
    <li><a href="students-results.php">View All Resuts</p></a></li>  
    <li class="active"> Course Result</li>   
</ul>
<!-- END BREADCRUMB -->                       
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
	<div class="row">
        <div class="col-md-12"> 
            <form action="see-course-results.php" method="post" class="form-horizontal" enctype="multipart/form-data">
	            <div class="panel panel-default">
	                <div class="panel-heading">
                        <h3 class="panel-title"><strong>Course  </strong> Broadsheet</h3>
                        
                    </div>
                    <div class="panel-body">
                        <p align="center" style="color: green">Please Select the Course Code and The Academic Session</p>
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
	                	<!--  -->  
	                    <div class="form-group">
	                        <label class="col-md-1 col-xs-12 control-label">Course Code</label>
	                        <?php
	                        if($course->rowCount()==0){ ?>
	                            <p style="color: red;">No Course Has Been Added to Your Departmental Course List, Please Add Course To The Department First. Please Click <a href="add-departmental-courses.php" class="btn-success">To Add Course To Your Department</a>Thanks</p><?php
	                        }else{ ?>
	                            <div class="col-md-10 col-xs-10">                                            
	                                <div class="input-group">
	                                    <span class="input-group-addon"><span class="fa fa-bars"></span></span>
	                                    <select class="form-control " name="course_code" required>
	                                        <option value="">-- Select The Course Code From The List --
	                                        </option>
	                                        <option value=""></option><?php
	                                        while($gov = $course->fetch()){ 
	                                            $course_id = $gov['course_id']; 
	                                            $rov = $school_course->getCourseIdentity($course_id); ?>
	                                            
	                                            <option value="<?php echo $gov['dept_course_id']; ?>"><?php echo $rov['course_title']. " ". $rov['course_code']; ?></option><?php
	                                        } ?>
	                                    </select>
	                                </div>                                            
	                                <span class="help-block" style="color: red;">This is field is Required.</span>
	                            </div><?php
	                        }?>
	                    </div>

	                    <div class="form-group">
	                        <label class="col-md-1 col-xs-12 control-label">Progr<br>amme</label>
	                        
	                        <div class="col-md-10 col-xs-10">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
	                                <select class="form-control " name="prog_id" required>
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

	                    <div class="form-group">
	                        <label class="col-md-1 col-xs-12 control-label">Session</label>
	                        
	                        <div class="col-md-10 col-xs-10">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
	                                <select class="form-control " name="session_id" required>
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

	                </div>
	                <div class="panel-footer">                                 
	                    <button class="btn btn-success pull-right" name="course-result">SEE COURSE RESULT</button>
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