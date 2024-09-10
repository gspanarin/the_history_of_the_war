<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'for_users';
$this->params['breadcrumbs'][] = $this->title;

$this->params['title'] = $this->title;
$this->params['subtitle'] = Html::encode( Html::encode(Yii::$app->name ));

?>
<div class="site-about">
	<div class="row heading-section justify-content-left p-4">
		<h1><?= Html::encode($this->title) ?></h1>
	</div>
    <p>for_users</p>

    
</div>
