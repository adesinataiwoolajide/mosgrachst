<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
?>
<ul class="breadcrumb">
    <li><a href="./">Home</a></li>                    
    <li><a href="add-programme-courses.php">Add Programme Course</a></li>  
    
    <li><a href="view-all-programme-courses.php">View All Programme Courses</p></a></li>  
    <li class="active"></li>   
</ul>
<!-- END BREADCRUMB -->                       
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
	<div class="row">
        <div class="col-md-12"> 
            <form action="process-add-programme-course.php" method="post" class="form-horizontal" enctype="multipart/form-data">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    <h3 class="panel-title"><strong>Add A </strong> New Programme Course</h3>
	                    
	                </div>
	                <div class="panel-body">
	                    <p align="center" style="color: green">Please fill the below form to add a new programme course</p>
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
	                        <label class="col-md-1 col-xs-10 control-label">COURSE<br>NAME </label>
	                        <div class="col-md-10 col-xs-10">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-building"></span></span>
	                                <input type="text" class="form-control" name="name" placeholder="Please Enter The Course Name" required />
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                    
	                    </div>

	                    <div class="form-group">
	                        <label class="col-md-1 col-xs-6 control-label">COURSE<br> DEPT</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-sitemap"></span></span>
	                                <select class="form-control " name="dept_id" required >
                                        <option value="">-- Select The Department Form the List of Department --</option>
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
	                                <select class="form-control select" name="duration" required >
                                        <option value="">-- Select The Course Year of Study --</option>
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
	                                <textarea class="form-control" placeholder="Please enter the course requirement" name="requirement"></textarea>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                    
	                        <label class="col-md-1 col-xs-6 control-label">COURSE CERTIFI<br>CATION</label>
	                        <div class="col-md-4 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-sitemap"></span></span>
	                                <textarea class="form-control" name="certification" placeholder="Please Enter The Programme Certification"></textarea>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                    </div>
	                   
	                </div>
	                <div class="panel-footer">                                 
	                    <button class="btn btn-success pull-right" name="adding-course">ADD COURSE</button>
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