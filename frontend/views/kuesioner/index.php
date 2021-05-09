<?php

use yii\helpers\Html;
use yii\grid\GridView;
$this->context->layout = 'main_bootstrap';
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Isi Kuesioner';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="siswa-index">

    <h1><?= Html::encode($this->title) ?></h1>


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
            'deskripsi',
            'waktu_tutup',

            ['class' => 'yii\grid\ActionColumn',
				'template' => '{link}',
				'buttons' => [
					'link' => function ($url,$model,$key) {
						return Html::a('<span class="glyphicon glyphicon-pencil"></span> Isi', 'index.php?r=kuesioner/isi&id='.$model->id_kuesioner);
					},
				],
			],
        ],
    ]); ?>


</div>
