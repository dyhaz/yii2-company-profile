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

    <?= $form->field($model, 'gambar')->fileInput() ?>

    <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>
	
    <?= $form->field($model, 'berakhir_pada')->textInput(['maxlength' => true, 'id' => 'datetimepicker1', 'size' => '16']) ?>	
	
	<?= $form->field($model, 'harga')->textInput() ?>
	
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
}
</script>