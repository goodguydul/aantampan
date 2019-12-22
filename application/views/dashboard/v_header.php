<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--========== The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags ==========-->
	<title><?= $pagetitle; ?></title>

	<!--==========Dependency============-->
	<?=link_tag(base_url('assets/css/bootstrap.min.css'))?>
	<?=link_tag(base_url('assets/css/font-awesome.min.css'))?>

	<!--==========Theme Styles==========-->
	<?=link_tag(base_url('assets/css/style.css'))?>
	
	<script src="<?=base_url('assets/js/jquery.js')?>"></script>
	<script src="<?=base_url('assets/js/bootstrap.js')?>"></script>

	<?=link_tag(base_url('assets/css/summernote/summernote.css'))?>
	<script src="<?=base_url('assets/css/summernote/summernote.js')?>"></script>
	<script src="<?=base_url('assets/js/sweetalert2.js')?>"></script>
	
	



	<!--========== HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries ==========-->
	<!--========== WARNING: Respond.js doesn't work if you view the page via file:// ==========-->
	<!--==========[if lt IE 9]>
	    <script src="js/html5shiv.min.js"></script>
	    <script src="js/respond.min.js"></script>
	<![endif]==========-->
</head>