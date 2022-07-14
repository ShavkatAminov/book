<?php

/** @var yii\web\View $this */

/** @var $model \app\models\Author */

use yii\bootstrap4\Html;
use yii\widgets\ListView;

$this->title = 'My Yii Application';
?>
<div class="site-book">
    <h1><?= $model->name ?></h1>
    <div class="row">
        <div class="col-md-3">
            <?= Html::img('https://via.placeholder.com/300', ['width' => 200]) ?>
        </div>
        <div class="col-md-9">
            <table class="table">
                <tbody>
                <tr>
                    <td>
                        <strong>Birth date:</strong>
                    </td>
                    <td>
                        <?= $model->birth_date ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Death date:</strong>
                    </td>
                    <td>
                        <?= $model->death_date ?>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div>
        <p><h2>About</h2></p>
        <p><?=$model->description?></p>
    </div>
</div>
