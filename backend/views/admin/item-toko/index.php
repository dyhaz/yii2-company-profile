<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\grid\GridView;
$this->title = 'Item Toko';
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

<h1>Item Toko</h1>


<div class="innerLR innerB">

	<div class="row-fluid">
		<div class="widget widget-heading-simple widget-body-gray">
			<div class="widget-body">
				<div class="siswa-index">
				    <p>
				        <?= Html::a('Tambah Item', ['create'], ['class' => 'btn btn-success']) ?>
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
				            ['attribute' => 'gambar', 'format' => 'raw', 'value' => function($data) {
								if(empty($data->gambar)) return '-';
								return Html::a($data->gambar, 'uploads/shop/'.$data->gambar, ['target'=>'_blank']);
							}],
				            'deskripsi:ntext',
							'berakhir_pada:ntext',
							'harga',

				            ['class' => 'yii\grid\ActionColumn'],
				        ]
				    ]); ?>


				</div>

			</div>
		</div>
	</div>
	
</div>	