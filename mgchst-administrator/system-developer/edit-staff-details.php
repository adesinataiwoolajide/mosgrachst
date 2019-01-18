<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
    include("../super-admin/libs_dev/staffs/staff_class.php");
    include("../super-admin/libs_dev/department/department-class.php");
    $department = new schoolDepartment($db);
    $staff_details = new schoolStaffs($db);

    $staff_number = $_GET['staff_number'];
    $staff_email = $_GET['staff_email'];
    $details = $staff_details->gettingStafftDetails($staff_number);
    $ima = $staff_details->gettingStaffPassports($staff_email);
    //$login = $staff_details->getStaffLoginDetails($staff_email);
?>
<ul class="breadcrumb">
    <li><a href="./">Home</a></li>                    
    <li><a href="add-worker.php">Add Worker </a></li>  
    <li><a href="view-all-staff.php">View All Staffs</p></a></li>  
     
    <li><a href="staff_details.php?staff_number=<?php echo $staff_number?>&&staff_email=<?php echo $staff_email ?>">View Details</p></a></li>  

    <li><a href="edit-staff-details.php?staff_number=<?php echo $staff_number?>&&staff_email=<?php echo $staff_email ?>">Edit Details</p></a></li>  
    <li class="active"></li>
       
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
            <form action="update-staff-details.php" method="post" class="form-horizontal" enctype="multipart/form-data">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    <h3 class="panel-title"><strong>Staff Biodata </strong> Update Form</h3>
	                    
	                </div>
	                <div class="panel-body">
	                    <p>Please fill the below form to update staff details</p>
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
			        <div class="col-md-2" align="right">
                		<div class="panel-body profile" style="background: url('<?php echo "../staffimages/". $ima['passport_url']; ?>') center center no-repeat;">
		                    <div class="profile-image">
		                        <img src="<?php echo "../staffimages/". $ima['passport_url']; ?>" alt="<?php echo $staff_number; ?>" style="width: 100px; height: 100px;"/>
		                    </div>
		                                           
		                </div>   
                	</div>
                	
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
	                		<label class="col-md-1 col-xs-6 control-label">CHANGE PASSPORT</label>
	                        <div class="col-md-5 col-xs-6">

	                        	<div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-image"></span></span>
	                                <input type="file" class="form-control file" name="image" />
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                        <label class="col-md-1 col-xs-6 control-label">STAFF NAME</label>
	                        <div class="col-md-5 col-xs-6">

	                        	<div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
	                                <input type="text" class="form-control" name="name" placeholder="Surname Firstname and Other Names" required minlength="5" value="<?php echo $details['staff_name']; ?>" />
	                            </div>                                             
	                                                                       
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>  
	                        
	                    </div>
	                    <div class="form-group col-md-12">
	                    	<label class="col-md-1 col-xs-6 control-label">STAFF EMAIL</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-calendar-o"></span></span>
	                                <input type="email" class="form-control email" name="staff_email" placeholder="Please Enter the Staff Email" required value="<?php echo $details['staff_email']; ?>"/>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                         <label class="col-md-1 col-xs-6 control-label">STAFF PHONE</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-smile-o"></span></span>
	                                <input type="number" class="form-control" name="phone" placeholder="Please enter the Staff Phone Number" required minlength="10" value="<?php echo $details['staff_phone']; ?>" />
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
                                        <option value="<?php echo $details['sex']; ?>"><?php echo $details['sex']; ?>
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
	                                <select class="form-control " name="dept_id" required><?php
	                                	$dept_id = $details['dept_id'];
	                                	$oya =$department->getDepartmentDetails($dept_id); ?>
                                        <option value="<?php echo $details['dept_id']; ?>"><?php echo $oya['dept_name']; ?>
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
		                                <select class="form-control " name="qualification_id[]" multiple required>
		                                 	<?php 
	                    					$qual = $details['qualification_id'];
											$split = explode(",", $qual);
											foreach($split as $new){ 
												
												$selecting = $db->prepare("SELECT * FROM staff_qualification WHERE qualification_id=:new");
												$ars = array(':new'=>$new);
												$selecting->execute($ars);
												while($reall = $selecting->fetch()){ ?>
													<option value="<?php echo $reall['qualification_id'] ?>"><?php echo $reall['qualification_name']; ?></option><?php
												}
											} ?>	
	                                        
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
                                        <option value="<?php echo $details['staff_type'] ?>"><?php 
	                    					$type_id = $details['staff_type']; 
	                    					if($type_id == 1){
	                    						echo "Super Admin";
	                    					}elseif($type_id ==2){
	                    						echo "Burser";
	                    					}elseif($type_id == 3){
	                    						echo "Head of Dept";
	                    					}elseif($type_id == 4){
	                    						echo "Lecturer";
	                    					}elseif ($type_id == 5) {
	                    						echo "Admission Officer";
	                    					}elseif ($type_id == 6){
	                    						echo "Exam Officer";
	                    					}else{
	                    						echo "Invalid User";
	                    					}?>
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

	                    <div class="form-group col-md-12">

	                    	<label class="col-md-1 col-xs-6 control-label">STAFF RELIGION</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-image"></span></span>
	                                <select class="form-control " name="religion" required>
                                        <option value="<?php echo $details['religion'] ?>"><?php echo $details['religion']; ?>
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
	                                <input type="text" class="form-control datepicker" name="birth_date" placeholder="Date of Birth" required value="<?php echo $details['birth_date'] ?>" />
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
                                        <option value="<?php echo $details['marital_status'] ?>"><?php echo $details['marital_status']; ?>
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
	                                <span class="input-group-addon"><span class="fa fa-building-o"></span></span><?php $add = $details['address']; ?>
	                                <textarea class="form-control textarea" cols="5" id="address" name="address" placeholder="Enter The Staff Residential Address" required ><?php echo $add; ?></textarea>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                    </div>
	                    <input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
	                    <input type="hidden" name="staff_number" value="<?php echo $details['staff_number']; ?>">
	                    <input type="hidden" name="pass_id" value="<?php echo $ima['pass_id']; ?>">
	                    <input type="hidden" name="user_id" value="<?php echo $login['user_id'] ?>">

	                     <div class="panel-footer">                                 
		                    <button class="btn btn-success pull-right" name="update_details">UPDATE STAFF DETAILS</button>
		                </div>
	                </div>
	               
	            </div>
            </form>
        </div>
    </div>             
</div>        
<script >
    var x = document.getElementById('address'). value = <?php $add; ?>
</script>    
  
<?php
    include("../log-out-modal.php");
	include("../footer.php");
?>