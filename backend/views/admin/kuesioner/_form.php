<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Siswa */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="pengembang-form">

    <?php $form = ActiveForm::begin([]); ?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>
	
	<?= $form->field($model, 'waktu_buka')->textInput(['maxlength' => true, 'id' => 'datetimepicker1']) ?>	
	
	<?= $form->field($model, 'waktu_tutup')->textInput(['maxlength' => true, 'id' => 'datetimepicker2']) ?>	
		
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
document.body.onload = function() {
$("#datetimepicker1").datetimepicker({
	format: 'yyyy-mm-dd hh:ii',
	startDate: "<?= date('Y-m-d')?> 10:00",
	minView: 0
});
$("#datetimepicker2").datetimepicker({
	format: 'yyyy-mm-dd hh:ii',
	startDate: "<?= date('Y-m-d')?> 10:00",
	minView: 0
});
}
</script>