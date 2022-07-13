<?php

use yii\db\Migration;

/**
 * Class m220713_165126_book
 */
class m220713_165126_book extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("book", [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull()->comment('Название'),
            'description' => $this->text()->notNull()->comment('Описание'),
            'favorite' => $this->boolean()->defaultValue(false)->comment('Избранное'),
            'image' => $this->string(255)->notNull()->comment('Картинка'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220713_165126_book cannot be reverted.\n";
        $this->dropTable('book');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220713_165126_book cannot be reverted.\n";

        return false;
    }
    */
}
