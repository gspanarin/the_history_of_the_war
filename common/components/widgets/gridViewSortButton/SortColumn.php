<?php
namespace common\components\widgets\gridViewSortButton;

use Yii;
use Closure;
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;
use yii\grid\DataColumn;
use yii\helpers\ArrayHelper;


class SortColumn extends DataColumn{

    public $urlCreator;
    public $controller;
    public $action = 'sort-update';
    public $content;
    public $linkTemplateUp    = 
            '<a class="sort-column-up btn-primary" data-pjax="0" href="{url}">
                <i  class="glyphicon glyphicon-ok"></i> 
                {label}
            </a>';
    public $linkTemplateDown   = 
            '<a class="sort-column-down btn-primary" data-pjax="0" href="{url}">
                <i  class="glyphicon glyphicon-remove"></i> 
                {label}
            </a>';

    
    public function init(){
        parent::init();
        $this->registerJs();
    }

    
    protected function renderDataCellContent($model, $key, $index){
        $next = $model->getLastSortValue();
        $sort = '';

        $upUrl =  strtr($this->linkTemplateUp, [
            '{url}' => Html::encode(Url::toRoute([$this->action, 'id' => $model->id, 'move' => 'up'])),
            '{label}' => '⬆',
        ]);
        
        $downUrl =  strtr($this->linkTemplateDown, [
            '{url}' => Html::encode(Url::toRoute([$this->action, 'id' => $model->id, 'move' => 'down'])),
            '{label}' => '⬇',
        ]);

        if ($model->sort == null || $next == 1){
            $sort .= ' - ';
        }elseif ($model->sort == 1){
            $sort .= $downUrl ;
        }elseif ($model->sort == $next){
            $sort .= $upUrl;
        }else{
            $sort .= $downUrl . $upUrl;
        }

        return $sort;
    }

    
    public function registerJs(){
        $js = <<<JS
$("a.sort-column-up").on("click", function(e) {
    e.preventDefault();
    var pjaxId = $(e.target).closest(".grid-view").parent().attr("id");
    $(this).button('loading');
    $.post($(this).attr("href"), function(data) {
      $.pjax.reload({container:"#" + pjaxId});
    });
    return false;
});
$("a.sort-column-down").on("click", function(e) {
    e.preventDefault();
    var pjaxId = $(e.target).closest(".grid-view").parent().attr("id");
    $(this).button('loading');
    $.post($(this).attr("href"), function(data) {
      $.pjax.reload({container:"#" + pjaxId});
    });
    return false;
});                
                
JS;
        $this->grid->view->registerJs($js, View::POS_READY, 'sort-column');
    }
}
