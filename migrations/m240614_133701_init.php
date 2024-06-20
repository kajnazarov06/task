<?php

use yii\db\Migration;

/**
 * Class m240614_133701_init
 */
class m240614_133701_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('Task', [
            'id' => $this->primaryKey(),
            'title' => $this->string(128)->notNull()->comment('Имя задачи'),
            'description' => $this->text()->null()->comment('Описание задачи'),
            'due_date' => $this->date()->notNull()->comment('Длительность'),
            'status' => $this->integer()->notNull()->defaultValue(1)->comment('Статус'),
            'priority' => $this->integer()->notNull()->defaultValue(1)->comment('Приоритет'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('Task');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240614_133701_init cannot be reverted.\n";

        return false;
    }
    */
}
