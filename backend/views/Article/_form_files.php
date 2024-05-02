<?php
use yii\grid\GridView;
use yii\helpers\Html;

echo GridView::widget([
    'dataProvider' => $files,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'file_name',
            'format' => 'RAW',
            'value' => function($model){
                return Html::a($model->file_name, ['article/download-file', 'id' => $model->id], ['class' => 'profile-link']);
            }
        ],
        'extension',
        [
            
            'class' => 'yii\grid\ActionColumn',
            'template' => '{create-icon} {delete-file}',
            'buttons'=> [
                'create-icon' => function ($url, $files){
                    return Html::a(
                            "Створити іконку", 
                            'create-icon?' . 'article_id=' . $files->article_id . '&file_id=' . $files->id,
                            [
                                'title' => "Створити іконку",
                                'class' => 'btn btn-block btn-success',
                            ]
                        );
                },
                'delete-file' => function ($url, $files) {
                    return Html::a(
                            "Видалити файл", 
                            'delete-file?' . 'article_id=' . $files->article_id . '&file_id=' . $files->id, 
                            [
                                'title' => "Видалити файл",
                                'class' => 'btn btn-block btn-danger',
                                'data' => [
                                    'method' => 'post',
                                    'confirm' => 'Ви впевнені, що хочете видалити цей файл?',
                                ],
                            ]
                        );
                }
            ],
        ],
    ],
]);
            
echo $form->field($model, 'files[]')->fileInput(['multiple' => true,]);


