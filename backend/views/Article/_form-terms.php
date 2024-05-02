<?php

use yii\helpers\Html;
$i = 0;
?>

<table class="table table-bordered">
    <tbody class="container-tag-value tag-<?= $tag->term_name ?>">
    <?php foreach ($fields[$tag->term_name] as $field => $value): ?>
        <tr class="tag-value-item tr-tag-<?= $tag->term_name ?>">
            <td class="vcenter">
                <?= Html::input('text', "Article[tags_$tag->term_name][]", $value,['class' => "form-control"]) ?>
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

