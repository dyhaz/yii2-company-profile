<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Siswa */

$this->title = $model->judul;
$this->context->layout = 'kontributor';
$this->params['breadcrumbs'][] = ['label' => 'Berita', 'url' => ['index']];
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
							<?= Html::a('Update', ['update', 'id' => $model->id_berita], ['class' => 'btn btn-primary']) ?>
							<?= Html::a('Hapus', ['delete', 'id' => $model->id_berita], [
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
								'id_berita',
								'judul',
								'isi1',
								'isi2:ntext',
								['attribute'=>'diterbitkan_pada', 'format' => 'raw', 'value'=> empty($model->diterbitkan_pada)?'-':$model->diterbitkan_pada],
								'views',
								['attribute'=>'preview', 'format' => 'raw', 'value'=> empty($model->preview)?'-':Html::img('uploads/58rhkk8/'.$model->preview,['width'=>100, 'height'=>100])],
							],
						]) ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>