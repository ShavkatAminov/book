<?php

namespace app\controllers;

use app\models\Author;
use app\models\Book;
use app\service\BookService;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class SiteController extends Controller
{
    private BookService $bookService ;
    public function __construct($id, $module, BookService $bookService, $config = [])
    {
        $this->bookService = $bookService;
        parent::__construct($id, $module, $config);
    }

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
            'query' => $this->bookService->getBookListQuery(),
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
        if(!$model)
            $this->ThrowNotFoundExeption();
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
       if(!$model)
           $this->ThrowNotFoundExeption();
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
       $model = Book::findOne($id);
       if($model && $this->bookService->changeFavorite($model)) {
           return "1";
       }
       else {
           $this->ThrowNotFoundExeption();
       }
    }

    public function ThrowNotFoundExeption() {
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
