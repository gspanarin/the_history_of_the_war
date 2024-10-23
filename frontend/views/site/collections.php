<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Путівник';
$this->params['breadcrumbs'][] = $this->title;

$this->params['title'] = $this->title;
$this->params['subtitle'] = Html::encode( Html::encode(Yii::$app->name ));

?>
<div class="site-collections">
	<ol type="I">
	<?php
		foreach ($sections[0]['items'] as $item){
			echo '<li><a href="/article?section_id=' . $item['id']  . '" class="btn btn-lg  btn-outline-info mt-2  font-weight-bold button">' . $item['title'] . '</a>';
			
			if (isset($item['items'])){
				echo $this->render('collections_items', [
					'items' => $item['items']
				]) ;
				
			}	
			echo '</li>';
		}
	?>
	</ol>
</div>