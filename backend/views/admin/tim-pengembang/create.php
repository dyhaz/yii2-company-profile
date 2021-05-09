<?php

use yii\helpers\Html;

$this->title = 'Tambah Pengembang: ' . ' ' . $model->nama_lengkap;
$this->params['breadcrumbs'][] = ['label' => 'Tim Pengembang', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_lengkap, 'url' => ['view', 'id' => $model->id_pengembang]];
$this->params['breadcrumbs'][] = 'Update';
$this->context->layout = 'admin';
?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="innerLR innerB">

	<div class="row-fluid">
		<div class="widget widget-heading-simple widget-body">
			<div class="widget-body">
				<div class="pengembang-update">


					<?= $this->render('_form', [
						'model' => $model,
					]) ?>

				</div>
			</div>
		</div>
	</div>
</div>