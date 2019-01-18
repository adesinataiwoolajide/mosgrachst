<?php 
	session_start();
	include("../../connection/connection.php");
	include("../../inc/admission-nav.php"); 
	include("../../mgchst-administrator/super-admin/libs_dev/department/department-class.php");
    $department = new schoolDepartment($db);
    $title = 'MOSES & GRACE COLLEGE OF HEALTH SCIENCES AND TECHNOLOGY';
?>

<section class="inner-header divider layer-overlay overlay-theme-colored-7">
    <div class="container pt-120 pb-60">
        <div class="section-content">
            <div class="row"> 
                <div class="col-md-12">
                    <ul class="breadcrumb">
                    	<li><a href="select-the-school.php"><i class="fa fa-certificate white-text"></i> PREFERRED SCHOOL</a></li>

                    	<li><a href="admission-guildlines.php"><i class="fa fa-dashboard white-text"></i> ADMISSION GUILDLINES</a></li>
                        <li><a href="./"><i class="fa fa-dashboard white-text"></i> HOME PAGE<a></li>
						
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
					<aside id="tg-sidebar" class="tg-sidebar">
								
						<div class="tg-widget tg-widgetadmissionform">
							<div class="tg-widgetcontent">
								<h3>Admission Form For <?php echo date("Y"); ?></h3>
								<div class="tg-description">
									<p style="color: white">Interested candidates can apply online or download the application form.</p>
								</div>
								<a class="tg-btn tg-btnicon" href="online-application-form/mgchst-application-form.pdf" target="_blank">
									<i class="fa fa-file-pdf-o"></i>
									<span>Download The Form</span>
								</a>
							</div>
						</div>
					</aside>
				</div>
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
								
								<?php      
		                        $school = $db->prepare("SELECT * FROM school");
		                        $school->execute(); 
		                        while($see_School = $school->fetch()){ $school_id = $see_School['school_id']; ?>           
		                            <div class="col-md-6 col-xs-6">                                            
		                                <div class="widget widget-default widget-item-icon" onclick="location.href='select-your-course.php?school_name=<?php echo $see_School['school_name']?>&&school_identification=<?php echo $school_id ?>';">
		                                    <div align="center"><?php
		                                        if($school_id ==1){ ?>
		                                            <img src="../../images/form-logo.png" alt="Moses And Grace " style="width: 450px; height: 100px; "> <?php
		                                        }else{ ?>
		                                            <img src="../../images/afriweblogo.jpg" alt="Afriford University" style="width: 450px; height: 100px; "><?php
		                                        }  ?>                
		                                        <h4><p align="center" style="color: green"><b>
		                                            <?php echo $see_School['school_name']; ?></b></p>
		                                        </h4>
		                                    </div>         
		                                </div>                  
		                                <span class="help-block" style="color: red;" align="center">Please Select The School.</span>
		                            </div><?php
		                        } ?>    
								<br>	
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