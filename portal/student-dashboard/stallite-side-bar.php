<?php $student_matric_number = $_SESSION['user_name']; $regNumber = $details['regNumber'];  ?>
<div class="wm-student-nav" style="margin-top: 20px">
	<p style="color: black">											
	<ul>
		<div class="tg-widgettitle">
			<h3>Quicklinks</h3>
		</div>
		<li class="">
			<a href="./">
				<span style="color: black"> <i class="fa fa-dashboard white-text"></i> My Dashboard</span>
            </a>
		</li>
		<li class="">
			<a href="see-course-form.php">
				<span><i class="fa fa-clone white-text"></i> My Course Form</span>
            </a>
		</li>
		<li class="">
			<a href="my-medical-details.php?student_matric_number=<?php echo $student_matric_number ?>">
				<span><i class="fa fa-code-fork white-text"></i> My Medical Details</span>
            </a>
		</li>	
		<li class="">
			<a href="my-course-registration.php">
				<span><i class="fa fa-check-square-o white-text"></i> Course Registration</span>
            </a>
		</li>	

		<li class="">
			<a href="check-my-result.php">
				<span><i class="fa fa-cog white-text"></i> Result Checker</span>
            </a>
		</li>
		<li class="">
			<a href="my-transcript.php">
				<span><i class="fa fa-certificate white-text"></i>  Transcript</span>
            </a>
		</li>
		<li class="">
			<a href="../student-dashboard/my-profile.php?student_identification=<?php echo $regNumber; ?>"><span> <i class="fa fa-user white-text"></i> My Profile</span>	
			</a>
		</li>
		<li class="">
			<a href="../student-dashboard/edit-my-profile.php?student_identification=<?php echo $regNumber; ?>&&student_matric_number=<?php echo $student_matric_num ?>"><span><i class="fa fa-pencil white-text"></i> Edit My Profile</span>	
			</a>
		</li>
		<li class="">
			<a href="my-activities-log.php"><i class="fa fa-cloud white-text"></i> Activity Log</a>
		</li>
		<li class="">
			<a href=""><i class="fa fa-users white-text"></i> Forum</a>
		</li>
		<li class="">
			<a href=""><i class="fa fa-book white-text"></i> Bulletin</a>
		</li>
		
	</ul></p>	
</div>	
