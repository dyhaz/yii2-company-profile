<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Siswa */

$this->title = 'Deskripsi Studio';
$this->context->layout = 'admin';
$this->params['breadcrumbs'][] = ['label' => 'Studio', 'url' => ['index']];
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
							<?= Html::a('Update', ['update'], ['class' => 'btn btn-primary']) ?>
						</p>

						<?= DetailView::widget([
							'model' => $model,
							'attributes' => [						
								'des_perusahaan:ntext',
								'email',
								'fb',
								'twitter',
							],
						]) ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>