<?php

use yii\helpers\Html;
use yii\grid\GridView;
$this->context->layout = 'main_bootstrap';
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pertanyaan';
$this->params['breadcrumbs'][] = ['label' => 'Isi Kuesioner', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="siswa-index">

    <h1><?= Html::encode($this->title) ?></h1>
	

	<form method="post" action="index.php?r=kuesioner/isi&id=<?= $id?>">
			<input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken()?>" />
			<?php foreach($model->pertanyaans as $pertanyaan) { if($pertanyaan->urut <= 0) continue;?>
					<div class="form-group">
						<?= $pertanyaan->pertanyaan?>
						<br/>
						<?php if($pertanyaan->jenis == '1') {?>
							<textarea required class="form-control" name="jawaban[]"></textarea>
						<?php } else {
						?>
						<select name="jawaban[]" class="form-control">
						<?php
						foreach($pertanyaan->pilihans as $pilihan) {
							echo '<option value="'.$pilihan->id_pilihan.'">'.$pilihan->isi1.'</option>';
						}
						?>
						</select>
							<?php
						}?>
					</div>
				<br />
			<?php }?>
			<button type="submit" class="btn btn-primary" >Simpan</button>
	</form>	
</div>

