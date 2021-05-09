<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\grid\GridView;
$this->title = 'Kredit';
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

<h1>Kredit</h1>


<div class="innerLR innerB">

	<div class="row-fluid">
		<div class="widget widget-heading-simple widget-body-gray">
			<div class="widget-body">
				<div class="siswa-index">
				    <!--<p>
				        <?= Html::a('Tambah Project', ['create'], ['class' => 'btn btn-success']) ?>
				    </p>-->
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

				            //'id_tamu',
							'nama',
							['attribute' => 'id_poin', 'label' => 'Id Pengguna', 'format' => 'raw', 'value' => function($data) use ($nama_tamu) {
								return $nama_tamu[$data->id_poin];
							}],
							'jumlah',
				            ['attribute' => 'diberikan_pada', 'value' => function($data) {
								return empty($data->diberikan_pada)?'-':$data->diberikan_pada;
							}],

				            [
								'class' => 'yii\grid\ActionColumn',
								'template' => '{link}',
								'buttons' => [
									'link' => function ($url,$model,$key) {
										return !empty($model->diberikan_pada)?'-':Html::a('Isi', 'index.php?r=admin/kredit/update&id='.$model->id_poin);
									},
								],
							]
						]
					]); ?>


				</div>

			</div>
		</div>
	</div>
	
</div>	