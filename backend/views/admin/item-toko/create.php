<?php

use yii\helpers\Html;

$this->title = 'Tambah Item: ' . ' ' . $model->judul;
$this->params['breadcrumbs'][] = ['label' => 'Item Toko', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->judul, 'url' => ['view', 'id' => $model->id_item_toko]];
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