<?php

use yii\db\Migration;

class m250817_091929_add_timestamps_and_statuses extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Attendance jadvali uchun
        $this->addColumn('{{%attendance}}', 'updated_at', $this->integer()->notNull());
        $this->alterColumn('{{%attendance}}', 'status', $this->smallInteger()->notNull()->defaultValue(1));
        // 0 - Yo‘q, 1 - Bor, 2 - Kechikdi, 3 - Sababli

        // Test Result jadvali uchun
        $this->addColumn('{{%test_result}}', 'max_score', $this->integer()->notNull()->defaultValue(100));
        $this->addColumn('{{%test_result}}', 'updated_at', $this->integer()->notNull());

        // Payment jadvali uchun
        $this->addColumn('{{%payment}}', 'status', $this->string(20)->notNull()->defaultValue('paid'));
        // paid, pending, failed
        $this->addColumn('{{%payment}}', 'updated_at', $this->integer()->notNull());
    }

    public function safeDown()
    {
        $this->dropColumn('{{%attendance}}', 'updated_at');

        $this->dropColumn('{{%test_result}}', 'max_score');
        $this->dropColumn('{{%test_result}}', 'updated_at');

        $this->dropColumn('{{%payment}}', 'status');
        $this->dropColumn('{{%payment}}', 'updated_at');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250817_091929_add_timestamps_and_statuses cannot be reverted.\n";

        return false;
    }
    */
}
