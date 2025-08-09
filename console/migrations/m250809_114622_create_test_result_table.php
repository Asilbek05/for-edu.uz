<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%test_result}}`.
 */
class m250809_114622_create_test_result_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%test_result}}', [
            'id' => $this->primaryKey(),
            'student_id' => $this->integer()->notNull(),
            'date' => $this->date()->notNull(),
            'score' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk_test_result_student',
            '{{%test_result}}',
            'student_id',
            '{{%student}}',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_test_result_student', '{{%test_result}}');
        $this->dropTable('{{%test_result}}');
    }
}
