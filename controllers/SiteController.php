<?php

namespace app\controllers;

use app\models\Author;
use app\models\Book;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Book::find()->joinWith(['authors'])
            ->select('book.*, author.name as authorName, author.id as authorId')
            ->groupBy(['id']),
            'pagination' => [
                'pageSize' => 8,
            ],
        ]);
        return $this->render('index', [
            'listDataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays BookPage.
     *
     * @return string
     */
    public function actionBook($id)
    {
       $model = Book::findOne($id);
        return $this->render('book', [
            'model' => $model,
        ]);
    }

    /**
     * Displays AuthorPage.
     *
     * @return string
     */
    public function actionAuthor($id)
    {
       $model = Author::findOne($id);
        return $this->render('author', [
            'model' => $model,
        ]);
    }

    /**
     * Displays AuthorPage.
     *
     * @return string
     */
    public function actionFavorite($id)
    {
       $model = Author::findOne($id);
        return $this->render('author', [
            'model' => $model,
        ]);
    }
}
