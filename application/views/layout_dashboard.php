<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.5,user-scalable=1">
	<title><?php if (isset($title)) {
	echo $title;
} ?></title>
	
	<?php if (isset($keywords)) { ?>
	<meta name="keywords" content="<?php echo $keywords;?>">
	<?php } ?>
	<?php if (isset($description)) { ?>
	<meta name="description" content="<?php echo $description;?>">
	<?php } ?>
	
	<script src="/assets/sb-admin2/vendor/jquery/jquery.min.js"></script>
	
	<?php if (isset($header)): ?>
	<?php foreach ($header as $file): ?>
		<?php echo $file; ?>
	<?php endforeach; ?>
	<?php endif; ?>

	<?php if (isset($js)): ?>
	<?php foreach ($js as $file): ?>
		<script src="<?php echo $file; ?>"></script>
	<?php endforeach; ?>
	<?php endif; ?>

	<?php if (isset($js_files)): ?>
	<?php foreach ($js_files as $file): ?>
		<script src="<?php echo $file; ?>"></script>
	<?php endforeach; ?>
	<?php endif; ?>
	
	<?php if (isset($css)): ?>
	<?php foreach ($css as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>
	<?php endif; ?>
	
	<?php if (isset($css_files)): ?>
	<?php foreach ($css_files as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>
	<?php endif; ?>

	<!-- Bootstrap -->
	<!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css"> -->
	
	<link rel="stylesheet" type="text/css" href="/assets/sb-admin2/vendor/fontawesome-free/css/all.min.css">
	<!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->
	<link type="text/css" rel="stylesheet" href="/assets/online/css.css" />

	<link href="/assets/sb-admin2/css/sb-admin-2.css" rel="stylesheet">

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->

</head>
<body id="page-top">


	<!-- Page Wrapper -->
  <div id="wrapper">
    <?php include 'sidebar.php';?>
		<div id="content-wrapper" class="d-flex flex-column">
			<!-- Main Content -->
      <div id="content">
				<?php include 'navbar.php';?>

				<div class="container-fluid">
					<?php if (isset($top_include)) {
	include $top_include;
}?>
					<?php if (isset($output)) { ?>
						<?php echo $output;?>					
					<?php } else { ?>
						<?php include $content;?>
					<?php } ?>
					 
				</div>
      </div>
      <!-- End of Main Content -->			

			<!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
		</div>
  </div>
  <!-- End of Page Wrapper -->


	<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script> -->
	<script src="/assets/online/bootstrap.min.js"></script>


  <!-- Core plugin JavaScript-->
  <script src="/assets/sb-admin2/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/assets/sb-admin2/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <!-- <script src="/assets/sb-admin2/vendor/chart.js/Chart.min.js"></script> -->

  <!-- Page level custom scripts -->
  <!-- <script src="/assets/sb-admin2/js/demo/chart-area-demo.js"></script> -->
  <!-- <script src="/assets/sb-admin2/js/demo/chart-pie-demo.js"></script> -->
	<script src="/assets/global.js"></script>
</body>
</html>