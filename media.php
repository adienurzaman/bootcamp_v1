<?php
if($_GET['modul']!="auth"){
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<?php include "views/template/head.php"; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

	<!-- Navbar -->
	<?php include "views/template/navbar.php"; ?>
	<!-- /.navbar -->

	<!-- Main Sidebar Container -->
	<?php include "views/template/sidebar.php"; ?>

	<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<?php include "views/template/content_header.php"; ?>
	    <!-- /.content-header -->

	    <!-- Main content -->
		<?php include "setting_url.php"; ?>
	    <!-- /.content -->
    </div>
	<!-- /.content-wrapper -->
	<?php include "views/template/footer.php"; ?>

	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Control sidebar content goes here -->
	</aside>
	<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php include "views/template/footerjs.php"; ?>
</body>
</html>
<?php }else{ 
	include "setting_url.php";
}
?>