<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\Attribute;
use app\models\Author;
use app\models\Book;
use Faker\Factory;
use Faker\Generator;
use yii\console\Controller;
use yii\console\ExitCode;


class StartController extends Controller
{
    public function actionIndex()
    {
        $books = [];
        for($i = 0; $i < 100; $i ++) {
            $faker = Factory::create();
            $book = $this->createBook($faker);
            $books[] = $book;
            $random = $faker->randomDigit();
            while ($random > 0) {
                $random --;
                $faker = Factory::create();
                $this->createAttribute($book->id, $faker);
            }
        }
        for($i = 0; $i < 10; $i ++) {
            $faker = Factory::create();
            $author = $this->createAuthor($faker);
            $random = $faker->randomDigit();
            shuffle($books);
            foreach ($books as $book) {
                $author->link('books', $book);
                $random --;
                if($random == 0)
                    break;
            }
        }
        return ExitCode::OK;
    }

    public function createBook(Generator $faker) {
        $model = new Book();
        $model->name = $faker->name;
        $model->description = $faker->text;
        $model->favorite = intval($faker->boolean);
        $model->image = "" . $faker->randomNumber(3);
        if(!$model->save()) {
            print_r($model->errors);
        }
        $model->save();
        return $model;
    }
    public function createAuthor(Generator $faker) {
        $model = new Author();
        $model->name = $faker->name;
        $model->description = $faker->text;
        $model->birth_date = $faker->date('Y-m-d');
        $model->death_date = $faker->dateTimeBetween($model->birth_date)->format('Y-m-d');
        $model->save();
        return $model;
    }

    public function createAttribute($bookId, Generator $faker) {
        $model = new Attribute();
        $model->book_id = $bookId;
        $model->name = $faker->name;
        $model->value = $faker->word;
        $model->save();
    }
}
