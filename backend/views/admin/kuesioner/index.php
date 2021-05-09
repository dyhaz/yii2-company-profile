<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\grid\GridView;
$this->title = 'Kuesioner';
$this->context->layout = 'admin';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="innerLR innerT">
	<div class="widget-search form-inline">
		<button type="button" class="btn btn-primary pull-right">Search <i class="icon-search"></i></button>
		<div class="overflow-hidden">
			<input type="text" value="" placeholder="Type your keywords ..">
		</div>
	</div>
</div>

<h1>Kuesioner</h1>


<div class="innerLR innerB">

	<div class="row-fluid">
		<div class="widget widget-heading-simple widget-body-gray">
			<div class="widget-body">
				<div class="siswa-index">
				    <p>
				        <?= Html::a('Tambah Kuesioner', ['create'], ['class' => 'btn btn-success']) ?>
				    </p>
				    <?php
				    // display pagination
				    echo \yii\widgets\LinkPager::widget([
				        'pagination'=>$dataProvider->pagination,
				    ]);
				    ?>
				    <?= GridView::widget([
				        'dataProvider' => $dataProvider,
				        'columns' => [
							['class' => 'yii\grid\SerialColumn'],

				            //'id',
				            'judul',
				            ['attribute' => 'waktu_buka', 'label' => 'Dibuka Pada'],
							['attribute' => 'waktu_tutup', 'label' => 'Ditutup Pada'],
				            'deskripsi:ntext',
				            [
								'class' => 'yii\grid\ActionColumn',
								'template' => '{view} {update} {delete}',
								'buttons' => [
									'update' => function($url, $model, $key) {
										return '<button type="button" class="btn btn-primary btn-xs" title="Update" 
													aria-label="Update" data-pjax="0" 
													onclick="location.href=&#039;?r=admin%2Fkuesioner%2Fadd-pertanyaan&amp;id='.$model->id_kuesioner.'&#039;">
													<i class="fa fa-pencil"></i></button>';
									}
								]
							],
				        ]
				    ]); ?>


				</div>

			</div>
		</div>
	</div>
	
</div>	