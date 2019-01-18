<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
    require("../super-admin/libs_dev/students-registration/students-registration.php");
 	$student = new oldStudentRegistration($db);
    $regNumber = $_GET['registration_number'];
    $details = $student->gettingAdmission($regNumber);
?>
<ul class="breadcrumb">
    <li><a href="./">Home</a></li>     
    <li><a href="edit-matric-number.php?registration_number=<?php echo $regNumber; ?>">Edit Matric Number</a></li>                    
   	<li><a href="view-all-students.php">View All Students</p></a></li> 
    <li><a href="add-student-biodata.php">Add Student</a></li>  
    <li><a href="add-multiple-students.php">Add Multiple Students</a></li>   
    <li class="active">View All Students</li>   
</ul>
<!-- END BREADCRUMB -->                       
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
	<div class="row">
        <div class="col-md-12"> 
            <form action="update-matric-number.php" method="post" class="form-horizontal" enctype="multipart/form-data">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    <h3 class="panel-title"><strong>Change Student</strong> Matric Number</h3>
	                    
	                </div>
	                <div class="panel-body">
	                    <p align="center" style="color: green">Please fill the below form to change the student matric number</p>
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
	                    	<label class="col-md-2 col-xs-12 control-label">PREVIOUS MATRIC NUMNER</label>
	                        <div class="col-md-10 col-xs-10">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-calendar-o"></span></span>
	                                <input type="text" class="form-control email" name="previous" placeholder="Please Enter the Previous Matric Number" value="<?php echo $details['student_matric_num']; ?>" readonly required />
	                            </div>                                            
	                            <span class="help-block" style="color: green;">This is field is Readonly.</span>
	                        </div>
	                     </div>
	                     <div class="form-group col-md-12">
	                         <label class="col-md-2 col-xs-12 control-label">NEW MATRIC NUMBER</label>
	                        <div class="col-md-10 col-xs-10">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-smile-o"></span></span>
	                                <input type="text" class="form-control" name="new_matric" placeholder="Please enter the New Matric Number" required minlength="" />
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>  
	                    </div>
	                    <input type="hidden" name="regNumber" value="<?php echo $regNumber; ?>">
	                    <input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
	                    <input type="hidden" name="previous" value="<?php echo $details['student_matric_num']; ?>">
	                <div class="panel-footer">                                 
	                    <button class="btn btn-success pull-right" name="update_matric_number">UPDATE THE STUDENT MATRIC NUMBER</button>
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