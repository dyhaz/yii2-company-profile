<?php
use yii\web\Session;
$session = new Session;
$session->open();
?>
<div class="navbar main">
	<!-- Menu Toggle Button -->
	<button type="button" class="btn btn-navbar pull-left visible-phone">
		<span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
	</button>
	<!-- // Menu Toggle Button END -->
	
				<!-- Not Blank page -->
	
				<!-- Full Top Style -->
	
	<?php
	use yii\widgets\Menu;
	echo Menu::widget([
	    'items' => [
	        ['label' => 'Dashboard', 'url' => ['kontributor/dashboard'], 'template' => '<a class="glyphicons dashboard" href="{url}"><i></i>{label}</a>'],
			['label' => 'Berita', 'url' => ['kontributor/berita'], 'template' => '<a class="glyphicons pencil" href="{url}"><i></i>{label}</a>'],
	    ],
		'options' => [
			'class' => 'topnav pull-left'
		],
		'activateParents'=>true,
	]);
	?>

	<!-- // Full Top Style END -->
				
	<!-- // Not Blank Page END -->
				
				
				<!-- Top Menu Right -->
	<ul class="topnav pull-right hidden-phone">
	
						<!-- Themer -->
		<li><a href="#themer" data-toggle="collapse" class="glyphicons eyedropper single-icon"><i></i></a></li>
		<!-- // Themer END -->
						
		<!-- Language menu -->
		<li class="hidden-phone dropdown dd-1 dd-flags" id="lang_nav">
			<a href="#" data-toggle="dropdown"><img src="./theme/images/lang/en.png" alt="en" /></a>
	    	<ul class="dropdown-menu pull-right">
	      		<li class="active"><a href="?module=admin&amp;page=index&amp;url_rewrite=&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-default-menus-dark&amp;sidebar_type=collapsible&amp;lang=en" title="English"><img src="./theme/images/lang/en.png" alt="English"> English</a></li>
	      		<li><a href="?module=admin&amp;page=index&amp;url_rewrite=&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-default-menus-dark&amp;sidebar_type=collapsible&amp;lang=ro" title="Romanian"><img src="./theme/images/lang/ro.png" alt="Romanian"> Romanian</a></li>
	      		<li><a href="?module=admin&amp;page=index&amp;url_rewrite=&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-default-menus-dark&amp;sidebar_type=collapsible&amp;lang=it" title="Italian"><img src="./theme/images/lang/it.png" alt="Italian"> Italian</a></li>
	      		<li><a href="?module=admin&amp;page=index&amp;url_rewrite=&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-default-menus-dark&amp;sidebar_type=collapsible&amp;lang=fr" title="French"><img src="./theme/images/lang/fr.png" alt="French"> French</a></li>
	      		<li><a href="?module=admin&amp;page=index&amp;url_rewrite=&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-default-menus-dark&amp;sidebar_type=collapsible&amp;lang=pl" title="Polish"><img src="./theme/images/lang/pl.png" alt="Polish"> Polish</a></li>
	    	</ul>
		</li>
		<!-- // Language menu END -->
	
		<!-- Profile / Logout menu -->
		<li class="account dropdown dd-1">
								<a data-toggle="dropdown" href="my_account_advanced.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-default-menus-dark&amp;sidebar_type=collapsible" class="glyphicons logout lock"><span class="hidden-tablet hidden-phone hidden-desktop-1"><?= is_object($session['user'])?$session['user']->nama_lengkap:''?></span><i></i></a>
			<ul class="dropdown-menu pull-right">
				<li><a href="my_account_advanced.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-default-menus-dark&amp;sidebar_type=collapsible" class="glyphicons cogwheel">Settings<i></i></a></li>
				<li><a href="my_account_advanced.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-default-menus-dark&amp;sidebar_type=collapsible" class="glyphicons camera">My Photos<i></i></a></li>
				<li class="profile">
					<span>
						<span class="heading">Profile <a href="my_account_advanced.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-default-menus-dark&amp;sidebar_type=collapsible" class="pull-right text-primary text-weight-regular">edit</a></span>
						<a href="my_account_advanced.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-default-menus-dark&amp;sidebar_type=collapsible" class="img thumb">
							<img data-src="holder.js/51x51/dark" alt="Avatar" />
						</a>
						<span class="details">
							<a href="my_account_advanced.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-default-menus-dark&amp;sidebar_type=collapsible" class="strong text-regular">Mosaic Pro</a>
							contact@mosaicpro.biz
						</span>
						<span class="clearfix"></span>
					</span>
				</li>
				<li>
					<span>
						<a class="btn btn-default btn-mini pull-right" href="index.php?r=site/logout">Sign Out</a>
					</span>
				</li>
			</ul>
							</li>
		<!-- // Profile / Logout menu END -->
		
	</ul>
	<!-- // Top Menu Right END -->
	
	<ul class="topnav pull-right hidden-phone">
		<li><a href="" class="glyphicons envelope single-icon"><i></i><span class="badge fix badge-primary">5</span></a></li>
		<li><a href="" class="glyphicons cup single-icon"><i></i><span class="badge fix badge-primary">7</span></a></li>
		<li class="hidden-tablet"><a href="" class="glyphicons comments single-icon"><i></i><span class="badge fix badge-primary">3</span></a></li>
	</ul>
				<div class="clearfix"></div>
	
</div>