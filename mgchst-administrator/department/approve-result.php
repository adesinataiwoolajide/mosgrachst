<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
    require("../super-admin/libs_dev/students-registration/students-registration.php");
    include("../super-admin/libs_dev/department/department-class.php");
    include("../../inc/dev/admission/admission_class.php");
    include("../super-admin/libs_dev/staffs/staff_class.php");
    $staff_details = new schoolStaffs($db);
    $staff_email = $_SESSION['user_name'];
    $staff = $staff_details->gettingStafftEmail($staff_email);
    $dept_id = $staff['dept_id'];
    $staff_number =$staff['staff_number'];
    $staff_name = $staff['staff_name'];
    $department = new schoolDepartment($db);
    $student = new oldStudentRegistration($db);
    $details = $department->getDepartmentDetails($dept_id);
    $dept_name = $details['dept_name'];
    $department = new schoolDepartment($db);
    $student = new oldStudentRegistration($db);
   
?>
<ul class="breadcrumb">
    <li><a href="./">Home</a></li>                    
    <li><a href="approve-result.php">Approve Result</a></li>  
    
    <li><a href="result-decision.php">Result Panel</a></li>  
    <li class="active">Approve Students Result</li>   
</ul>
<!-- END BREADCRUMB -->                       
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
	<div class="row">
        <div class="col-md-12"> 
            <form action="approving-the-school-result.php" method="post" class="form-horizontal" enctype="multipart/form-data">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    <h3 class="panel-title"><strong>Approve </strong> Student Results</h3>
	                    
	                </div>
	                <div class="panel-body">
	                    <p align="center" style="color: green">Please fill the below form to Approve The Students Result</p>
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
	                    <div class="form-group">
	                        <label class="col-md-1 col-xs-12 control-label">DEPART<br> MENT</label>
	                        <div class="col-md-10 col-xs-10">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-sitemap"></span></span>
	                                <input type="text" name="dept_id" class="form-control" readonly value="<?php echo $dept_name ?>">
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                    </div>
	                </div>
	                <div class="panel-body form-group-separated">    
	                    <div class="form-group">
	                    	<div class="form-group col-md-12">
		                        <label class="col-md-1 col-xs-6 control-label">LEVEL</label>
		                        <div class="col-md-5 col-xs-6">

		                        	<div class="input-group">
		                                <span class="input-group-addon"><span class="fa fa-building-o"></span></span>
		                                <select class="form-control " name="level_id" required>
	                                        <option value="">-- Select The Level Name --
	                                        </option>
	                                        <option value=""></option><?php
	                                        $lev = $db->prepare("SELECT * FROM level ORDER BY level_name ASC");
	                                        $lev->execute(); 
	                                        while($see_lev = $lev->fetch()){ ?>
	                                        	<option value="<?php echo $see_lev['level_id']; ?>"><?php echo $see_lev['level_name']; ?></option><?php
	                                        } ?>
	                                    </select>
		                            </div>                                            
		                            <span class="help-block" style="color: red;">This is field is Required.</span>
		                        </div>
		                    
		                		<label class="col-md-1 col-xs-6 control-label">PROG<br>TYPE</label>
		                        <div class="col-md-5 col-xs-6">

		                        	<div class="input-group">
		                                <span class="input-group-addon"><span class="fa fa-image"></span></span>
		                                <select class="form-control " name="prog_id" required>
	                                        <option value="">-- Select The Programme --
	                                        </option>
	                                        <option value=""></option><?php
	                                        if($school_id ==1){ 
		                                        $prog = $db->prepare("SELECT * FROM programme WHERE prog_id=2");
		                                        $prog->execute(); 
		                                        while($see_prog = $prog->fetch()){ ?>
		                                        	<option value="<?php echo $see_prog['prog_id']; ?>"><?php echo $see_prog['prog_name']; ?></option><?php
		                                        } 
		                                    }else{ ?>
		                                    	<option value="1">Degree Full Time</option>
		                                    	<option value="3">Degree Part Time</option><?php
		                                	}?>
	                                    </select>
		                            </div>                                            
		                            <span class="help-block" style="color: red;">This is field is Required.</span>
		                        </div>
		                    </div>
		                </div>
		                <div class="panel-body form-group-separated">    
		                    <div class="form-group">
		                    	<div class="form-group col-md-12">
		                        
			                        
			                        <label class="col-md-1 col-xs-12 control-label">ACADEMIC<BR>SESSION</label>
			                        <div class="col-md-11 col-xs-12">

			                        	<div class="input-group">
			                                <span class="input-group-addon"><span class="fa fa-book"></span></span>
			                                <select class="form-control " name="session_id" required>
		                                        <option value="">-- Select The School Session --
		                                        </option>
		                                        <option value=""></option><?php
		                                        $ses = $db->prepare("SELECT * FROM session ORDER BY session_name ASC");
		                                        $ses->execute();
		                                        while($see_ses = $ses->fetch()){ ?>
			                                        <option value="<?php echo $see_ses['session_name']; ?>"><?php echo $see_ses['session_name']?></option><?php
			                                        
		                                        } ?>
		                                    </select>
			                            </div>
			                        </div>     
		                            
		                            <input type="hidden" name="school_name" value="<?php echo $school_name ?>"> 
		                            <input type="hidden" name="school_id" value="<?php echo $school_id ?>">                                    
		                            <span class="help-block" style="color: red;">This is field is Required.</span>
			                        
		                        </div>
		                    </div>
	                    </div>
	                </div>
	                <div class="panel-footer">                                 
	                    <button class="btn btn-success pull-right" name="approve-result">SEE RESULT FOR APPROVAL</button>
	                </div>
	            </div>
            </form>
        </div>
    </div>             
</div>  <?php      
include("../log-out-modal.php");
include("../footer.php");
?>