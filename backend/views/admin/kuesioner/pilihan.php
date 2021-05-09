<?php

use yii\helpers\Html;
use app\models\Pertanyaan;
$this->title = 'Pilihan ';
$this->params['breadcrumbs'][] = ['label' => 'Pilihan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pertanyaan, 'url' => ['view', 'id' => $model->id_pertanyaan]];
$this->params['breadcrumbs'][] = 'Edit';
$this->context->layout = 'admin';
?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="innerLR innerB">

	<div class="row-fluid">
		<div class="widget widget-heading-simple widget-body">
			<div class="widget-body">
				<div class="pengembang-update">

					<?= $this->render('form_pilihan', [
						'model' => $model,
					]) ?>

				</div>
			</div>
		</div>
	</div>
</div>