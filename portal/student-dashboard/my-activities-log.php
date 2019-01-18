<?php 
	session_start();
    include("stallite-header.php"); 
    $student_matric_num = $_SESSION['user_name'];
    $act = $db->prepare("SELECT * FROM activity WHERE user_details=:student_matric_num ORDER BY act_id DESC");
    $actArr = array(':student_matric_num'=>$student_matric_num);
    $act->execute($actArr);
    if($act->rowCount()==0){
    	$_SESSION['error'] = "$surname $other_names YOUR ACTIVITY LOG IS EMPTY";?>

		<script>window.location=("my-activities-log.php");</script><?php

	}else{
?>

<section class="inner-header divider layer-overlay overlay-theme-colored-7">
    <div class="container pt-120 pb-60">
        <div class="section-content">
            <div class="row"> 
                <div class="col-md-12">
                    <ul class="breadcrumb"> 
                    	
                    	<li><a href="my-activities-log.php"><i class="fa fa-cloud white-text"></i> MY ACTIVITY LOG</a></li>
                    	
						<li><a href="./"><i class="fa fa-dashboard white-text"></i> MY DASHBOAD</a></li>
						<li class="tg-active"><i class="fa fa-book white-text"></i><?php echo $student_matric_num ?> ACTIVITY LOG</li>
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
								<h3><p align="center" style="color: green;">STUDENT ACTIVITY LOG </p></h3>
								<h4><p align="center" style="color: green;"><?php echo $surname. " ". $other_names; ?> PLEASE KINDLY PREVIEW YOUR ACTIVITY LOG BELOW</p></h4>
							</div>
							<div class="tg-borderheading">
								
			                    <div class="tg-addmission tg-addmissiondetail">
									
									<div class="col-sm-12" align="center">
										<table class="table table-responsive">
											<thead>
												<th>S/N</t>
												<th>User Name</th>
												<th>Action Performed</th>
												<th>Time of Action</th>
											</thead>
											<tfoot>
												<th>S/N</t>
												<th>User Name</th>
												<th>Action Performed</th>
												<th>Time of Action</th>
											</tfoot>
											<tbody><?php
												$y=1;
												while($see_act = $act->fetch()){ ?>
													<tr>
														<td><?php echo $y ?></td>
														<td><?php echo $see_act['user_details'] ?></td>
														<td><?php echo $see_act['action'] ?></td>
														<td><?php echo $see_act['time_added'] ?></td>
													</tr><?php
													$y++;
												} ?>
											</tbody>
										</table>
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
}
?>