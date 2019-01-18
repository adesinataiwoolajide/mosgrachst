<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
?>
<ul class="breadcrumb">
   <ul class="breadcrumb">
        <li><a href="./">Home</a></li>                    
        <!-- <li><a href="add-user.php">Add User</a></li>   -->
        <li class="active">View All Users</li>   
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
                    <h3 class="panel-title"><p style="color: green">List of All The System Users</p></h3>
                    <?php include("../table-modal.php"); ?>
                </div>
                <div class="panel-body"><?php
                $query=("SELECT * FROM admin_login WHERE access_level <= 10 ORDER BY full_name ASC");
					$row = $register->viewAllUsers($query); ?>
                </div>
            </div>
        </div>
    </div>             
</div>  
<script>
    function confirmToDelete(){
        return confirm("Click Okay to Activate User's Account and Cancel to Stop");
    }
</script>

<script>
    function confirmToEdit(){
        return confirm("Click okay to De-Activate User's Account and Cancel to Stop");
    }
</script>      

<?php
    include("../log-out-modal.php");
	include("../table-footer.php");
?>
