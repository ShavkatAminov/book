<?php

/** @var yii\web\View $this */
/** @var $listDataProvider \yii\data\ActiveDataProvider */

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
        'layout' => "<div class='row'>{items}</div><br>{summary}<br>{pager}",
        'itemView' => function ($model, $key, $index, $widget) {
            return $this->render('_list_item', ['model' => $model]);

        },
        'itemOptions' => [
            'tag' => false,
        ],
        'pager' => [
            'firstPageLabel' => '<< First',
            'lastPageLabel' => 'Last >>',
            'nextPageLabel' => 'Next >',
            'prevPageLabel' => '< Prev',
            'maxButtonCount' => 3,
            'pageCssClass' => 'page-item',
            'lastPageCssClass' => 'page-item',
            'firstPageCssClass' => 'page-item',
            'nextPageCssClass' => 'page-item',
            'prevPageCssClass' => 'page-item',
            'linkOptions' => ['class' => 'page-link'],
            'disabledListItemSubTagOptions' => ['class' => 'page-link'],
        ],
    ]); ?>
</div>
