<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\User $model */

$this->title = 'Перегляд користувача з id ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Користувачі', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <p>
        <?= Html::a('Редагувати', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Ви впевнені, що хочете видалити цей запис?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'username',
            'full_name',
            [
                'attribute' => 'organization',
                'value' => function($model){
                    return $model->getOrganizationTitle();
                }
            ],
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            'status',
            'created_at:time',
            'updated_at:time',
            //'verification_token',
        ],
    ]) ?>

</div>
