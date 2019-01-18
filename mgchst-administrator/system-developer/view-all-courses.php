<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
    require("../super-admin/libs_dev/course/course_class.php");
    $course = new addNewSchoolCourse($db);
?>
<ul class="breadcrumb">
   <ul class="breadcrumb">
    
    <li><a href="./">Home</a></li> 
    <li><a href="view-all-courses.php">View All Courses</p></a></li>                     
    <li><a href="add-school-course.php">Add Course</a></li> 
    <li><a href="import-multiple-courses.php">Import Multiple Course</a></li> 
    <li class="active">View All Courses</li>   
</ul> 
</ul>
<!-- END BREADCRUMB -->                       
<?php
if((isset($_SESSION['success'])) OR ((isset($_SESSION['error'])) === true)){ ?>
    <div class="alert alert-info" align="center">
        <button class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
     <?php include("../includes/feed-back.php"); ?>
    </div><?php 
}  ?> 
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12"> 
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">School Course List</h3>
                    <?php include("../table-modal.php"); ?>
                </div>
                <div class="panel-body"><?php
                    $query = ("SELECT * FROM school_course ORDER BY course_code ASC");
                    $row = $course->seeAllSchoolCourses($query); ?>
                </div>
            </div>
        </div>
    </div>             
</div>  
<script>
    function confirmToDelete(){
        return confirm("Click Okay to Delete Course Details and Cancel to Stop");
    }
</script>

<script>
    function confirmToEdit(){
        return confirm("Click okay to Edit Course and Cancel to Stop");
    }
</script>      

<?php
    include("../log-out-modal.php");
    include("../table-footer.php");
?>
