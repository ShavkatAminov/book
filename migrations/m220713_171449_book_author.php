<?php

use yii\db\Migration;

/**
 * Class m220713_171449_book_author
 */
class m220713_171449_book_author extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("book_author", [
            'id' => $this->primaryKey(),
            'book_id' => $this->integer()->notNull(),
            'author_id' => $this->integer()->notNull(),
        ]);
        $this->createIndex('book_author_index_1', '{{%book_author}}', 'book_id');
        $this->addForeignKey('book_author_index_fk1', '{{%book_author}}',
            'book_id', '{{%book}}', 'id', 'cascade','cascade');
        $this->createIndex('book_author_index_2', '{{%book_author}}', 'author_id');
        $this->addForeignKey('book_author_index_fk2', '{{%book_author}}',
            'author_id', '{{%author}}', 'id', 'cascade','cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220713_171449_book_author cannot be reverted.\n";
        $this->dropForeignKey('book_author_index_fk1', '{{%book_author}}');
        $this->dropIndex('book_author_index_1', '{{%book_author}}');
        $this->dropForeignKey('book_author_index_fk2', '{{%book_author}}');
        $this->dropIndex('book_author_index_2', '{{%book_author}}');
        $this->dropTable('book_author');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220713_171449_book_author cannot be reverted.\n";

        return false;
    }
    */
}
