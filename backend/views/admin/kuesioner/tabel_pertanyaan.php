<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\grid\GridView;
?>

<h1>Pertanyaan</h1>
	<div class="siswa-index">
		<?php
		// display pagination
		echo \yii\widgets\LinkPager::widget([
			'pagination'=>$dataProvider->pagination,
		]);
		?>
		<?php 
		$tes = GridView::widget([
			'dataProvider' => $dataProvider,
			'columns' => [
				['class' => 'yii\grid\SerialColumn'],

				//'id',
				'pertanyaan',
				['attribute' => 'jenis', 'value' => function($data) {
					return $data->jenis=='1'?'Isian':'Pilihan';
				}],
				['class' => 'yii\grid\ActionColumn',
				'template' => '{delete}',
				'buttons' => [
					'view' => function ($url,$model,$key) {
						return Html::a('<span class="fa fa-eye"></span>', 'index.php?r=admin/pertanyaan/view&id='.$model->id_pertanyaan);
					},
					'delete' => function ($url,$model,$key) {
						return Html::a('<span class="fa fa-trash-o"></span> Hapus', 'index.php?r=admin/kuesioner/delete-pertanyaan&id='.$model->id_pertanyaan);
					},
				],],
			],
		]);
		echo($tes);
		?>
	</div>