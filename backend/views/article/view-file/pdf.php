<?php

use yii\helpers\Url;
use yii2assets\pdfjs\PdfJs;

$this->title = $file->file_name ;
$this->params['breadcrumbs'][] = ['label' => 'Статті', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="article-view">

<?php     
    echo PdfJs::widget([
            'url' => Url::base() . 'article/download-file?id=' . $file->id
        ]);

?>

</div>
