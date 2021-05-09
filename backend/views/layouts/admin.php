<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\web\YiiAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html class="animations fluid top-full menuh-top sticky-top sidebar sidebar-full sidebar-collapsible sidebar-width-mini sticky-sidebar sidebar-hat">
<head>
	<!-- Meta -->
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
    <?= Html::csrfMetaTags() ?>

    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>
    <!-- FireBug Lite -->
	<!-- <script src="https://getfirebug.com/firebug-lite-debug.js"></script> -->

	<!-- JQuery -->
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

	<!-- LESS.js Library -->
	<script src="theme/scripts/plugins/system/less.min.js"></script>
	
	<!-- Global -->
	<script>
	//<![CDATA[
	var basePath = '',
		commonPath = '/';

	// colors
	var primaryColor = '#e5412d',
		dangerColor = '#b55151',
		successColor = '#609450',
		warningColor = '#ab7a4b',
		inverseColor = '#45484d';

	var themerPrimaryColor = primaryColor;
	//]]>
	</script>
</head>
<body class="document-body">
	<?php $this->beginBody() ?>
	<!-- Main Container Fluid -->
	<div class="container-fluid menu-hidden sidebar-hidden-phone fluid menu-left">
		<!-- Sidebar menu & content wrapper -->
		<div id="wrapper">
			<?= $this->render('admin/menu') ?>
			<!-- Content -->
			<div id="content">
				<!-- Top navbar -->
				<?= $this->render('admin/nav') ?>
				<!-- Top navbar END -->
				<?= $content ?>
			</div>
			<!-- Content END -->
		</div>
		<div class="clearfix"></div>
		<!-- Sidebar menu & content wrapper END -->
		<div id="footer" class="hidden-print">
		<?= $this->render('admin/footer') ?>
		</div>
	</div>

	<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>