<?php

use yii\helpers\Html;
use common\models\Article;
use kartik\date\DatePicker; 
use yii\jui\AutoComplete;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\helpers\ArrayHelper;
use common\models\Dictionary;

$i = 0;
?>

<table class="table table-bordered">
    <tbody class="container-tag-value tag-<?= $tag->term_name ?>">
    <?php foreach ($fields[$tag->term_name] as $field => $value): ?>
        <tr class="tag-value-item tr-tag-<?= $tag->term_name ?>">
            <td class="vcenter">
                <?php

                    switch ($tag->inputTypeMethod):
                        //==========================================================
                        //==========================================================
                        case 'TextArea':
                            echo Html::textArea("Article[tags_$tag->term_name][]", $value, ['class' => "form-control"]);
                            break;
                        //==========================================================
                        //==========================================================
                        case 'StandartValue':
                            echo Html::dropDownList(
                                "Article[tags_$tag->term_name][]",
                                $value,
                                $tag->inputTypeStandartValue,
                                [
                                    'prompt' => [
                                        'text' => ' ... Оберіть потрібний варіант ...',
                                        'options' => []
                                    ],
                                    'class' => "form-control",
                                ]
                            );
                            break;
                        //==========================================================
                        //==========================================================
                        case 'Dictionary':
                            echo Html::input('text', "Article[tags_$tag->term_name][]", $value,['class' => "form-control"]);
							
                            /*echo AutoComplete::widget([
                                'name' => "Article[tags_$tag->term_name][]",    
                                'options' => [
                                    'class' => 'form-control',
                                    'data-term_name' => $tag->term_name],
                                'clientOptions' => [
                                    //'source' => common\models\Dictionary::find()->select('value')->where(['term_name' => $tag->term_name])->distinct()->column('value'),
									//'source' => ArrayHelper::map(Dictionary::find()->select(['value', 'value'])->all(), 'name', 'name'),
									'source' => ['dd' => 'dfdf'],
                                    'minLength' => '2',
                                    'delay' => 0,
                                ],
                            ]);*/
                            break;
                        //==========================================================
                        //==========================================================
                        case 'DatePicker':
                            echo DatePicker::widget([
                                    'name'  => "Article[tags_$tag->term_name][]",
                                    'value'  => $value,
                                    'language' => 'uk',
                                    'pluginOptions' => [
                                        //  'autoclose' => true,
                                        'format' => 'yyyy-mm-dd',
                                        'todayHighlight' => true
                                    ],
                                
                                    'class' => "form-control"
                                ]);

                            break;
                        //==========================================================
                        //==========================================================
                        case 'SimpleText':
                        default :
                            echo Html::input('text', "Article[tags_$tag->term_name][]", $value,['class' => "form-control"]);
                    endswitch;
                      
                
                
                ?>
            </td>
            <td class="text-center vcenter" style="width: 90px;">
                <?php if ($i == 0) {?>
                <button type="button" class="add-tag-value btn btn-success btn-xs" data-tag="<?= $tag->term_name ?>">
                    <span class="fa fa-plus"></span>
                </button>
                <?php } else { ?>
                <button type="button" class="remove-tag-value btn btn-danger btn-xs">
                    <span class="fa fa-minus"></span>
                </button>
                <?php }?>
            </td>
        </tr>
        <?php $i++ ?>
    <?php endforeach; ?>
    </tbody>
</table>







<?php 

$script = <<< JS

//$( ".dictionary" ).autocomplete({
//    source: "/official/dictionary/search"
//});

JS;

$this->registerJs($script, yii\web\View::POS_END);

