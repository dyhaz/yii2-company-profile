<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Siswa */

$this->title = $model->judul;
$this->context->layout = 'admin';
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <h1><?= Html::encode($this->title) ?></h1>
<div class="innerLR innerB">

	<div class="row-fluid">
		<div class="widget widget-heading-simple widget-body">
			<div class="widget-body">
				<div class="pengembang-update">
					<div class="siswa-view">


						<p>
							<?= Html::a('Update', ['update', 'id' => $model->id_projects], ['class' => 'btn btn-primary']) ?>
							<?= Html::a('Hapus', ['delete', 'id' => $model->id_projects], [
								'class' => 'btn btn-danger',
								'data' => [
									'confirm' => 'Are you sure you want to delete this item?',
									'method' => 'post',
								],
							]) ?>
						</p>

						<?= DetailView::widget([
							'model' => $model,
							'attributes' => [
								'id_projects',
								'judul',
								'tahun',
								'keterangan:ntext',
								['attribute'=>'link_demo', 'format' => 'raw', 'value'=> empty($model->link_demo)?'-':Html::a($model->link_demo,$model->link_demo)],
								['attribute'=>'foto', 'format' => 'raw', 'value'=> empty($model->foto)?'-':Html::img('uploads/g7yrgfk/'.$model->foto,['width'=>100, 'height'=>100])],
							],
						]) ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>