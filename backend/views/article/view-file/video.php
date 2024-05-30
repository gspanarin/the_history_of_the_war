<?php

use yii\helpers\Url;
use wbraganca\videojs\VideoJsWidget;

$this->title = 'Перегляд файлу ' . $file->file_name ;
$this->params['breadcrumbs'][] = ['label' => 'Статті', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $file->article->title, 'url' => ['view', 'id' => $file->article->id]];

\yii\web\YiiAsset::register($this);
?>
<div class="article-view">

    <?php
    //https://packagist.org/packages/wbraganca/yii2-videojs-widget
    echo VideoJsWidget::widget([
        'options' => [
            'class' => 'video-js vjs-default-skin vjs-big-play-centered',
            'controls' => true,
            'preload' => 'auto',
            'style' => [
                'width' => 'auto',
                'height' => '400px',
            ],
        ],
        'tags' => [
            'source' => [
                ['src' => Url::base() . 'article/download-file?id=' . $file->id, 'type' => 'video/mp4'],
            ],
        ]
    ]);
    
?>
    
    
</div>
