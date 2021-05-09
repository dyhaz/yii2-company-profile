<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Siswa */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="pengembang-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'isi1')->textarea(['rows' => 6]) ?>
	
	<?= $form->field($model, 'isi2')->textarea(['rows' => 5, 'class' => 'wysihtml5']) ?>
	
    <?= $form->field($model, 'preview')->fileInput() ?>

	<?php if(empty($model->status)) $model->status = '0'?>
	<?= $form->field($model, 'status')->radioList(array('0'=>'Simpan Saja','1'=>'Terbitkan')); ?>
	
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>