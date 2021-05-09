<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
//use yii\widgets\Breadcrumbs;
//use frontend\assets\AppAsset;
use common\widgets\Alert;

//AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"> 
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
	<?php
	use yii\helpers\URL;?>
	
	<link href='<?= URL::base().'/css/style.css'?>' rel='stylesheet' id="mainCSS"/>
	<link href=<?= URL::base().'/css/skins.css'?> rel='stylesheet' id="mainCSS"/>
	<link href=<?= URL::base().'/css/skin.css'?> rel='stylesheet' id="stylesheet"/>
	<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css' />
	<script charset="utf-8" type="text/javascript" src="<?= URL::base().'/js/jquery.1.4.2.min.js'?>"></script>
	<script type="text/javascript" src="<?= URL::base().'/js/queryLoader.js'?>" ></script>
	<script type="text/javascript" src="<?= URL::base().'/js/jquery.backgroundposition.js'?>" ></script>
	<script type="text/javascript" src="<?= URL::base().'/js/jquery.smooth-scroll.js'?>" ></script>
	<script type="text/javascript" src="<?= URL::base().'/js/sp.js'?>" ></script>
	<script type="text/javascript" src="<?= URL::base().'/js/js.js'?>" ></script>
	<script type="text/javascript" src="<?= URL::base().'/js/skins.js'?>"></script>
</head>
<body id="body_pat" class="white">
<?php $this->beginBody() ?>

<div id="wrapper">
    <!------------------------- NAVIGATION -->
    <div id="navbarHolder">
        <?= $this->render('nav') ?>
    </div><!-- end div #navbarHolder -->


    <div class="container">
		<div id="logo" title="Nekergames" class="site-message-absolute">
            <div class="nav_logo_w"></div>
        </div>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <?= $this->render('footer') ?>
</footer>
<script type='text/javascript'>
    QueryLoader.init();
</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>