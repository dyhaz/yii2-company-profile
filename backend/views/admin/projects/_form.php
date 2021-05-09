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

    <?php echo $form->field($model, 'tahun')->widget(etsoft\widgets\YearSelectbox::classname(), [
		'yearStart' => 0,
		'yearEnd' => -10,
	]);	?>
	
    <?= $form->field($model, 'foto')->fileInput() ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

	<?= $form->field($model, 'platform')->dropDownList(['1' => 'Mobile', '2' => 'Windows', '3' => 'Browser']); ?>
	
	<?= $form->field($model, 'link_demo')->textInput(['maxlength' => true]) ?>
	
	<?php if(empty($model->status)) $model->status = '0'?>
	<?= $form->field($model, 'status')->radioList(array('0'=>'Sembunyikan','1'=>'Tampilkan')); ?>
	
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
