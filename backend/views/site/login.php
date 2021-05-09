<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use  yii\captcha\Captcha;
$this->title = 'LOGIN';
$this->context->layout = 'login';
?>	
<div class="wrapper">

	<h1 class="glyphicons lock"><?= Html::encode($this->title) ?> <i></i></h1>

	<!-- Box -->
	<div class="widget widget-heading-simple widget-body-gray">
		
		<div class="widget-body">
		
			<!-- Form -->
			<?php $form = ActiveForm::begin(['id' => 'login-form', 'class' => 'form-horizontal margin-none']); ?>

            <?= $form->field($model, 'email', ['inputOptions' => ['placeholder'=>'Masukkan Email', 'class' => 'input-block-level margin-none']]) ?>

            <?= $form->field($model, 'password', ['inputOptions' => ['placeholder'=>'Masukkan Password', 'class' => 'input-block-level margin-none']])->passwordInput() ?>

			<?= $form->field($model, 'captcha')->widget(Captcha::className()); ?>
            
            <div class="separator bottom"></div> 
				<div class="row-fluid">
	            	<div class="span8">
	            		<?= $form->field($model, 'rememberMe')->checkbox() ?>
	            	</div>
	            	<div class="span4 center">
	                	<?= Html::submitButton('Login', ['class' => 'btn btn-block btn-inverse', 'name' => 'login-button']) ?>
	                </div>
                </div>

    		<?php ActiveForm::end(); ?>
			<!-- // Form END -->	
		</div>
		<div class="widget-footer">
			<p class="glyphicons restart"><i></i>Please enter your username and password ...</p>
		</div>
	</div>
	<!-- // Box END -->
	
</div>
<!-- // Wrapper END -->	
<!-- Themer -->
<div id="themer" class="collapse">
	<div class="wrapper">
		<span class="close2">&times; close</span>
		<h4>Themer <span>color options</span></h4>
		<ul>
			<li>Theme: <select id="themer-theme" class="pull-right"></select><div class="clearfix"></div></li>
			<li>Primary Color: <input type="text" data-type="minicolors" data-default="#ffffff" data-slider="hue" data-textfield="false" data-position="left" id="themer-primary-cp" /><div class="clearfix"></div></li>
			<li>
				<span class="link" id="themer-custom-reset">reset theme</span>
				<span class="pull-right"><label>advanced <input type="checkbox" value="1" id="themer-advanced-toggle" /></label></span>
			</li>
		</ul>
		<div id="themer-getcode" class="hide">
			<hr class="separator" />
			<button class="btn btn-primary btn-small pull-right btn-icon glyphicons download" id="themer-getcode-less"><i></i>Get LESS</button>
			<button class="btn btn-inverse btn-small pull-right btn-icon glyphicons download" id="themer-getcode-css"><i></i>Get CSS</button>
			<div class="clearfix"></div>
		</div>
	</div>
</div>