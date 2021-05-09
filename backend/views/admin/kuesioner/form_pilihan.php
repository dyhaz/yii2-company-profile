<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Siswa */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="pengembang-form">

    <?php $form = ActiveForm::begin([]); ?>

    <?= $form->field($model, 'pilihan1')->textInput() ?>
	
	<?= $form->field($model, 'pilihan2')->textInput() ?>
	
	<?= $form->field($model, 'pilihan3')->textInput() ?>
	
	<?= $form->field($model, 'pilihan4')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>