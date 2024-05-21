<?php

use yii\helpers\Url;
//use yii2assets\pdfjs\PdfJs;
use wbraganca\videojs\VideoJsWidget;

$this->title = $file->file_name ;
$this->params['breadcrumbs'][] = ['label' => 'Статті', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="article-view">

    <?php
    
    echo \wbraganca\videojs\VideoJsWidget::widget([
        'options' => [
            'class' => 'video-js vjs-default-skin vjs-big-play-centered',
            'poster' => "http://www.videojs.com/img/poster.jpg",
            'controls' => true,
            'preload' => 'auto',
            'width' => '500',
            'height' => '400',
        ],
        'tags' => [
            'source' => [
                ['src' => Url::base() . '/article/download-file?id=' . $file->id, 'type' => 'rtmp/' . $file->extension]

            ],

        ]
    ]);
    
    
    
    
    
    
    echo VideoJsWidget::widget([
        'options' => [
            'class' => 'video-js vjs-default-skin vjs-big-play-centered',
            'controls' => true,
            'preload' => 'auto',
            'width' => '420',
            'height' => '315',
            'data' => [
                'setup' => [
                    'autoplay' => true,
                    'techOrder' =>['flash', 'html5']
                ],
            ],
        ],
        'tags' => [
            'source' => [
                ['src' => Url::base() . '/article/download-file?id=' . $file->id, 'type' => 'rtmp/' . $file->extension]
            ]
        ]
    ]);
?>
    
    
</div>
