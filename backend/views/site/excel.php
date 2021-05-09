<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Siswa */

$this->params['breadcrumbs'][] = ['label' => 'Pengembang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <h1><?= Html::encode($this->title) ?></h1>
<div class="innerLR innerB">

	<div class="row-fluid">
		<div class="widget widget-heading-simple widget-body">
			<div class="widget-body">
				<div class="pengembang-update">
					<div class="siswa-view">


		

					<?= \app\components\ExcelGrid::widget([
						'dataProvider' => $dataProvider,
						'filterModel' => $searchModel,
						'filename' => 'testexcel',
						'properties' => [],
						'columns' => [
							['class' => 'yii\grid\SerialColumn'],
							'id_pengembang',
							'nama_lengkap',
							'deskripsi',
							'peran',
						],
					]) ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>