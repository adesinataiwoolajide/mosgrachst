<?php 
	session_start();
    include("stallite-header.php"); 
    $det = $students->getStudentMatricNumber($student_matric_num);
    $level_name = $det['level'];
    $prog_id = $det['prog_id'];
    $dept_name = $det['dept_name'];
    $nnn = $department->getDepartmentDetailsName($dept_name);
    $dept_id = $nnn['dept_id'];
    $lel = $students->getLevelName($level_name);
    $level_id = $lel['level_id'];
?>

<section class="inner-header divider layer-overlay overlay-theme-colored-7">
    <div class="container pt-120 pb-60">
        <div class="section-content">
            <div class="row"> 
                <div class="col-md-12">
                    <ul class="breadcrumb"> 
                    	<li><a href="see-course-form.php"><i class="fa fa-book white-text"></i> MY COURSE FORM</a></li>
                    	<li><a href="my-course-registration.php"><i class="fa fa-briefcase white-text"></i> COURSE REGISTRATION</a></li>
                    	
						<li><a href="check-my-result.php"><i class="fa fa-certificate white-text"></i> MY SESSION RESULT</a></li>
						<li><a href="my-transcript.php"><i class="fa fa-balance-scale white-text"></i> MY ACADEMIC TRANSCRIPT</a></li>
						<li><a href="./"><i class="fa fa-dashboard white-text"></i> MY DASHBOARD</a></li>
						
					</ul>
                </div>
            </div>
        </div>
    </div>
</section>
<main id="tg-main" class="tg-main tg-haslayout">
	<div class="container">
		<div class="row">
			<div id="tg-twocolumns" class="tg-twocolumns">
				<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
					<?php include("stallite-side-bar.php"); ?>			
				</div>
				<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
					<div id="tg-content" class="tg-content">
						<?php				
	                    if((isset($_SESSION['success'])) OR ((isset($_SESSION['error'])) === true)){ ?>
	                        <div class="alert alert-info" align="center">
	                            <button class="close" data-dismiss="alert">
	                                <i class="ace-icon fa fa-times"></i>
	                            </button>
	                         <?php include("../../mgchst-administrator/includes/feed-back.php"); ?>
	                        </div><?php 
	                    }  ?>
						<section class="tg-sectionspace tg-haslayout">
							<div class="tg-borderheading">
								<h3><p align="center" style="color: green;">STUDENT COURSE FORM </p></h3>
								<h5><p align="center" style="color: green;"><?php echo $surname. " ". $other_names; ?> PLEASE SELECT THE ACADEMIC SESSION BELOW</p></h5>
							</div>
							<div class="tg-borderheading">
								
			                    <div class="tg-addmission tg-addmissiondetail"><!-- <?php
			                    	if($prog_id ==2){ ?>
							            <div class="col-md-12" align="center" style="margin-top: -30px;">
											<img src="../../images/form-logo.png" alt="../images/form-logo.png" style="width: 950px; height: ; ">
										</div><?php
									}else{ ?>
										<div class="col-md-12" align="center" style="margin-top: -30px;">
											<img src="../../images/afriweblogo.jpg" alt="../images/form-logo.png" style="width: 950px; height: ; " >
										</div><?php
									} ?> -->
									
									<div class="col-sm-12" align="center"><?php
		                                $sess = $db->prepare("SELECT * FROM session ORDER BY session_name ASC");
		                                $sess->execute();
		                                while($jope = $sess->fetch()){ 
		                                	$session_name = $jope['session_name'];
		                                	$session_identification = $jope['session_id']; ?>
		                                	<div class="col-md-3">
												<div class="widget widget-default widget-item-icon" onclick="location.href='view-my-course-form.php?student_matric_num=<?php echo $student_matric_num?>&&session_name=<?php echo $session_name?>&&session_identification=<?php echo $session_identification?>';">
														<div align="center">
															<img src="../../mgchst-administrator/icons/images (2).jpeg" alt="Academic Session Name" style="width: 100px; height: 100px; ">
												    	</div>
														<div class="tg-themepostcontent">
															<div class="tg-themeposttitle">
																<p style="color: green" align="center">
																	<strong><?php 
																	$ses =" Session";
																	echo  $session_nam =$jope['session_name']. " $ses"; 
																	$session_name = $jope['session_name'];?>

																	</strong>		
																</p>
																<p style="color: green">Please Click On The Session</p>
															</div>
															
														</div>
													</article>
												</div>
											</div><?php
										} ?>
									</div>
								</div>
                        	</div>
						</section>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</main>

<?php 
	include("../../inc/footer.php"); 
?>