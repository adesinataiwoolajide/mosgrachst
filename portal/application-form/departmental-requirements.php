<?php
	session_start(); 
	include('../../connection/connection.php');
	include("../../inc/admission-nav.php");
	include("../../mgchst-administrator/super-admin/libs_dev/department/department-class.php");
    $department = new schoolDepartment($db);
    $proc = new programmeCourse($db);
	$dept_id = $_GET['identification'];
	$prog_course = $_GET['programme_course'];
	
?>

<div class="tg-innerbanner">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<ol class="tg-breadcrumb">
					<li><a href="./">Home</a></li>
					<li><a href="registration-form-section-one.php?programme_course=<?php echo $prog_name; ?>&&department_name=<?php echo $department_name;?>&&programme_identification=<?php echo $procourse_id; ?>"">Admission Requirements</li>
					<li class="tg-active"><?php echo $prog_course; ?> Admission Requirement</a></li>
				</ol>
			</div>
		</div>
	</div>
</div>
<main id="tg-main" class="tg-main tg-haslayout">
	<div class="container">
		<div class="row">
			<div class="col-md-12" align="center" style="margin-top: -10px;">
				<img src="../../images/form-logo.png" alt="../../images/form-logo.png" style="width: 950px; height: ; ">
			</div><?php
			$depo = $db->prepare("SELECT * FROM programme_course WHERE dept_id=:dept_id");
			$arrDepo = array(':dept_id'=>$dept_id);
			$depo->execute($arrDepo);
			if($depo->rowCount()==0){ ?>
				<p style="color: red" align="center">No Course is Available For This Department</p><?php
			}else{ ?>
				<div id="tg-twocolumns" class="tg-twocolumns">
					<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
						<div id="tg-content" class="tg-content">
							<?php
		                    if((isset($_SESSION['success'])) OR ((isset($_SESSION['error'])) === true)){ ?>
		                        <div class="alert alert-info" align="center">
		                            <button class="close" data-dismiss="alert">
		                                <i class="ace-icon fa fa-times"></i>
		                            </button>
		                         <?php include("../mgchst-administrator/includes/feed-back.php"); ?>
		                        </div><?php 
		                    }  ?>
							<section class="tg-sectionspace tg-haslayout">
								<div class="tg-borderheading">
									<h2 align="center"><?php echo "$prog_course ONLINE APPLICATION FORM" ?></h2>
								</div>
								<div class="tg-events">
									<div class="row">
										<div class="col-md-12">
											<table>
												<thead>
													<th>Course Name</th>
					                                <th> Department </th>
					                                <th>Qualification & Requirement</th>
					                                <th>Certification</th>
					                                <th>Duration</th>
					                                <th>Programme </th>
					                                
												</thead>
												<tbody>
													<tr>
														<td><?php echo $course['prog_course']; ?></td>
						                                <td><?php $dept_id= $course['dept_id']; 
						                                	$boss = $proc->DepartmentDetailsNow($dept_id);
						                                	echo $dept_name = $boss['dept_name']; ?></td>
						                                <td style="text-align: justify; text-justify: inter-word;"><?php echo $course['requirement'] ?></td>
						                                <td style="text-align: justify; text-justify: inter-word;"><?php echo $course['certification'] ?></td>
						                                <td><?php echo $course['duration'] ?></td>
						                                <td><?php $prog_id = $course['prog_id'];
						                                	$faul = $department->getProgramme($prog_id);
						                                	echo $proc = $faul['prog_name'];
						                                 ?>
						                                 	
						                                </td>
						                                
													</tr>
												</tbody>
											</table>
											<div class="col-md-12" align="center">
												<a href="registration-form-section-one.php?programme_course=<?php echo $proc; ?>&&department_name=<?php echo $dept_name;?>&&programme_identification=<?php echo $procourse_id; ?>" class="btn btn-success">APPLY FOR <?php echo $course['prog_course']; ?> HERE</a>
											</div>
											
										</div>
									</div>
								</div>
							</section>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
						<aside id="tg-sidebar" class="tg-sidebar">
									
							<div class="tg-widget tg-widgetadmissionform">
								<div class="tg-widgetcontent">
									<h3>Admission Form 2017</h3>
									<div class="tg-description">
										<p>Interested candidates can apply online or download the application form.</p>
									</div>
									<a class="tg-btn tg-btnicon" href="Application-form/mgchst-application-form.pdf">
										<i class="fa fa-file-pdf-o"></i>
										<span>Download PDF</span>
									</a>
								</div>
							</div>
							
							<div class="tg-widget tg-widgetsearchcourse">
								<div class="tg-widgettitle">
									<h3>Student Portal</h3>
								</div>
								<div class="tg-widgetcontent">
									<form class="tg-formtheme tg-formsearchcourse">
										<fieldset>
											<div class="tg-inputwithicon">
												<i class="icon-book"></i>
												<input type="text" name="txtusername" class="form-control" placeholder="Username">
											</div>
											<div class="tg-inputwithicon">
												<i class="icon-layers"></i>
												
												<input type="password" name="txtpassword" class="form-control" placeholder="Password">	
												
											</div>
											<button type="submit" class="tg-btn">Login</button>
											
										</fieldset>
									</form>
								</div>
							</div>
						</aside>
					</div>
				</div><?php
			} ?>
		</div>
	</div>
</main>

<?php 
	include("../../inc/footer.php"); 
?>