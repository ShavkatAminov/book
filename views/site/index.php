<?php

/** @var yii\web\View $this */

use yii\widgets\ListView;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <h1>Book shop</h1>
    <?=
    ListView::widget([
        'dataProvider' => $listDataProvider,
        'options' => [
            'tag' => 'div',
            'class' => 'list-wrapper',
            'id' => 'list-wrapper',
        ],
        'layout' => "{pager}\n{items}\n{summary}",
        'itemView' => function ($model, $key, $index, $widget) {
            return $this->render('_list_item', ['model' => $model]);

        },
        'pager' => [
            'firstPageLabel' => 'first',
            'lastPageLabel' => 'last',
            'nextPageLabel' => 'next',
            'prevPageLabel' => 'previous',
            'maxButtonCount' => 3,
        ],
    ]); ?>
</div>
