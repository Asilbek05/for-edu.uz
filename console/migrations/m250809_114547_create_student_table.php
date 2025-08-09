<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%student}}`.
 */
class m250809_114547_create_student_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%student}}', [
            'id' => $this->primaryKey(),
            'full_name' => $this->string()->notNull(),
            'phone' => $this->string(20),
            'group_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk_student_group',
            '{{%student}}',
            'group_id',
            '{{%group}}',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_student_group', '{{%student}}');
        $this->dropTable('{{%student}}');
    }
}
