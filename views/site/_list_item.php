<?php

/** @var yii\web\View $this */
/** @var $model \app\models\Book*/

use yii\bootstrap4\Html;

?>
<div class="col-md-3">
    <div>
        <div style="position: relative; margin-right: 60px">
            <?= Html::img('https://via.placeholder.com/'.$model->image, ['width' => 200])?>
            <?= Html::a(Html::img('/svg/'. ($model->favorite ? 'star-fill.svg' : 'star.svg')), '#', [
                    'class' => 'pinned-star',
                    'bookId' => $model->id,
            ])?>
        </div>
        <div>
            <strong><?=Html::a($model->name, ['site/book', 'id' => $model->id])?></strong>
            <br>
            <?= (Html::a($model->authorName, ['site/book', 'id' => $model->authorId]))?>
            <br>
            <span>
                <?php foreach ($model->allAttributes as $attribute) {
                    echo $attribute->name .': '.$attribute->value . ',';
                }?>
            </span>
        </div>
    </div>
</div>
