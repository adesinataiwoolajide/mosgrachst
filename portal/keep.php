$admission = $db->prepare("SELECT * FROM admission ORDER BY dept_name ASC");
						$admission->execute();
						if($admission->rowCount()==0){ ?>
							<h4><p align="center">No Letest News </p><?php
						}else{ ?>
							<div class="tg-container">
								<p align="center" style="color: green">Below are the Successful candidate shortlisted for the Admission into the school for 2017/2018 Academic Session.<br></p><br>
								<table class="table table-responsive table-bordered">
									<thead>
										<th>S/N</th>
										<th>FULL NAME</th>
										<th>REGISTRATION NUMBER</th>
										<th>COURSE</th>
										<th>LEVEL</th>
										<th>PROGRAMME</th>
										<th>FEES</th>
										<th>PRINT</th>
									</thead>
									<tfoot>
										<th>S/N</th>
										<th>FULL NAME</th>
										<th>REGISTRATION NUMBER</th>
										<th>COURSE</th>
										<th>LEVEL</th>
										<th>PROGRAMME</th>
										<th>FEES</th>
										<th>PRINT</th>
									</tfoot>
									<tbody><?php 
										$y=1;
										while($new =$admission->fetch()){ 
											$regNumber = $new['regNumber'];
											$det = $admin->getAdmissionStepOne($regNumber);
											$prog_id = $new['prog_id'];
											$pro = $department->getProgramme($prog_id); ?>
											<tr>
												<td><?php echo $y; ?></td>
												<td><?php echo $name = $det['surname']." ".$det['other_names']; ?></td>
												<td><?php echo $regNumber; ?></td>
												<td><?php  
													$procourse_id = $det['procourse_id'];
													$cose = $admin->getingIdentification($procourse_id); echo $nop = $cose['prog_course']
													?></td>
												
												<td><?php echo $new['level']; ?></td>
												<td><?php echo $pro['prog_name']; ?></td>
												<td><?php 
													if(($prog_id ==1) OR ($prog_id == 3)){?>  <a class="" href="application-form/school-fees
													/DEGREE SCHOOL FEES.pdf">
														<i class="fa fa-file-pdf-o"></i>
														<span>Download Fee</span>
													</a><?php
													}else{ ?>
														 <a class="" href="application-form/school-fees/DIPLOMA SCHOOL FEES.pdf"><?php
													} ?>
													
												</td>
												<td><a href="application-form/print-admission-letter.php?registration_number=<?php echo $regNumber;?>&&student_name=<?php echo $name; ?>&&programme=<?php echo $prog_id ?>">Admission Letter
												</td>
											
											</tr><?php 
											$y++;
										} ?>
									</tbody>
								</table>
							</div><?php
						} ?>
							