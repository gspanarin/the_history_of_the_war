<?php

use common\models\Article;
use common\models\section;
use common\models\Source;
use yii\helpers\Html;

echo $form->field($model, 'section_id')->dropDownList(
        Section::getSectionsList(),
        ['prompt' => ' ... Оберіть розділ ... ',
        ]);

echo $form->field($model, 'section_id_2')->dropDownList(
        Section::getSectionsList(),
        ['prompt' => ' ... Оберіть розділ ... ',
        ]);

echo $form->field($model, 'section_id_3')->dropDownList(
        Section::getSectionsList(),
        ['prompt' => ' ... Оберіть розділ ... ',
        ]);


echo $form->field($model, 'status')->dropDownList(
        Article::getStatusList(),
        ['prompt' => ' ... Оберіть статус ... ']);
    
echo $form->field($model, 'source_id')->dropDownList(
        Source::list(),
        ['prompt' => ' ... Оберіть джерело ... ']);    

if ($icon){
?>
<div class="form-group field-article-source_id">
<label for="article-current_icon">Поточна іконка</label><br>
    <?= Html::img('data:image/jpeg;charset=utf-8;base64,' . $icon, ['width' => '100px', 'height' => 'auto']); ?>
</div>
<?php    
    
    echo Html::a(
            "Видалити поточну іконку", 
            'delete-icon?' . 'article_id=' . $model->id,
            [
                'title' => "Видалити поточну іконку",
                'class' => 'btn btn-danger',
            ]
        );
}

