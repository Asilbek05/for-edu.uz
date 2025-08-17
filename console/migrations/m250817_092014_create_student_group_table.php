<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%student_group}}`.
 */
class m250817_092014_create_student_group_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%student_group}}', [
            'id' => $this->primaryKey(),
            'student_id' => $this->integer()->notNull(),
            'group_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Foreign keys
        $this->addForeignKey(
            'fk_student_group_student',
            '{{%student_group}}',
            'student_id',
            '{{%student}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_student_group_group',
            '{{%student_group}}',
            'group_id',
            '{{%group}}',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_student_group_group', '{{%student_group}}');
        $this->dropForeignKey('fk_student_group_student', '{{%student_group}}');
        $this->dropTable('{{%student_group}}');
    }
}
