<?php

/** @var yii\web\View $this */
/** @var $model \app\models\Book*/

use yii\bootstrap4\Html;

?>
<div class="col-md-3">
    <div>
        <?= Html::img('https://via.placeholder.com/'.$model->image, ['width' => 200])?>
        <img src="" class="card-img-top" alt="">
        <div class="card-body">
            <?=Html::a($model->name, ['site/book', 'id' => $model->id])?>
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
