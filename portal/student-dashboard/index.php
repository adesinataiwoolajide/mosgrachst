<?php 
	session_start();
    include("stallite-header.php"); 
    $regNumber = $details['regNumber'];
?>

<!-- <div class="tg-innerbanner">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<ol class="tg-breadcrumb">
					<li><a href="./">Home</a></li>
					<li class="tg-active">Student Dashboard</li>
				</ol>
			</div>
		</div>
	</div>
</div>
 -->

<section class="inner-header divider layer-overlay overlay-theme-colored-7">
    <div class="container pt-120 pb-60">
        <div class="section-content">
            <div class="row"> 
                <div class="col-md-12">
                    <ul class="breadcrumb"> 
                        <li><a href="./"><i class="fa fa-dashboard white-text"></i> MY DASHBOARD</a></li>
						<li class="tg-active"><i class="fa fa-book white-text"></i><?php echo $student_matric_num ?> DASHBOARD</li>
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
					<?php include("special-side-bar.php"); ?>			
				</div>
				<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
					<div id="tg-content" class="tg-content">
						<div class="tg-borderheading">
								
								<h3 align="center"><p style="color: green;"><?php  $neam = $stepone['surname']." ". $stepone['other_names']; echo strtoupper($neam); ?> WELCOME TO YOUR DASHBOARD.</p></h3>
							</div>
						<section class="tg-sectionspace tg-haslayout">
							
							<div class="tg-borderheading">
								<?php
			                    if((isset($_SESSION['success'])) OR ((isset($_SESSION['error'])) === true)){ ?>
			                        <div class="alert alert-info" align="center">
			                            <button class="close" data-dismiss="alert">
			                                <i class="ace-icon fa fa-times"></i>
			                            </button>
			                         <?php include("../../mgchst-administrator/includes/feed-back.php"); ?>
			                        </div><?php 
			                    }  ?>

			                    <div class="col-md-3">
					                <div class="widget widget-default widget-item-icon" onclick="location.href='my-profile.php?student_identification=<?php echo $regNumber ?>';">
					                	
					                    <div align="center"><?php
					                         $gos =$details['passport_url']; 
					                         if(!empty($gos)){ ?>             
					                        	<img src="<?php echo "../application-form/studentadmissionimages/".$gos ?>" style="width: 100px; height: 100px;" alt=""><?php
					                        }else{ ?>
					                        	<img src="../../mgchst-administrator/icons/nol.jpg" style="width: 100px; height: 100px;" alt=""><?php
					                    	} ?>
					                        <p align="center">My Biodata</p>
					                    </div>      
					                </div>                            
					            </div>

			                    <div class="col-md-3">
					                <div class="widget widget-default widget-item-icon" onclick="location.href='my-course-registration.php';">
					                    <div align="center">
					                        <img src="../../mgchst-administrator/icons/images (2).jpeg" style="width: 100px; height: 100px;" align="center">                    
					                        <p >Course Registration</p>
					                    </div>         
					                </div>                            
					            </div>
					            
					            <div class="col-md-3">
					                <div class="widget widget-default widget-item-icon" onclick="location.href='check-my-result.php';">
					                    <div align="center">
					                        <img src="../../mgchst-administrator/icons/images (1).jpeg" style="width: 100px; height: 100px;" align="center">                    
					                        <p >My Results</p>
					                    </div>         
					                </div>                            
					            </div>

					            <div class="col-md-3">
					                <div class="widget widget-default widget-item-icon" onclick="location.href='my-transcript.php';">
					                    <div align="center">
					                        <img src="../../mgchst-administrator/icons/unnamed (1).png" style="width: 100px; height: 100px;" align="center">                    
					                        <p >My Transcript</p>
					                    </div>         
					                </div>                            
					            </div>
					            
					            <div class="col-md-3">
					                <div class="widget widget-default widget-item-icon" onclick="location.href='my-medical-details.php?student_matric_number=<?php echo $student_matric_number ?>';">
					                    <div align="center">
					                        <img src="../../mgchst-administrator/icons/unit.jpeg" style="width: 100px; height: 100px;" align="center">                    
					                        <p >Medical</p>
					                    </div>         
					                </div>                            
					            </div>

					            <div class="col-md-3">
					                <div class="widget widget-default widget-item-icon" onclick="location.href='my-activities-log.php';">
					                    <div align="center">
					                        <img src="../../mgchst-administrator/icons/images.jpeg" style="width: 100px; height: 100px;" align="center">                  
					                        <p>My Activities</p>
					                    </div>         
					                </div>                            
					            </div>
					             
					             <div class="col-md-3">
					                <div class="widget widget-default widget-item-icon" onclick="location.href='';">
					                    <div align="center">
					                        <img src="../../mgchst-administrator/icons/learning.png" style="width: 100px; height: 100px;" align="center">                    
					                        <p >E-Learning</p>
					                    </div>         
					                </div>                            
					            </div>

					            <div class="col-md-3">
					                <div class="widget widget-default widget-item-icon" onclick="location.href='';">
					                    <div align="center">
					                        <img src="../../mgchst-administrator/icons/course=reg (5).png" style="width: 100px; height: 100px;" align="center">                    
					                        <p >School Forum</p>
					                    </div>         
					                </div>                            
					            </div>

					            <div class="col-md-3">
					                <div class="widget widget-default widget-item-icon" onclick="location.href='';">
					                    <div align="center">
					                        <img src="../../mgchst-administrator/icons/events.png" style="width: 100px; height: 100px;" align="center">                    
					                        <p >School Events</p>
					                    </div>         
					                </div>                            
					            </div>

					            <div class="col-md-3">
					                <div class="widget widget-default widget-item-icon" onclick="location.href='';">
					                    <div align="center">
					                        <img src="../../mgchst-administrator/icons/course=reg (2).png" style="width: 100px; height: 100px;" align="center">                    
					                        <p >School Bulletin</p>
					                    </div>         
					                </div>                            
					            </div>

					            <div class="col-md-3">
					                <div class="widget widget-default widget-item-icon" onclick="location.href='';">
					                    <div align="center">
					                        <img src="../../mgchst-administrator/icons/course=reg (3).jpg" style="width: 100px; height: 100px;" align="center">                    
					                        <p >My Assignment</p>
					                    </div>         
					                </div>                            
					            </div>

					            <div class="col-md-3">
					                <div class="widget widget-default widget-item-icon" onclick="location.href='';">
					                    <div align="center">
					                        <img src="../../mgchst-administrator/icons/unnamed (4).png" style="width: 100px; height: 100px;" align="center">                    
					                        <p >School Library</p>
					                    </div>         
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
	include("stallite-footer.php"); 
?>