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
						<li><a href="check-my-result.php"><i class="fa fa-certificate white-text"></i> MY RESULT</a></li>
						<li><a href="my-transcript.php"><i class="fa fa-balance-scale white-text"></i> MY TRANSCRIPT</a></li>
						<li><a href="./"><i class="fa fa-dashboard white-text"></i>MY DASHBOAD</a></li>
						<li class="tg-active"><i class="fa fa-book white-text"></i><?php echo $student_matric_num ?> RESULT</li>
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
					<div id="tg-content" class="tg-content"><?php
												
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
								<h3><p align="center" style="color: green;">STUDENT ACADEMIC SESSION RESULT</p></h3>
								<h5><p align="center" style="color: green;"><?php echo $surname. " ". $other_names; ?> PLEASE SELECT ACADEMIC SESSION BELOW</p>
								</h5>
							</div>
							<div class="tg-borderheading">
								
			                    <div class="tg-addmission tg-addmissiondetail">

									
									<div class="col-sm-12" align="center"><?php
		                                $sess = $db->prepare("SELECT * FROM session ORDER BY session_name ASC");
		                                $sess->execute();
		                                while($jope = $sess->fetch()){
		                                	$session_name = $jope['session_name'];
		                                	//$session_identification = $jope['session_id'];  ?>
		                                	<div class="col-md-3">
												<div class="widget widget-default widget-item-icon" onclick="location.href='my-session-result.php?student_matric_num=<?php echo $student_matric_num ?>&&academic_session=<?php echo $session_name; ?>';">
														<div align="center">
															<img src="../../mgchst-administrator/icons/unnamed (1).png" alt="Academic Session Name" style="width: 100px; height: 100px; ">
												    	</div>
														<div class="tg-themepostcontent">
															<div class="tg-themeposttitle">
																<p style="color: green" align="center"><strong>
																	
																	<?php echo  $session_nam =
																	$jope['session_name']. " Session";
																	$session_name = $jope['session_name']; ?>
																	 </strong>		
																</p>
																
																
															</div>
															
														</div>
													
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