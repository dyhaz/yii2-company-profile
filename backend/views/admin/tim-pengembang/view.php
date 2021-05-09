<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Siswa */

$this->title = $model->nama_lengkap;
$this->context->layout = 'admin';
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


						<p>
							<?= Html::a('Update', ['update', 'id' => $model->id_pengembang], ['class' => 'btn btn-primary']) ?>
							<?= Html::a('Hapus', ['delete', 'id' => $model->id_pengembang], [
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
								'id_pengembang',
								'nama_lengkap',
								'deskripsi:ntext',
								['attribute'=>'foto', 'format' => 'raw', 'value'=> empty($model->foto)?'-':Html::img('uploads/9vkvvvq/'.$model->foto,['width'=>100, 'height'=>100])],
							],
						]) ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>