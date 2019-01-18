<?php
    $access = $_SESSION['access'];;
?>
<!-- START PAGE CONTAINER -->
<div class="page-container">
    
    <!-- START PAGE SIDEBAR -->
    <div class="page-sidebar">
        <!-- START X-NAVIGATION -->
        <ul class="x-navigation">
            <li class="xn-logo">
                <a href="./"><img src="../../images/logo.png" alt="University of Education and knowledge" width="190" height="50" style="margin-top: -12px;" align="left"></a>
                <a href="#" class="x-navigation-control"></a>
            </li>
            <li class="xn-profile">
                <a href="./" class="profile-mini">
                    <img src="<?php echo "../staffimages/".$image['passport_url']; ?>" alt="<?php echo $_SESSION['name']; ?>" width="48" height="48"/>
                </a>
                <div class="profile">
                    <div class="profile-image">
                        <img src="<?php echo "../staffimages/".$image['passport_url']; ?>" alt="<?php echo $_SESSION['name']; ?>" width="100" height="100"/>
                    </div>
                    <div class="profile-data">
                        <div class="profile-data-name"><?php echo $_SESSION['name']; ?></div>
                        <div class="profile-data-title"><?php echo $_SESSION['user_name']; ?></div>
                    </div>
                    <div class="profile-controls">
                        <a href="./" class="profile-control-left"><span class="fa fa-info"></span></a>
                        <a href="./" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                    </div>
                </div>                                                                        
            </li>
            <li class="xn-title">Navigation</li>
            <li class="">
                <a href="./"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
            </li>  <?php
            if($access ==1){ ?>

                <li class="xn-openable">
                    <a href=""><span class="fa fa-group"></span> <span class="xn-text">Staff</span></a>
                    <ul>
                        <li><a href="add-staff-biodata.php"><span class="fa fa-align-center"></span> Add Bio Data</a></li>
                        <li><a href="view-all-school-staff.php"><span class="fa fa-align-justify"></span> View Staff Data</a></li>
                    </ul>         
                </li>

                <li class="xn-openable">
                    <a href=""><span class="fa fa-users"></span> <span class="xn-text">Students</span></a>
                    <ul>
                        <li><a href="add-students.php"><span class="fa fa-align-center"></span> Add Student Data</a></li>
                        
                        
                        <li><a href="all-school-student-details.php"><span class="fa fa-align-justify"></span> View Students Data</a></li>
                    </ul>         
                </li>

                <li class="xn-openable">
                    <a href=""><span class="fa fa-sitemap"></span> <span class="xn-text">Department</span></a>
                    <ul>
                        <li><a href="add-department.php"><span class="fa fa-align-center"></span> Add Department</a></li>
                        <li><a href="view-all-departments.php"><span class="fa fa-align-justify"></span> View Department</a></li>
                    </ul>         
                </li>
                
                <li class="xn-openable">
                    <a href=""><span class="fa fa-book"></span> <span class="xn-text">School Course</span></a>
                    <ul>
                        <li><a href="add-school-course.php"><span class="fa fa-align-center"></span> Add Course</a></li>
                        <li><a href="view-all-courses.php"><span class="fa fa-align-justify"></span> View Courses</a></li>
                    </ul>         
                </li>

                <li class="xn-openable">
                    <a href=""><span class="fa fa-sitemap"></span> <span class="xn-text">Departmental Courses</span></a>
                    <ul>
                        <li><a href="add-departmental-courses.php"><span class="fa fa-align-center"></span> Add Course</a></li>
                        <li><a href="view-departmental-courses.php"><span class="fa fa-align-justify"></span> View Courses</a></li>
                    </ul>         
                </li>
                <li class="xn-openable">
                    <a href=""><span class="fa fa-user"></span> <span class="xn-text">Admission</span></a>
                    <ul>
                        <li><a href="admission-list.php"><span class="fa fa-align-center"></span> Admission List</a></li>
                        <li><a href="admit-students.php"><span class="fa fa-align-justify"></span>Confirm Admission</a></li>
                        <li><a href="cancel-admission.php"><span class="fa fa-align-justify"></span> Cancel Admission</a></li>
                        <li><a href="session-admission.php"><span class="fa fa-align-justify"></span> Session Admission</a></li>
                    </ul>         
                </li>
                <li><a href="result-decision.php"><span class="fa fa-align-justify"></span> Result Panel</a></li>
                <li class="xn-openable">
                    <a href=""><span class="fa fa-user"></span> <span class="xn-text">Programme Course</span></a>
                    <ul>
                        <li><a href="add-programme-courses.php"><span class="fa fa-align-center"></span> Add Programme Course</a></li>
                        <li><a href="view-all-programme-courses.php"><span class="fa fa-align-justify"></span> View Programme Courses</a></li>
                    </ul>         
                </li>
                
                <li class="xn-openable">
                    <a href=""><span class="fa fa-group"></span> <span class="xn-text"> School Courses</span></a>
                    <ul>
                        <li><a href="add-school-course.php"><span class="fa fa-align-center"></span> Add Course</a></li>
                        <li><a href="view-all-courses.php"><span class="fa fa-align-justify"></span> View All Courses</a></li>
                    </ul>         
                </li>
                <li class="">
                    <a href="site-history.php"><span class="fa fa-cloud"></span> <span class="xn-text">My Activities</span></a>                        
                </li>
                <?php
            }elseif($access ==2){ ?>
                <li class="xn-openable">
                    <a href=""><span class="fa fa-user"></span> <span class="xn-text">Admission</span></a>
                    <ul>
                        <li><a href="admission-payments-lists.php"><span class="fa fa-align-justify"></span> Payments List</a></li>
                        <li><a href="confirm-admission-payments.php"><span class="fa fa-align-justify"></span>Confirm Payment</a></li>
                        <li><a href="pend-admission-payments.php"><span class="fa fa-align-justify"></span> Pend Payment</a></li>
                        
                    </ul>         
                </li>

                <li class="xn-openable">
                    <a href=""><span class="fa fa-sitemap"></span> <span class="xn-text">Exam Clearance</span></a>
                    <ul>
                        <li><a href="examination-clearance.php"><span class="fa fa-align-justify"></span> Confirm Clearance</a></li>
                        <li><a href="bursery-approved-result.php"><span class="fa fa-align-justify"></span> View All Clearance</a></li>
                        
                    </ul>         
                </li>

                <li class="xn-openable">
                    <a href=""><span class="fa fa-user"></span> <span class="xn-text">School Fees</span></a>
                    <ul>
                        <li><a href=""><span class="fa fa-align-justify"></span> Payments List</a></li>
                        <li><a href=""><span class="fa fa-align-justify"></span>Confirm Payment</a></li>
                        <li><a href=""><span class="fa fa-align-justify"></span> Pend Payment</a></li>
                        
                    </ul>         
                </li>
                
                <li class="">
                    <a href="my-activities.php"><span class="fa fa-cloud"></span> <span class="xn-text">My Activities</span></a>                        
                </li><?php

            }elseif($access ==3){ ?>

                <li class="xn-openable">
                    <a href=""><span class="fa fa-book"></span> <span class="xn-text">School Course</span></a>
                    <ul>
                        <li><a href="add-school-course.php"><span class="fa fa-align-center"></span> Add Course</a></li>
                        <li><a href="view-all-courses.php"><span class="fa fa-align-justify"></span> View Courses</a></li>
                    </ul>         
                </li>

                <li class="xn-openable">
                    <a href=""><span class="fa fa-book"></span> <span class="xn-text">Department Courses</span></a>
                    <ul>
                        <li><a href="add-departmental-courses.php"><span class="fa fa-align-center"></span> Add Course</a></li>
                        <li><a href="view-departmental-courses.php"><span class="fa fa-align-justify"></span>Departmental Courses</a></li>
                    </ul>         
                </li>
                 <li><a href="session-admission.php"><span class="fa fa-align-justify"></span> Session Admission</a></li>
                <li><a href="all-students-details.php"><span class="fa fa-users"></span> Students</a></li>
                
                <li class="xn-openable">
                    <li class="xn-openable">
                        <a href=""><span class="fa fa-group"></span>Allocate Course</a>
                        <ul>
                            <li><a href="allocate-lecturer-course.php"><span class="fa fa-align-center"></span> Allocate Lecturer</a></li>
                            <li><a href="view-allocated-courses.php"><span class="fa fa-align-justify"></span> Allocated Courses</a></li>
                        </ul>
                    </li>
                </li>
                <li class="xn-openable">
                    <li class="xn-openable">
                        <a href=""><span class="fa fa-group"></span> Lecturer</a>
                        <ul>
                            <li><a href="view-departmental-lecturers.php"><span class="fa fa-align-justify"></span> View Lecturers</a></li>
                        </ul>
                    </li>
                </li>
                <li><a href="result-decision.php"><span class="fa fa-align-justify"></span> Result Panel</a></li>
                <!-- <li class="xn-openable">
                    <a href=""><span class="fa fa-book"></span> <span class="xn-text">Results</span></a>
                    <ul>
                        
                        <li><a href="course-results.php"><span class="fa fa-align-justify"></span> Course Results</a></li>
                        <li><a href=""><span class="fa fa-align-justify"></span> Transcripts</a></li>
                        our-departmental-courses
                    </ul>
                </li> -->
                
                <li class="">
                    <a href="my-activities.php"><span class="fa fa-cloud"></span> <span class="xn-text">My Activities</span></a>                        
                </li><?php
            }elseif($access == 4){ ?>

                <li><a href="my-courses.php"><span class="fa fa-align-justify"></span> View My Courses</a></li>

                <li><a href="all-students-details.php"><span class="fa fa-users"></span> Students</a></li>
                

                <li class="xn-openable">
                    <a href="#"><span class="fa fa-align-center"></span> Transcripts</a>
                    <ul>
                        <li><a href=""><span class="fa fa-align-center"></span> View Transcript</a></li>
                        <li><a href=""><span class="fa fa-align-justify"></span> Alter Transcript</a></li>
                    </ul>
                </li>
                <li><a href="session-admission.php"><span class="fa fa-align-justify"></span> Session Admission</a></li>

              
                <li><a href="my-activities.php"><span class="fa fa-cloud"></span> My Activities</a></li>
                           
                <?php
            } elseif($access ==5){ ?>

                <li class="xn-openable">
                    <a href=""><span class="fa fa-users"></span> <span class="xn-text">Students</span></a>
                    <ul>
                        <li><a href="add-students.php"><span class="fa fa-align-center"></span> Add Student Data</a></li>
                        
                        
                        <li><a href="all-school-student-details.php"><span class="fa fa-align-justify"></span> View Students Data</a></li>
                    </ul>         
                </li>
               
                <li><a href="admission-list.php"><span class="fa fa-users"></span> Admission List</a></li>
                <li><a href="admit-students.php"><span class="fa fa-align-justify"></span>Confirm Admission</a></li>
                <li><a href="cancel-admission.php"><span class="fa fa-pencil"></span> Cancel Admission</a></li>
                <li><a href="session-admission.php"><span class="fa fa-align-justify"></span> Session Admission</a></li>
                <li class="">
                    <a href="my-activities.php"><span class="fa fa-cloud"></span> <span class="xn-text">My Activities</span></a>                        
                </li><?php
            } elseif($access ==6){ ?>

                <li><a href="result-decision.php"><span class="fa fa-align-justify"></span> Result Panel</a></li>
               
                <li><a href=""><span class="fa fa-users"></span> Student Transcript</a></li>
                
                <li class="">
                    <a href="my-activities.php"><span class="fa fa-cloud"></span> <span class="xn-text">My Activities</span></a>                        
                </li><?php
            }elseif($access ==11){ ?>

                <li class="xn-openable">
                    <a href=""><span class="fa fa-group"></span> <span class="xn-text">Staff</span></a>
                    <ul>
                        <li><a href="add-staff-biodata.php"><span class="fa fa-align-center"></span> Add Bio Data</a></li>
                        <li><a href="view-all-school-staff.php"><span class="fa fa-align-justify"></span> View Staff Data</a></li>
                    </ul>         
                </li>

                <li class="xn-openable">
                    <a href=""><span class="fa fa-users"></span> <span class="xn-text">Students</span></a>
                    <ul>
                        <li><a href="add-students.php"><span class="fa fa-align-center"></span> Add Student Data</a></li>
                        <li><a href="add-multiple-students.php"><span class="fa fa-users"></span> Add Multiple Students</a></li>
                        
                        <li><a href="all-school-student-details.php"><span class="fa fa-align-justify"></span> View Students Data</a></li>
                    </ul>         
                </li>

                <li class="xn-openable">
                    <a href=""><span class="fa fa-sitemap"></span> <span class="xn-text">Department</span></a>
                    <ul>
                        <li><a href="add-department.php"><span class="fa fa-align-center"></span> Add Department</a></li>
                        <li><a href="view-all-departments.php"><span class="fa fa-align-justify"></span> View Department</a></li>
                    </ul>         
                </li>
                
                <li class="xn-openable">
                    <a href=""><span class="fa fa-book"></span> <span class="xn-text">School Course</span></a>
                    <ul>
                        <li><a href="add-school-course.php"><span class="fa fa-align-center"></span> Add Course</a></li>
                        <li><a href="view-all-courses.php"><span class="fa fa-align-justify"></span> View Courses</a></li>
                    </ul>         
                </li>

                <li class="xn-openable">
                    <a href=""><span class="fa fa-sitemap"></span> <span class="xn-text">Departmental Courses</span></a>
                    <ul>
                        <li><a href="add-departmental-courses.php"><span class="fa fa-align-center"></span> Add Course</a></li>
                        <li><a href="view-departmental-courses.php"><span class="fa fa-align-justify"></span> View Courses</a></li>
                    </ul>         
                </li>
                <li class="xn-openable">
                    <a href=""><span class="fa fa-user"></span> <span class="xn-text">Admission</span></a>
                    <ul>
                        <li><a href="admission-list.php"><span class="fa fa-align-center"></span> Admission List</a></li>
                        <li><a href="admit-students.php"><span class="fa fa-align-justify"></span>Confirm Admission</a></li>
                        <li><a href="cancel-admission.php"><span class="fa fa-align-justify"></span> Cancel Admission</a></li>
                        <li><a href="session-admission.php"><span class="fa fa-align-justify"></span> Session Admission</a></li>
                    </ul>         
                </li>
                <li><a href="result-decision.php"><span class="fa fa-align-justify"></span> Result Panel</a></li>
                <li class="xn-openable">
                    <a href=""><span class="fa fa-user"></span> <span class="xn-text">Programme Course</span></a>
                    <ul>
                        <li><a href="add-programme-courses.php"><span class="fa fa-align-center"></span> Add Programme Course</a></li>
                        <li><a href="view-all-programme-courses.php"><span class="fa fa-align-justify"></span> View Programme Courses</a></li>
                    </ul>         
                </li>
                <li class="xn-openable">
                    <a href=""><span class="fa fa-group"></span> <span class="xn-text"> User</span></a>
                    <ul>
                        
                        <li><a href="view-all-users.php"><span class="fa fa-align-justify"></span> View All Users</a></li>
                    </ul>         
                </li>
                <li class="xn-openable">
                    <a href=""><span class="fa fa-group"></span> <span class="xn-text"> School Courses</span></a>
                    <ul>
                        <li><a href="add-school-course.php"><span class="fa fa-align-center"></span> Add Course</a></li>
                        <li><a href="view-all-courses.php"><span class="fa fa-align-justify"></span> View All Courses</a></li>
                    </ul>         
                </li>
                <li class="">
                    <a href="site-history.php"><span class="fa fa-cloud"></span> <span class="xn-text">Site Activities</span></a>                        
                </li>
                <li class="">
                    <a href="my-activities.php"><span class="fa fa-cloud"></span> <span class="xn-text">My Activities</span></a>                        
                </li><?php
            }else{ ?>
                <li class="">
                    <a href="../log-out.php"><span class="fa fa-cloud"></span> <span class="xn-text">Log Out</span></a>                        
                </li><?php
            } ?>                  
              
        </ul>
        <!-- END X-NAVIGATION -->
    </div>
    <div class="page-content">
               
        <!-- START X-NAVIGATION VERTICAL -->
        <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
            <!-- TOGGLE NAVIGATION -->
            <li class="xn-icon-button">
                <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
            </li>
            <!-- END TOGGLE NAVIGATION -->
            <!-- SEARCH -->
            <li class="xn-search">
                <form role="form">
                    <input type="text" name="search" placeholder="Search..."/>
                </form>
            </li>   
            <!-- END SEARCH -->
            <!-- SIGN OUT -->
            <li class="xn-icon-button pull-right">
                <a href="../log-out.php" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
            </li> 
            <!-- END SIGN OUT -->
            <!-- MESSAGES -->
            
            <!-- END TASKS -->
        </ul>