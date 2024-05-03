<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Page $model */

$this->title = 'Роль: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'RBAC', 'url' => ['/rbac']];
$this->params['breadcrumbs'][] = ['label' => 'Ролі', 'url' => ['/rbac/role-index']];

\yii\web\YiiAsset::register($this);
?>
<div class="page-view">
    
    <p>
        <?= Html::a('Оновити', ['role-update', 'id' => $model->name], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['role-delete', 'id' => $model->name], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Ви впевнені, що хочете видалити цю роль?',
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
