<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payment}}`.
 */
class m250809_114657_create_payment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%payment}}', [
            'id' => $this->primaryKey(),
            'student_id' => $this->integer()->notNull(),
            'amount' => $this->decimal(10,2)->notNull(),
            'payment_type' => $this->string(20)->notNull(),
            'date' => $this->date()->notNull(),
            'created_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk_payment_student',
            '{{%payment}}',
            'student_id',
            '{{%student}}',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_payment_student', '{{%payment}}');
        $this->dropTable('{{%payment}}');
    }
}
