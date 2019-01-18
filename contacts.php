<?php 
	include("connection/connection.php");
	include("inc/header.php");
?>
		<!--************************************
				Header End
		*************************************-->
		
		<!--************************************
				Inner Banner Start
		*************************************-->
		<div class="tg-innerbanner">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<ol class="tg-breadcrumb">
							<li><a href="./">Home</a></li>
							<li class="tg-active">Contacts</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<!--************************************
				Inner Banner End
		*************************************-->
		<!--************************************
				Main Start						
		*************************************-->
		<main id="tg-main" class="tg-main tg-haslayout">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="tg-contactus tg-contactusvone">
							<div class="tg-titleborder">
								<h2>Contact Us</h2>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-7 col-lg-8">
									<div id="tg-officelocation" class="tg-officelocation"></div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-5 col-lg-4">
									<form class="tg-formtheme tg-formcontactus">
										<fieldset>
											<div class="form-group">
												<input type="text" class="form-control" name="name" placeholder="Name*">
											</div>
											<div class="form-group">
												<input type="email" class="form-control" name="email" placeholder="Email* (Your email address will not be published.)">
											</div>
											<div class="form-group">
												<input type="text" class="form-control" name="subject" placeholder="Subject">
											</div>
											<div class="form-group">
												<textarea class="form-control" placeholder="Comment"></textarea>
											</div>
											<button class="tg-btn" type="submit">submit</button>
										</fieldset>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="tg-ourothercampuses">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-titleborder">
								<h2>Our Campuses</h2>
							</div>
						</div>
						<div id="tg-campuscarousel" class="tg-campuscarousel owl-carousel tg-campuses">
							<div class="item">
								<div class="tg-campus">
									<figure class="tg-featuredimg">
										<a href="javascript:void(0);">
											<img src="images/campuses/img-12.jpg" alt="image description">
										</a>
							    </figure>
									<ul class="tg-capmusinfo">
										<li>
											<i class="icon-location"></i>
											<address>No. 3, Richard Street, Off Benin-Sapele Road, Obe, Benin-City, Edo State.</address>
										</li>
										<li>
											<i class="icon-phone-handset"></i>
											<span>+234 814 642 8512</span>
										</li>
										<li>
                                            <i class="icon-phone-handset"></i>
                                            <span>+234 802 946 3566</span>
                                        </li>
                                        <li>
                                            <i class="icon-phone-handset"></i>
                                            <span>+234 807 352 5624</span>
                                        </li>
										<li>
                                            <a href="mailto:info@mosgrachst.edu.ng">
                                                <i class="icon-envelope"></i>
                                                <span>info@mosgrachst.sch.ng</span>
                                            </a>
                                        </li>
									</ul>
								</div>
							</div>
							<div class="item">
								<div class="tg-campus">
									<figure class="tg-featuredimg">
										<a href="javascript:void(0);">
											<img src="images/campuses/img-13.jpg" alt="image description">
										</a>
							    </figure>
									<ul class="tg-capmusinfo">
										<li>
											<i class="icon-location"></i>
											<address>Akpakpa-Habitat, face CDPA, Cotonou, Republic of Benin</address>
										</li>
										<li>
                                            <i class="icon-phone-handset"></i>
                                            <span>+229 6 140 8554</span>
                                        </li>
                                        
                                        <li>
                                            <a href="mailto:query@domain.com">
                                                <i class="icon-envelope"></i>
                                                <span>afriford@mosgrachst.sch.ng</span>
                                            </a>
                                        </li>
									</ul>
								</div>
							</div>
					</div>
				</div>
			</div>
		</main>
		<!--************************************
				Main End
		*************************************-->
		<?php include("inc/footer.php"); ?>