<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\grid\GridView;
$this->title = 'Projects';
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

<h1>Projects</h1>


<div class="innerLR innerB">

	<div class="row-fluid">
		<div class="widget widget-heading-simple widget-body-gray">
			<div class="widget-body">
				<div class="siswa-index">
				    <p>
				        <?= Html::a('Tambah Project', ['create'], ['class' => 'btn btn-success']) ?>
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
							'tahun',
				            ['attribute' => 'foto', 'format' => 'raw', 'value' => function($data) {
								if(empty($data->foto)) return '-';
								return Html::a($data->foto, 'uploads/g7yrgfk/'.$data->foto, ['target'=>'_blank']);
							}],
				            'keterangan:ntext',
							['attribute' => 'platform', 'value' => function($data) {
								$platfom = array('Mobile (Android/iOS)', 'Windows', 'Browser');
								if(empty($data->platform) || intval($data->platform) > sizeof($platfom)) return '-';
								return $platfom[intval($data->platform) - 1];
							}],
				            'status',

				            ['class' => 'yii\grid\ActionColumn'],
				        ]
				    ]); ?>
				</div>

			</div>
		</div>
	</div>
	
</div>	