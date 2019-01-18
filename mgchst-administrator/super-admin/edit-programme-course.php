<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
    include("libs_dev/department/department-class.php");
    $department = new schoolDepartment($db);
    $proc = new programmeCourse($db);
    $prog_course = $_GET['programme'];
    $procourse_id = $_GET['procourse_id'];
    $details =$proc->getProgrammeCourseIdentification($procourse_id)
?>
<ul class="breadcrumb">
    <li><a href="./">Home</a></li>                    
    <li><a href="add-programme-courses.php">Add Programme Course</a></li>  
    
    <li><a href="view-all-programme-courses.php">View All Programme Courses</p></a></li> 
    <li><a href="edit-programme-course.php?programme=<?php echo $prog_course; ?>&&department_programme=<?php echo $prog_id;?>&&procourse_id=<?php echo $procourse_id ?>">Edit Programme Courses</p></a></li>  
    <li class="active"></li>   
</ul>
<!-- END BREADCRUMB -->                       
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
	<div class="row">
        <div class="col-md-12"> 
            <form action="update-programme-course-details.php" method="post" class="form-horizontal" enctype="multipart/form-data">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    <h3 class="panel-title"><strong>Programme Course </strong> Update Form</h3>
	                    
	                </div>
	                <div class="panel-body">
	                    <p align="center" style="color: green">Please fill the below form update programme course details</p>
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
	                        <label class="col-md-1 col-xs-10 control-label">COURSE<br> NAME </label>
	                        <div class="col-md-10 col-xs-10">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-building"></span></span>
	                                <input type="text" class="form-control" name="name" placeholder="Please Enter The Course Name" required value="<?php echo $details['prog_course']; ?>" />
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                   
	                     
	                    </div>

	                    <div class="form-group">
	                        <label class="col-md-1 col-xs-6 control-label">COURSE<br> DEPT</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-sitemap"></span></span>
	                                <select class="form-control " name="dept_id" required ><?php
	                                	$dept_id = $details['dept_id']; 
	                                	$depo = $department->getDepartmentDetails($dept_id); ?>
                                        <option value="<?php echo $dept_id; ?>"><?php echo $depo['dept_name']; ?></option>
                                        <option value=""></option><?php
                                        $dept = $db->prepare("SELECT * FROM department ORDER BY dept_name ASC");
										$dept->execute();
										while($now = $dept->fetch()){ ?>
	                                        <option value="<?php echo $now['dept_id']; ?>">
	                                        	<?php echo $now['dept_name']; ?></option><?php
	                                    } ?>
                                    </select>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                    
	                        <label class="col-md-1 col-xs-6 control-label">COURSE<br> DURATION</label>
	                        <div class="col-md-4 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-sitemap"></span></span>
	                                <select class="form-control" name="duration" required >
                                        <option value="<?php echo $details['duration']; ?>"><?php echo $details['duration']; ?></option>
                                        <option value=""></option>
                                        <option value="1 Year">1 Year</option>
                                        <option value="2 Years">2 Years</option>
                                        <option value="3 Years">3 Years</option>
                                        <option value="4 Years">4 Years</option>
                                        <option value="5 Years">5 Years</option>
                                        <option value="6 Years">6 Years</option>
                                    </select>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="col-md-1 col-xs-6 control-label">COURSE REQUIRE<br>MENT</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-sitemap"></span></span>
	                                <textarea class="form-control" placeholder="Please enter the course requirement" name="requirement" id="requirement"><?php echo $requirement = $details['requirement']; ?></textarea>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                   
	                        <label class="col-md-1 col-xs-6 control-label">COURSE CERTIFI<br>CATION</label>
	                        <div class="col-md-4 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-sitemap"></span></span>
	                                <textarea class="form-control" name="certification" id="certification"><?php echo $certification = $details['certification']; ?></textarea>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                    </div>
	                   
	                </div>
	                <input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
	                <input type="hidden" name="procourse_id" value="<?php echo $procourse_id ?>">
	                <div class="panel-footer">                                 
	                    <button class="btn btn-success pull-right" name="updating-course">UPDATE PROGRAMME COURSE DETAILS</button>
	                </div>
	            </div>
            </form>
        </div>
    </div>             
</div>        

<script >
    var x = document.getElementById('requirement'). value = <?php $requirement; ?>
</script>    

<script >
    var y = document.getElementById('certification'). value = <?php $certification; ?>
</script>    
<?php
    include("../log-out-modal.php");
	include("../footer.php");
?>