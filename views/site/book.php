<?php

/** @var yii\web\View $this */

/** @var $model \app\models\Book */

use yii\bootstrap4\Html;
use yii\widgets\ListView;

$this->title = 'My Yii Application';
?>
<div class="site-book">
    <h1><?= $model->name ?></h1>
    <div class="row">
        <div class="col-md-3">
            <?= Html::img('https://via.placeholder.com/' . $model->image, ['width' => 200]) ?>
        </div>
        <div class="col-md-9">
            <table>
                <tbody>
                <tr>
                    <td width="25%">
                        <strong>Authors:</strong>
                    </td>
                    <td>
                        <?php
                        $first = true;
                        foreach ($model->authors as $author) {
                            if(!$first)
                                echo ', ';
                            $first = false;
                            echo Html::a($author->name, ['site/author', 'id' => $author->id]);
                        }?>
                    </td>
                </tr>
                <?php foreach ($model->allAttributes as $attribute) {
                    ?>
                    <tr>
                        <td>
                            <strong><?= $attribute->name ?>:</strong>
                        </td>
                        <td>
                            <?= $attribute->value ?>
                        </td>
                    </tr>
                    <?php
                } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div>
        <p><h2>About</h2></p>
        <p><?=$model->description?></p>
    </div>
</div>
