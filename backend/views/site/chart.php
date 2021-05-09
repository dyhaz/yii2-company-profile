<?php
$this->title = 'My Yii Application';
use miloschuman\highcharts\Highcharts;
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="col-lg-12">
			<?php
			echo Highcharts::widget([
			   'options' => [
				  'title' => ['text' => 'Fruit Consumption'],
				  'xAxis' => [
					 'categories' => ['Apples', 'Bananas', 'Oranges']
				  ],
				  'yAxis' => [
					 'title' => ['text' => 'Fruit eaten']
				  ],
				  'series' => [
					 ['name' => 'Jane', 'data' => [1, 0, 4]],
					 ['name' => 'John', 'data' => [5, 7, 3]]
				  ]
			   ]
			]);
			?>
            </div>
        </div>
    </div>
</div>
