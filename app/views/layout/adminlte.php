<!DOCTYPE html>
<html>
<?php include '../app/views/includes/adminlte/head.php'; ?>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<?php include '../app/views/includes/adminlte/navbar.php'; ?>
		<?php include '../app/views/includes/adminlte/mainside.php'; ?>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<?php include '../app/views/includes/adminlte/header.php'; ?>
			<?php include '../app/views/includes/adminlte/maincontent.php'; ?>
			<?= $content_for_layout; ?>
			</div>
        	</div>
      		</div><!-- /.container-fluid -->
    		</section>
			</div>
			<!-- /.content-wrapper -->
			<?php include '../app/views/includes/adminlte/footer.php'; ?>
			<?php include '../app/views/includes/adminlte/controlsidebar.php'; ?>
	</div>
	<!-- ./wrapper -->
	<?php include '../app/views/includes/adminlte/footer_file.php'; ?>
</body>
</html>


