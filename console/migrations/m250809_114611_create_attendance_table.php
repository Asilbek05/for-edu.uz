<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%attendance}}`.
 */
class m250809_114611_create_attendance_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%attendance}}', [
            'id' => $this->primaryKey(),
            'student_id' => $this->integer()->notNull(),
            'date' => $this->date()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk_attendance_student',
            '{{%attendance}}',
            'student_id',
            '{{%student}}',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_attendance_student', '{{%attendance}}');
        $this->dropTable('{{%attendance}}');
    }
}
