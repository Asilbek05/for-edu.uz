<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%subject}}`.
 * Has foreign keys to the `{{%user}}` table.
 */
class m250915_115513_add_created_by_column_to_subject_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
            $this->addColumn('{{%subject}}', 'created_by', $this->integer()->notNull());

        $this->addForeignKey(
            '{{%fk-subject-created_by}}',
            '{{%subject}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // 1. Foreign key'ni o'chirish
        $this->dropForeignKey(
            '{{%fk-subject-created_by}}',
            '{{%subject}}'
        );

        // 2. Ustunni o'chirish
        $this->dropColumn('{{%subject}}', 'created_by');
    }
}