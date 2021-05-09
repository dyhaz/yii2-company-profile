<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Siswa */
/* @var $form yii\widgets\ActiveForm */


$this->title = 'Isikan Kredit: ' . ' ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama, 'url' => ['view', 'id' => $model->id_tamu]];
$this->params['breadcrumbs'][] = 'Update';
$this->context->layout = 'admin';
?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="innerLR innerB">

	<div class="row-fluid">
		<div class="widget widget-heading-simple widget-body">
			<div class="widget-body">
				<div class="pengembang-update">
					<div class="pengembang-form">

						<?php $form = ActiveForm::begin(); ?>
						
						<?php
						echo $form->field($model, 'id_tamu')->widget(Select2::classname(), [
							'data' => $para_tamu,
							'options' => ['placeholder' => 'Pilih pengguna ...'],
							'pluginOptions' => [
								'allowClear' => true
							],
						]);
						?>
						
						<?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

						
						<?= $form->field($model, 'jumlah')->textInput() ?>
						
						<?php if(empty($model->diberikan_pada)) $model->diberikan_pada = date('Y-m-d h:m:s')?>
						<?= $form->field($model, 'diberikan_pada')->radioList(array(date('Y-m-d h:m:s')=>'Isikan Kredit',''=>'Isikan Nanti')); ?>
						
						<div class="form-group">
							<?= Html::submitButton('Simpan' , ['class' => 'btn btn-success']) ?>
						</div>

						<?php ActiveForm::end(); ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>