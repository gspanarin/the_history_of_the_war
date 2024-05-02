<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Field $model */

$this->title = $model->term_name;
$this->params['breadcrumbs'][] = ['label' => 'Поля опису документів', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="field-view">

    <p>
        <?= Html::a('Оновити', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Ви впевнені, що хочте видалити цей тег?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'term_name',
            'label',
            'uri',
            'definition',
            'comment:raw',
            'note',
            'default_value',
            'created_at:dateTime',
            'updated_at:dateTime',
        ],
    ]) ?>

</div>
