<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $name Название
 * @property string $description Описание
 * @property int|null $favorite Избранное
 * @property string $image Картинка
 *
 * @property Attribute[] $allAttributes
 * @property Author[] $authors
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    public $authorName;
    public $authorId;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'image'], 'required'],
            [['description'], 'string'],
            [['favorite'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'description' => 'Описание',
            'favorite' => 'Избранное',
            'image' => 'Картинка',
        ];
    }

    /**
     * Gets query for [[Attributes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAllAttributes()
    {
        return $this->hasMany(Attribute::className(), ['book_id' => 'id']);
    }

    public function getAuthors() {
        return $this->hasMany(Author::className(), ['id' => 'author_id'])
            ->viaTable('book_author', ['book_id' => 'id']);
    }
}
