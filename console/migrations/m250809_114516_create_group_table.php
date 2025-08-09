<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%group}}`.
 */
class m250809_114516_create_group_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%group}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'teacher_id' => $this->integer()->notNull(),
            'subject_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk_group_teacher',
            '{{%group}}',
            'teacher_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_group_subject',
            '{{%group}}',
            'subject_id',
            '{{%subject}}',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_group_subject', '{{%group}}');
        $this->dropForeignKey('fk_group_teacher', '{{%group}}');
        $this->dropTable('{{%group}}');
    }
}
