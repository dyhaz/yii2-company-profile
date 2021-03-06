<?php

use yii\helpers\Html;
use app\models\Pertanyaan;
$this->title = 'Edit Pertanyaan: ' . ' ' . $model->judul;
$this->params['breadcrumbs'][] = ['label' => 'Pertanyaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->judul, 'url' => ['view', 'id' => $model->id_kuesioner]];
$this->params['breadcrumbs'][] = 'Edit';
$this->context->layout = 'admin';
?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="innerLR innerB">

	<div class="row-fluid">
		<div class="widget widget-heading-simple widget-body">
			<div class="widget-body">
				<div class="pengembang-update">


					<?= $this->render('form_pertanyaan', [
						'model' => $pertanyaan,
					]) ?>

				</div>
			</div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="widget widget-heading-simple widget-body">
			<div class="widget-body">
				<div class="pengembang-update">


					<?= $this->render('tabel_pertanyaan', [
						'dataProvider' => $dataProvider,
					]) ?>

				</div>
			</div>
		</div>
	</div>
</div>