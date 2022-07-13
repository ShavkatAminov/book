<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "author".
 *
 * @property int $id
 * @property string $name Имя
 * @property string $description Биография
 * @property string $birth_date Дата рождения
 * @property string|null $death_date Дата смерти
 *
 * @property Book[] $books
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'birth_date'], 'required'],
            [['description'], 'string'],
            [['birth_date', 'death_date'], 'safe'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'description' => 'Биография',
            'birth_date' => 'Дата рождения',
            'death_date' => 'Дата смерти',
        ];
    }

    public function getBooks() {
        return $this->hasMany(Book::className(), ['id' => 'book_id'])
            ->viaTable('book_author', ['author_id' => 'id']);
    }
}
