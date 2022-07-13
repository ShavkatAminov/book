<?php

use yii\db\Migration;

/**
 * Class m220713_170228_attribute
 */
class m220713_170228_attribute extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("attribute", [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'value' => $this->text()->notNull(),
            'book_id' => $this->integer()->notNull(),
        ]);
        $this->createIndex('attribute_index_1', '{{%attribute}}', 'book_id');
        $this->addForeignKey('attribute_book_index_1', '{{%attribute}}',
            'book_id', '{{%book}}', 'id', 'cascade','cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220713_170228_attribute cannot be reverted.\n";
        $this->dropForeignKey('attribute_book_index_1', '{{%attribute}}');
        $this->dropIndex('attribute_index_1', '{{%attribute}}');
        $this->dropTable('attribute');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220713_170228_attribute cannot be reverted.\n";

        return false;
    }
    */
}
