<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\grid\GridView;
$this->title = 'Tim Pengembang';
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

<h1>Tim Pengembang</h1>


<div class="innerLR innerB">

	<div class="row-fluid">
		<div class="widget widget-heading-simple widget-body-gray">
			<div class="widget-body">
				<div class="siswa-index">
				    <p>
				        <?= Html::a('Tambah Pengembang', ['create'], ['class' => 'btn btn-success']) ?>
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
				            'nama_lengkap',
				            ['attribute' => 'foto', 'format' => 'raw', 'value' => function($data) {
								if(empty($data->foto)) return '-';
								return Html::a($data->foto, 'uploads/9vkvvvq/'.$data->foto, ['target'=>'_blank']);
							}],
				            'deskripsi:ntext',
				            'peran',
				            'status',

				            ['class' => 'yii\grid\ActionColumn'],
				        ]
				    ]); ?>


				</div>

			</div>
		</div>
	</div>
	
</div>	