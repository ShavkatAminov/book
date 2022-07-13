<?php

use yii\db\Migration;

/**
 * Class m220713_165646_author
 */
class m220713_165646_author extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("author", [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull()->comment('Имя'),
            'description' => $this->text()->notNull()->comment('Биография'),
            'birth_date' => $this->integer()->notNull()->comment('Дата рождения'),
            'death_date' => $this->integer()->comment('Дата смерти'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220713_165646_author cannot be reverted.\n";
        $this->dropTable('author');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220713_165646_author cannot be reverted.\n";

        return false;
    }
    */
}
