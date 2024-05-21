<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\bootstrap4\Modal;
use yii\helpers\Url;

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
            'template' => '{create-icon} {view-files} {delete-file}',
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
                },
                'view-files' => function ($url, $files){
                    //dd($files);
                    switch ($files->extension) {
                    case 'pdf':
                        return Html::a(
                            "Переглянути файл", 
                            'view-pdf?' . 'id=' . $files->id, 
                            [
                                'title' => "Переглянути файл",
                                'class' => 'btn btn-block btn-primary',
                                'target' => '_blanck',
                            ]
                        );                
                    case 'mp4':
                        return Html::a(
                            "Переглянути відео", 
                            'view-video?' . 'id=' . $files->id, 
                            [
                                'title' => "Переглянути відео",
                                'class' => 'btn btn-block btn-primary',
                                'target' => '_blanck',
                            ]
                        );
                    default:
                        break;

                    }
                }
            ],
        ],
    ],
]);
            
echo $form->field($model, 'files[]')->fileInput(['multiple' => true,]);

/*
 echo \yii2assets\pdfjs\PdfJs::widget([
                            //'url' => Url::base().'/downloads/manualStart_up.pdf'
                            //'url' => 'C:\www\warhistory_storage\2024\04\1\66621__2014.pdf',
                            'url' => Url::base() . 'article/download-file?id=1'

                       ]);

 */