<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>留言板</title>
	<?php foreach($css_files as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>
</head>
<body>
	<!-- 資料庫列印-->      
	<div class="container-fluid">
	<?php echo $output; ?>
	</div>
	<!-- 資料庫列印-->
	
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
	<?php foreach($js_files as $file): ?>
		<link type="text/js" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>
</body>
</html>