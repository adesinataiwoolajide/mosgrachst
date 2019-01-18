<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
?>
<ul class="breadcrumb">
    <li><a href="./">Home</a></li>                    
    <li><a href="add-staff-biodata.php">Add Staff</a></li>  
    <li><a href="view-all-school-staff.php">View All Staffs</p></a></li>  
    <li class="active">Add Staff</li>   
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
            <form action="process-add-staff-biodata.php" method="post" class="form-horizontal" enctype="multipart/form-data">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    <h3 class="panel-title"><strong>Add A </strong> New Staff Bio Data</h3>
	                    
	                </div>
	                <div class="panel-body">
	                    <p style="color: green;" align="center">Please fill the below form to add a new Staff</p>
	                    
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
	                		<label class="col-md-1 col-xs-6 control-label">STAFF PASSPORT</label>
	                        <div class="col-md-5 col-xs-6">

	                        	<div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-image"></span></span>
	                                <input type="file" class="form-control file" name="image"  required />
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                        <label class="col-md-1 col-xs-6 control-label">STAFF NAME</label>
	                        <div class="col-md-5 col-xs-6">
	                        	<div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
	                                <input type="text" class="form-control" name="name" placeholder="Surname Firstname and Other Names" required minlength="5" />
	                            </div>                                             
	                                                                       
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>  
	                        
	                    </div>
	                    <div class="form-group col-md-12">
	                    	<label class="col-md-1 col-xs-6 control-label">STAFF EMAIL</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-calendar-o"></span></span>
	                                <input type="email" class="form-control email" name="staff_email" placeholder="Please Enter the Staff Email" required />
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                         <label class="col-md-1 col-xs-6 control-label">STAFF PHONE</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-smile-o"></span></span>
	                                <input type="number" class="form-control" name="phone" placeholder="Please enter the Staff Phone Number" required minlength="10" />
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>  
	                    </div>

	                    <div class="form-group col-md-12">
	                		
	                        <label class="col-md-1 col-xs-6 control-label">STAFF SEX</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-bars"></span></span>
	                                <select class="form-control " name="sex" required>
                                        <option value="">-- Select The Staff Sex From The List --
                                        </option>
                                        <option value=""></option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>  
	                        <label class="col-md-1 col-xs-6 control-label">STAFF DEPT</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-bars"></span></span>
	                                <select class="form-control " name="dept_id[]" multiple required>
                                        <option value="">-- Select The Staff Department --
                                        </option>
                                        <option value=""></option><?php 
                                        $dept = $db->prepare("SELECT * FROM department ORDER BY dept_name ASC");
                                        $dept->execute();
                                        while($jan = $dept->fetch()){ ?>
	                                        <option value="<?php echo $jan['dept_id']; ?>"><?php echo $jan['dept_name']; ?></option>
	                                        <?php
	                                    } ?>
                                    </select>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div> 
	                        <div class="form-group col-md-12">
		                    	<label class="col-md-1 col-xs-6 control-label">STAFF QUALIFI<br>CATION</label>
		                        <div class="col-md-5 col-xs-6">                                            
		                            <div class="input-group">
		                                <span class="input-group-addon"><span class="fa fa-calendar-o"></span></span>
		                                <select class="form-control" name="qualification_id[]" multiple required>
	                                        <option value="">-- Select The Staff Qualification --
	                                        </option>
	                                        <option value=""></option><?php
	                                        $qualification = $db->prepare("SELECT * FROM staff_qualification ORDER BY qualification_name ASC");
	                                        $qualification->execute(); 
	                                        while($rope = $qualification->fetch()){ ?>
		                                        <option value="<?php echo $rope['qualification_id']; ?>"><?php echo $rope['qualification_name']; ?></option><?php
		                                    } ?>
	                                    </select>
		                            </div>                                            
		                            <span class="help-block" style="color: red;">This is field is Required.</span>
		                        </div>
		                        <label class="col-md-1 col-xs-6 control-label">STAFF TYPE</label>
		                        <div class="col-md-5 col-xs-6">                                            
		                            <div class="input-group">
		                                <span class="input-group-addon"><span class="fa fa-smile-o"></span></span>
		                                <select class="form-control " name="type" required>
	                                        <option value="">-- Select The Staff Type From The List --
	                                        </option>
	                                        <option value=""></option>
	                                        <option value="1">Super Admin</option>
	                                        <option value="2">Burser</option>
	                                        <option value="3">Head of Dept</option>
	                                        <option value="4">Lecturer</option>
	                                        <option value="5">Admission Officer</option>
	                                        <option value="6">Exam Officer</option>
	                                    </select>
		                            </div>                                            
		                            <span class="help-block" style="color: red;">This is field is Required.</span>
		                        </div>  
		                    </div>
	                        
	                        
	                    </div>

	                    <div class="form-group col-md-12">

	                    	<label class="col-md-1 col-xs-6 control-label">STAFF RELIGION</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-image"></span></span>
	                                <select class="form-control " name="religion" required>
                                        <option value="">-- Select The Staff Religion From The List --
                                        </option>
                                        <option value=""></option>
                                        <option value="Christanity">Christanity</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Others">Others</option>
                                    </select>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                    	
	                        
	                        <label class="col-md-1 col-xs-6 control-label">DATE OF BIRTH</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-calendar-o"></span></span>
	                                <input type="text" class="form-control datepicker" name="birth_date" placeholder="Date of Birth" required />
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                    </div>
	                    <div class="form-group col-md-12">

	                    	<label class="col-md-1 col-xs-6 control-label">MARITAL STATUS</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-crosshairs"></span></span>
	                                <select class="form-control " name="marital_status" required>
                                        <option value="">-- Select The Staff Marital Status --
                                        </option>
                                        <option value=""></option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widowed">Widowed</option>
                                    </select>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                        <label class="col-md-1 col-xs-6 control-label">STAFF ADDRESS</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-building-o"></span></span>
	                                <textarea class="form-control textarea" cols="5" name="address" placeholder="Enter The Staff Residential Address" required ></textarea>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                    </div>
	                     <div class="panel-footer">                                 
		                    <button class="btn btn-success pull-right" name="adding_details">ADD A NEW STAFF</button>
		                </div>
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