<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Page $model */

$this->title = 'Дозвіл: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'RBAC', 'url' => ['/rbac']];
$this->params['breadcrumbs'][] = ['label' => 'Дозволи', 'url' => ['/rbac/permission-index']];

\yii\web\YiiAsset::register($this);
?>
<div class="page-view">
    
    <p>
        <?= Html::a('Оновити', ['permission-update', 'id' => $model->name], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['permission-delete', 'id' => $model->name], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Ви впевнені, що хочете видалити цей дозвіл?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'type',
            'description',
            'rule_name',
            'data',
            'created_at:dateTime',
            'updated_at:dateTime',
        ],
    ]) ?>

</div>
