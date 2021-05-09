<?php

use yii\helpers\Html;

$this->title = 'Update Deskripsi ';
$this->params['breadcrumbs'][] = ['label' => 'Studio', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Studio', 'url' => ['view', 'id' => $model->id_studio]];
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