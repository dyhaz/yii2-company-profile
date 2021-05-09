<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Siswa */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="pengembang-form">

    <?php $form = ActiveForm::begin([]); ?>

    <?= $form->field($model, 'pertanyaan')->textInput(['rows' => 6]) ?>
	
	<?= $form->field($model, 'jenis')->dropDownList(['1' => 'Isian', '2' => 'Pilihan']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>