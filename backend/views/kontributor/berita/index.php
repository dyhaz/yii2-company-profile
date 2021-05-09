<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\grid\GridView;
$this->title = 'Berita';
$this->context->layout = 'kontributor';
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

<h1>Berita</h1>


<div class="innerLR innerB">

	<div class="row-fluid">
		<div class="widget widget-heading-simple widget-body-gray">
			<div class="widget-body">
				<div class="siswa-index">
				    <p>
				        <?= Html::a('Tambah Berita', ['create'], ['class' => 'btn btn-success']) ?>
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
							'isi1',
				            ['attribute' => 'preview', 'format' => 'raw', 'value' => function($data) {
								if(empty($data->preview)) return '-';
								return Html::a($data->preview, 'uploads/58rhkk8/'.$data->preview, ['target'=>'_blank']);
							}],
							['attribute' => 'diterbitkan_pada', 'value' => function($data) {
								if(empty($data->diterbitkan_pada) || $data->status == '0') return '-';
								return $data->diterbitkan_pada;
							}],
				            ['class' => 'yii\grid\ActionColumn'],
				        ]
				    ]); ?>
				</div>

			</div>
		</div>
	</div>
	
</div>	