<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\Session;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'bootstrap/css/bootstrap.css',
        'bootstrap/css/responsive.css',
        //font icons
        'theme/fonts/glyphicons/css/glyphicons.css',
		'theme/scripts/plugins/forms/pixelmatrix-uniform/css/uniform.default.css',
        'css/site.css',
        'css/zabuto_calendar.css',
        'css/zabuto_calendar.css',
        'css/zabuto_calendar.css',
        'assets/font-awesome/css/font-awesome.css',
    ];
   
    public $js = [
        'assets/js/jquery.dcjqaccordion.2.7.js',
        'assets/js/jquery.nicescroll.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
	
	protected function getKodeAkses() {
		$session = new Session;
		$session->open();
		$id = $session['id_akses'];
		$session->close();
		return $id;
	}

    function __construct() {
        parent::__construct();
        $r =  \Yii::$app->getRequest()->getQueryParam('r');
        if($r === 'site/login') return;
		$kode_akses = $this->getKodeAkses();
		$this->css = array_merge($this->css, ['bootstrap/extend/jasny-fileupload/css/fileupload.css',
                'bootstrap/extend/bootstrap-wysihtml5/css/bootstrap-wysihtml5-0.0.2.css',
                'bootstrap/extend/bootstrap-select/bootstrap-select.css',
                'bootstrap/extend/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css',
                'theme/scripts/plugins/forms/bootstrap-datetimepicker/css/datetimepicker.css',
                'theme/scripts/plugins/system/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.min.css',
                'theme/scripts/plugins/color/jquery-miniColors/jquery.miniColors.css',
                'theme/scripts/plugins/notifications/notyfy/jquery.notyfy.css',
                'theme/scripts/plugins/notifications/notyfy/themes/default.css',
                'theme/scripts/plugins/notifications/Gritter/css/jquery.gritter.css',
                'theme/scripts/plugins/charts/easy-pie/jquery.easy-pie-chart.css',
                'theme/scripts/plugins/other/google-code-prettify/prettify.css',
                'theme/scripts/plugins/forms/select2/select2.css',
                'theme/scripts/plugins/other/pageguide/css/pageguide.css',
                'bootstrap/extend/bootstrap-image-gallery/css/bootstrap-image-gallery.min.css',]);
		$this->css = array_merge($this->css, [$kode_akses=='1'?'theme/css/style-default-menus-dark.css?1374506511':'theme/css/style-default-menus-light.css?1374506511',]);
        $this->js = array_merge($this->js, ['theme/scripts/plugins/system/jquery.event.move/js/jquery.event.move.js',
                'theme/scripts/plugins/system/jquery.event.swipe/js/jquery.event.swipe.js',
                'http://balupton.github.io/jquery-scrollto/lib/jquery-scrollto.js',
                'http://browserstate.github.io/history.js/scripts/bundled/html4+html5/jquery.history.js',
                'theme/scripts/plugins/system/jquery-ajaxify/ajaxify-html5.js',
                'theme/scripts/plugins/other/js-beautify/beautify.js',
                'theme/scripts/plugins/other/js-beautify/beautify-html.js',
                'theme/scripts/plugins/gallery/prettyphoto/js/jquery.prettyPhoto.js',
                'theme/scripts/plugins/system/jquery-ui/js/jquery-ui-1.9.2.custom.min.js',
                'theme/scripts/plugins/system/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js',
                'theme/scripts/plugins/system/modernizr.js',
                'bootstrap/js/bootstrap.min.js',
                'theme/scripts/plugins/other/jquery-slimScroll/jquery.slimscroll.js',
                'theme/scripts/plugins/other/holder/holder.js?1374506511',
                'theme/scripts/plugins/forms/pixelmatrix-uniform/jquery.uniform.min.js',
                'theme/scripts/demo/megamenu.js?1374506511',
                'bootstrap/extend/bootstrap-select/bootstrap-select.js',
                'bootstrap/extend/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js',
                'bootstrap/extend/jasny-fileupload/js/bootstrap-fileupload.js',
                'bootstrap/extend/bootbox.js',
                'bootstrap/extend/bootstrap-wysihtml5/js/wysihtml5-0.3.0_rc2.min.js',
                'bootstrap/extend/bootstrap-wysihtml5/js/bootstrap-wysihtml5-0.0.2.js',
                'theme/scripts/plugins/other/google-code-prettify/prettify.js',
                'theme/scripts/plugins/notifications/Gritter/js/jquery.gritter.min.js',
                'theme/scripts/plugins/notifications/notyfy/jquery.notyfy.js',
                'theme/scripts/plugins/color/jquery-miniColors/jquery.miniColors.js',
                'theme/scripts/plugins/forms/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js',
                'theme/scripts/plugins/system/jquery.cookie.js',
                'theme/scripts/plugins/forms/select2/select2.js',
                'theme/scripts/demo/themer.js',
                'theme/scripts/demo/twitter.js',
                'theme/scripts/plugins/charts/easy-pie/jquery.easy-pie-chart.js',
                'theme/scripts/plugins/charts/sparkline/jquery.sparkline.min.js',
                'theme/scripts/plugins/gallery/load-image/js/load-image.min.js',
                'bootstrap/extend/bootstrap-image-gallery/js/bootstrap-image-gallery.min.js',
                'theme/scripts/demo/index.js?1374506511',
                'theme/scripts/demo/common.js?1374506511']);
    }
}
