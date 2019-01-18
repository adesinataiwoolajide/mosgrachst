<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
    require("../super-admin/libs_dev/students-registration/students-registration.php");
    $student = new oldStudentRegistration($db);
    $student_matric_num = $_GET['student_matric_num'];
    $regNumber = $_GET['reg_number'];
    $nope = $student-> getStudentMatricNumber($student_matric_num);

?>
<ul class="breadcrumb">
    <li><a href="./">Home</a></li>                    
    <li><a href="add-student-biodata.php">Add Student Bio Data</a></li>  
    <li><a href=" add-student-qualifications.php?student_matric_num=<?php echo $student_matric_num ?>&&reg_number=<?php echo $regNumber ?>">Add Student Qualifications</a></li>  
    <li><a href="view-student-biodata.php">View All Students</p></a></li>  
    <li class="active">Add Student Qualifications</li>   
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
            <form action="process-add-student-qualifications.php" method="post" class="form-horizontal" enctype="multipart/form-data">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    <h3 class="panel-title"><strong>Add A </strong> New Student Bio Data</h3>
	                    <h3 class="panel-title" style="color: red; text-align: center"><strong> The Form Consist of Two Sections, Section One is for Student Bio Data and Sectin Two is For Educational Qualification</strong> </h3>
	                </div>
	                <div class="panel-body">
	                    <p style="color: green;" align="center">Please fill the below form to Add Student Qualifications Details</p>
	                    <h3 style="color: green; text-align: center">SECTION TWO </h3>
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
                            <div class="form-group col-md-12">
                            <label class="col-md-1 col-xs-6 control-label">STUDENT MATRIC NUMBER</label>
                            <div class="col-md-5 col-xs-6">

                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                    <input type="text" class="form-control text" name="surname" value="<?php echo $student_matric_num ?>" placeholder="Enter the Surname" readonly />
                                </div>                                            
                                <span class="help-block" style="color: red;">This is field is Required.</span>
                            </div>
                            <label class="col-md-1 col-xs-6 control-label"> REGIS<BR>TRATION NUMBER</label>
                            <div class="col-md-5 col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-users"></span></span>
                                    <input type="text" class="form-control" name="other_names" readonly value="<?php echo $regNumber ?>" placeholder="Enter Other Names" required minlength="5" />
                                </div>                                                                                    
                                <span class="help-block" style="color: red;">This is field is Required.</span>
                            </div>  
                            
                        </div>
	                		<label><h4 align="center"><strong>1.	SCHOOL ATTENDED WITH DATES</strong></h4></label>
	                		<table class="table table-responsive table-bordered" style="width:1000px ">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name of School</th>
                                        
                                        <th> From</th>
                                        <th>To</th>
                                        
                                        <th>Degree Earned</th>  
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="center">1</td>

                                        <td class="center"><input type="text" class="form-control" required name="school1"  placeholder="Enter School One"></td>
                                        
                                        <td class="center"><input type="number" placeholder="Enter The Year" class="form-control" required name="from_date1" ></td>

                                        <td class="center"><input type="number"  placeholder="Enter The Year" class="form-control" required name="to_date1"></td>

                                        <td class="center"><input type="text" class="form-control" placeholder="Enter The Qualification One" required name="degree1"></td>
                                    </tr>
                                    <tr >
                                        <td class="center">2</td>
                                        <td class="center">
                                        	<input type="text" name="school2" class="form-control" placeholder="Enter School Two" required></td>
                                        <td class="center">
                                        	<input type="number"  placeholder="Enter The Year" class="form-control" name="from_date2" required></td>
                                        <td class="center">
                                        	<input type="text"  placeholder="Enter The Date" class="form-control " required name="to_date2"></td>
                                        <td class="center"><input type="text" class="form-control" placeholder="Enter The Qualification Two" required name="degree2"></td>
                                    </tr>
                                    <tr >
                                        <td class="center">3</td>
                                        <td class="center">
                                        	<input type="text" class="form-control" name="school3" placeholder="Enter School Three"></td>
                                        <td class="center">
                                        	<input type="number"  placeholder="Enter The Year" class="form-control" name="from_date3"></td>
                                        <td class="center">
                                        	<input type="number"  placeholder="Enter The Year" class="form-control" name="to_date3"></td>
                                        <td class="center">
                                        	<input type="text" class="form-control" placeholder="Enter The Qualification Three" name="degree3"></td>
                                    </tr>
                                    <tr >
                                        <td class="center">4</td>
                                        <td class="center"><input type="text" class="form-control" name="school4" placeholder="Enter School Four"></td>
                                        <td class="center"><input type="number"  placeholder="Enter The Year" class="form-control" name="from_date4"></td>
                                        <td class="center"><input type="number"  placeholder="Enter The Year" class="form-control" name="to_date4"></td>
                                        <td class="center"><input type="text" placeholder="Enter The Qualification Four" class="form-control" name="degree4"></td>
                                    </tr>
                                    <tr >
                                        <td class="center">5</td>
                                        <td class="center"><input type="text" class="form-control" placeholder="Enter School Five" name="school5"></td>
                                        <td class="center"><input type="number"  placeholder="Enter The Year" class="form-control" name="fromdate5"></td>
                                        <td class="center"><input type="number"  placeholder="Enter The Year" class="form-control" name="todate5"></td>
                                        <td class="center"><input type="text" placeholder="Enter The Qualification Five" class="form-control"   name="degree5"></td>
                                    </tr>
                                </tbody>
                            </table>
								
	                    </div>
	                   

	                   <div class="form-group col-md-12">
	                		<label><h4 align="center"><strong>2.	ACADEMIC QUALIFICATIONS  RESULTS</strong></h4></label>
							<table class="table table-responsive table-bordered" style="width:1000px;">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>SUBJECT</th>
                                        <th> GRADE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="center">1</td>

                                        <td class="center"><input type="text" class="form-control" placeholder="Enter Subject One" required name="sub1"></td>
                                        <td class="center"><input type="text" class="form-control" placeholder="Enter Grade One" required name="grade1"></td>  
                                    </tr>
                                    <tr >
                                        <td class="center">2</td>

                                        <td class="center"><input type="text" placeholder="Enter Subject Two" class="form-control" name="sub2"></td>
                                        <td class="center"><input type="text" class="form-control" placeholder="Enter Grade Two" name="grade2"></td>
                                    </tr>
                                    <tr >
                                        <td class="center">3</td>
                                       <td class="center"><input type="text" class="form-control" placeholder="Enter Subject Three" required name="sub3"></td>
                                        <td class="center"><input type="text" class="form-control" placeholder="Enter Grade Three" required name="grade3"></td>  
                                    </tr>
                                    <tr >
                                        <td class="center">4</td>
                                       	<td class="center"><input type="text" placeholder="Enter Subject Four" class="form-control" required name="sub4"></td>
                                        <td class="center"><input type="text" class="form-control" placeholder="Enter Grade Four" required name="grade_4"></td>  
                                    </tr>
                                    <tr >
                                        <td class="center">5</td>
                                       	<td class="center"><input type="text" class="form-control" placeholder="Enter Subject Five" required name="sub5"></td>
                                        <td class="center"><input type="text" class="form-control" placeholder="Enter Grade Five" required name="grade5"></td>  
                                    </tr>
                                
								    <tr>
								        <td class="center">6</td>

								        <td class="center"><input type="text" class="form-control" placeholder="Enter Subject Six"  name="sub6"></td>
								        <td class="center"><input type="text" class="form-control" placeholder="Enter Grade Six"  name="grade6"></td>  
								    </tr>
								    <tr >
								        <td class="center">7</td>

								        <td class="center"><input type="text" class="form-control" placeholder="Enter Subject Seven" name="sub7"></td>
								        <td class="center"><input type="text" class="form-control" placeholder="Enter Grade Seven" name="grade7"></td>
								    </tr>
								    <tr >
								        <td class="center">8</td>
								       <td class="center"><input type="text" class="form-control" placeholder="Enter Subject Eight"  name="sub8"></td>
								        <td class="center"><input type="text" class="form-control" placeholder="Enter Grade Eight"  name="grade8"></td>  
								    </tr>
								    <tr >
								        <td class="center">9</td>
								       <td class="center"><input type="text" class="form-control" placeholder="Enter Subject Nine"  name="sub9"></td>
								        <td class="center"><input type="text" class="form-control" placeholder="Enter Grade Nine"  name="grade9"></td>  
								    </tr>
								    
								</tbody>
                            </table>
                            <input type="hidden" name="regNumber" value="<?php echo $regNumber; ?>">
                            <input type="hidden" name="student_matric_num" value="<?php echo $student_matric_num; ?>">
                            <input type="hidden" name="return_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
								
	                    </div>

                        <div class="form-group col-md-12">
                            
                            <label class="col-md-1 col-xs-11 control-label">OTHER QUA<BR>LIFICATIONS</label>
                            <div class="col-md-11 col-xs-11">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-building-o"></span></span>
                                    <textarea class="form-control textarea" cols="5" name="qua" placeholder="Enter The Students Other Qualifications"  ></textarea>
                                </div>                                            
                                <span class="help-block" style="color: green; text-align: center">This is field is Not Required.</span>
                            </div>
                        </div>
	                   
	                     <div class="panel-footer">                                 
		                    <button class="btn btn-success pull-right" name="continue_adding_details">COMPLETE STUDENT REGISTRATION</button>
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