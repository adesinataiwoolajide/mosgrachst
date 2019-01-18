<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
    $school_name = $_GET['school_name'];
    $school_id = $_GET['school_identification'];
?>
<ul class="breadcrumb">
    <li><a href="./">Home</a></li> 
    <li><a href="add-students.php">Add Student</a></li>
    <li><a href="add-student-biodata.php?school_name=<?php echo $school_name?>&&school_identification=<?php echo $school_id?>">Add New Student to<?php echo $school_name ?></a></li>    
    <li><a href=all-school-student-details.php">View All Students</p></a></li>  
    <li class="active">Add Student</li>   
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
            <form action="process-add-student-biodata.php" method="post" class="form-horizontal" enctype="multipart/form-data">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    <h3 class="panel-title"><strong>Add A </strong> New Student Bio Data</h3>
	                    <h3 class="panel-title" style="color: red; text-align: center"><strong> The Form Consist of Two Sections, Section One is for Student Bio Data and Section Two is For Educational Qualification</strong> </h3>
	                </div><?php
	                if($school_id ==1){ ?>
	                	<div class="col-md-12" align="center">
	                        <img src="../../images/form-logo.png" alt="Moses And Grace College of Health Sciences and Technology" style="width: 900px; height: ; ">
	                    </div> 
	                    <div class="panel-body">
		                    <h3><p style="color: green;" align="center">Please fill the below form to Add a New Student To Moses and Grace College of Health Sciences and Technology</p></h3>
		                    <h4 style="color: green; text-align: center">SECTION ONE (STUDENT DETAILS AND NEXT OF KIN DETAILS).</h5>
		                    <h5 align="center"><strong>1. STEP ONE A (STUDENT DETAILS).</strong></h5>
		                    
		                </div><?php
                    }else{ ?>
                    	<div class="col-md-12" align="center">
                    		<img src="../../images/afriweblogo.jpg" alt="Afriford University" style="width: 900px; height: ; ">
                    	</div>
                    	<div class="panel-body">
		                    <h3><p style="color: green;" align="center">Please fill the below form to Add a New Student To Afriford Univeristy</p></h3>
		                    <h4 style="color: green; text-align: center">SECTION ONE (STUDENT DETAILS AND NEXT OF KIN DETAILS).</h4>
		                    <h5 align="center"><strong>1. STEP ONE A (STUDENT DETAILS).</strong></h5>
		                    
		                </div><?php
                    }  
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
	                		<label class="col-md-1 col-xs-6 control-label">STUDENT PASSPORT</label>
	                        <div class="col-md-5 col-xs-6">

	                        	<div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-image"></span></span>
	                                <input type="file" class="form-control file" name="image"  required />
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                        <label class="col-md-1 col-xs-6 control-label"> YEAR OF ADMISSION</label>
	                        <div class="col-md-5 col-xs-6">
	                        	<div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
	                                <select class ="form-control" name ="year_admit" required>
	                                    <option value="">-- Select The Year of Admission --</option>
	                                    <option value=""></option><?php
	                                    $swes = $db->prepare("SELECT * FROM session ORDER BY session_name ASC");
	                                    $swes->execute();
	                                    while($see_ha = $swes->fetch()){ ?>
	                                    	<option value="<?php echo $see_ha['session_name'] ?>"><?php echo $see_ha['session_name'] ?></option><?php
	                                    }?>
	                               </select>                    
	                             </div>                                          
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>  
	                        
	                    </div>
	                    <div class="form-group col-md-12">
	                		<label class="col-md-1 col-xs-6 control-label">STUDENT SURNAME</label>
	                        <div class="col-md-5 col-xs-6">

	                        	<div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
	                                <input type="text" class="form-control text" name="surname" placeholder="Enter the Surname" required />
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                        <label class="col-md-1 col-xs-6 control-label">OTHER NAMES</label>
	                        <div class="col-md-5 col-xs-6">
	                        	<div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-users"></span></span>
	                                <input type="text" class="form-control" name="other_names" placeholder="Enter Other Names" required minlength="5" />
	                            </div>                                                                                    
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>  
	                        
	                    </div>

	                    <div class="form-group col-md-12">

	                    	<label class="col-md-1 col-xs-6 control-label">LEVEL</label>
	                        <div class="col-md-5 col-xs-6">

	                        	<div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-building-o"></span></span>
	                                <select class="form-control " name="level_id" required>
                                        <option value="">-- Select The Level --
                                        </option>
                                        <option value=""></option><?php
                                        $lev = $db->prepare("SELECT * FROM level ORDER BY level_name ASC");
                                        $lev->execute(); 
                                        while($see_lev = $lev->fetch()){ ?>
                                        	<option value="<?php echo $see_lev['level_name']; ?>"><?php echo $see_lev['level_name']; ?></option><?php
                                        } ?>
                                    </select>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                    	<label class="col-md-1 col-xs-6 control-label">DEPART<br>MENT</label>
	                        <div class="col-md-5 col-xs-6">

	                        	<div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-building-o"></span></span>
	                                <select class="form-control " name="dept_id" required>
                                        <option value="">-- Select The Department --
                                        </option>
                                        <option value=""></option><?php
                                        $dept = $db->prepare("SELECT * FROM department ORDER BY dept_name ASC");
                                        $dept->execute(); 
                                        while($see_dept = $dept->fetch()){ ?>
                                        	<option value="<?php echo $see_dept['dept_name']; ?>"><?php echo $see_dept['dept_name']; ?></option><?php
                                        } ?>
                                    </select>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                    </div>
	                    <div class="form-group col-md-12">
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
	                        
	                        <label class="col-md-1 col-xs-6 control-label">PREFER<BR>COURSE</label>
	                        <div class="col-md-5 col-xs-6">

	                        	<div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-book"></span></span>
	                                <select class="form-control " name="procourse_id" required>
                                        <option value="">-- Select The Course --
                                        </option>
                                        <option value=""></option><?php
                                        $course = $db->prepare("SELECT * FROM programme_course ORDER BY prog_course ASC");
                                        $course->execute();
                                        while($see_course = $course->fetch()){ 
                                        	//$prog_id = $see_course['prog_id']; 
                                        	
	                                        	?>
	                                        	<option value="<?php echo $see_course['procourse_id']; ?>"><?php echo $see_course['prog_course']?></option><?php
	                                        
                                        } ?>
                                    </select>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                    </div>
	                    <div class="form-group col-md-12">
	                    	<label class="col-md-1 col-xs-6 control-label">DATE OF BIRTH</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-calendar-o"></span></span>
	                                <input type="text" class="form-control datepicker" name="birth_date" placeholder="Date of Birth" required />
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>

	                        <label class="col-md-1 col-xs-6 control-label">STUDENT SEX</label>
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
	                        
	                    </div>

	                    <div class="form-group col-md-12">
	                		
	                        <label class="col-md-1 col-xs-6 control-label">NATIONALITY</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-bars"></span></span>
	                                <select class="form-control" name="nationality" required>
										<option value="">-- Select your Nationality --</option>
										<option value=""></option>
										<option value="Nigerian">Nigerian</option>
										<option value="Others">Others</option>
									</select>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>  
	                        <label class="col-md-1 col-xs-6 control-label">STATE OF ORIGIN</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-bars"></span></span>
	                                <select class="form-control" name="state" required>
										<option value="">-- Select your State of Origin --</option>
										<option value=""></option>
										<option value="Abuja FCT">Abuja FCT</option>
							            <option value="Abia">Abia</option>
							            <option value="Adamawa">Adamawa</option>
							            <option value="Akwa Ibom">Akwa Ibom</option>
							            <option value="Anambra">Anambra</option>
							            <option value="Bauchi">Bauchi</option>
							            <option value="Bayelsa">Bayelsa</option>
							            <option value="Benue">Benue</option>
							            <option value="Borno">Borno</option>
							            <option value="Cross River">Cross River</option>
							            <option value="Delta">Delta</option>
							            <option value="Ebonyi">Ebonyi</option>
							            <option value="Edo">Edo</option>
							            <option value="Ekiti">Ekiti</option>
							            <option value="Enugu">Enugu</option>
							            <option value="Gombe">Gombe</option>
							            <option value="Imo">Imo</option>
							            <option value="Jigawa">Jigawa</option>
							            <option value="Kaduna">Kaduna</option>
							            <option value="Kano">Kano</option>
							            <option value="Katsina">Katsina</option>
							            <option value="Kebbi">Kebbi</option>
							            <option value="Kogi">Kogi</option>
							            <option value="Kwara">Kwara</option>
							            <option value="Lagos">Lagos</option>
							            <option value="Nassarawa">Nassarawa</option>
							            <option value="Niger">Niger</option>
							            <option value="Ogun">Ogun</option>
							            <option value="Ondo">Ondo</option>
							            <option value="Osun">Osun</option>
							            <option value="Oyo">Oyo</option>
							            <option value="Plateau">Plateau</option>
							            <option value="Rivers">Rivers</option>
							            <option value="Sokoto">Sokoto</option>
							            <option value="Taraba">Taraba</option>
							            <option value="Yobe">Yobe</option>
							            <option value="Zamfara">Zamfara</option>
		     							<option value="Outside Nigeria">Outside Nigeria</option>
									</select>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div> 
	                    </div>
                        <div class="form-group col-md-12">
                    	 	<label class="col-md-1 col-xs-6 control-label"> PHONE NUMBER</label>
	                        <div class="col-md-5 col-xs-6">                                      
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-smile-o"></span></span>
	                                <input type="number" class="form-control" name="phone_number" placeholder="Please enter the Staff Phone Number" required minlength="10" />
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>     
	                        <label class="col-md-1 col-xs-6 control-label">STUDENT E-MAIL</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
	                                <input type="email" class="form-control" name="student_email"  placeholder="Please enter your E-Mail" required>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>                                       
                            
	                    </div>   
	                   
	                    <div class="form-group col-md-12">

	                    	<label class="col-md-1 col-xs-6 control-label">STUDENT RELIGION</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-sitemap"></span></span>
	                                <select class="form-control " name="religion" required>
                                        <option value="">-- Select The Student Religion From The List --
                                        </option>
                                        <option value=""></option>
                                        <option value="Christanity">Christanity</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Others">Others</option>
                                    </select>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>

	                        <label class="col-md-1 col-xs-6 control-label">MARITAL STATUS</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-crosshairs"></span></span>
	                                <select class="form-control " name="marital_status" required>
                                        <option value="">-- Select The Staff Sex From The List --
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
	                    	
	                    </div>
	                    <div class="form-group col-md-12">

	                    	
	                        <label class="col-md-1 col-xs-11 control-label">STUDENT ADDRESS</label>
	                        <div class="col-md-11 col-xs-12">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-building-o"></span></span>
	                                <textarea class="form-control textarea" cols="5" name="address" placeholder="Enter The Student Residential Address" required ></textarea>
	                            </div>                                            
	                            <span class="help-block" style="color: red; text-align: center">This is field is Required.</span>
	                        </div>
	                    </div><br><br>

	                    <h4 align="center">
	                    	<strong>2.STEP ONE B (NEXT OF KIN DETAILS).</strong></h4>
	                    <div class="form-group col-md-12">
	                		<label class="col-md-1 col-xs-6 control-label">FULL NAME</label>
	                        <div class="col-md-5 col-xs-6">

	                        	<div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
	                                <input type="text" class="form-control text" name="kin_name" placeholder="Enter the Next of Kin full Name" required />
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                        <label class="col-md-1 col-xs-6 control-label">PHONE NUNBER</label>
	                        <div class="col-md-5 col-xs-6">
	                        	<div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-users"></span></span>
	                                <input type="text" class="form-control" name="kin_phone" placeholder="Enter Next of Kin Phone Number" required minlength="5" />
	                            </div>                                                                                    
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>  
	                        
	                    </div>

	                    <div class="form-group col-md-12">
	                    	
	                        <label class="col-md-1 col-xs-11 control-label">KIN ADDRESS</label>
	                        <div class="col-md-11 col-xs-11">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-building-o"></span></span>
	                                <textarea class="form-control textarea" cols="5" name="kid_address" placeholder="Enter The Next of Kin Residential Address" required ></textarea>
	                            </div>                                            
	                            <span class="help-block" style="color: red; text-align: center">This is field is Required.</span>
	                        </div>
	                    </div>
	                    <input type="hidden" name="school_name" value="<?php echo $school_name; ?>">
	                    <input type="hidden" name="school_id" value="<?php echo $school_id ?>">
	                     <div class="panel-footer">                                 
		                    <button class="btn btn-success pull-right" name="adding_details">PROCEED TO STEP TWO</button>
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