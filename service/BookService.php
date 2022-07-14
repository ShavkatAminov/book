<?php
namespace app\service;

use app\models\Book;

class BookService
{

    public function changeFavorite(Book $book) {
        $book->favorite = intval(!$book->favorite);
        return $book->save();
    }

    public function getBookListQuery(): \yii\db\ActiveQuery
    {
        return Book::find()->joinWith(['authors'])
            ->select('book.*, author.name as authorName, author.id as authorId')
            ->groupBy(['id']);
    }
}
