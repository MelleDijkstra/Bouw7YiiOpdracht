<?php

use yii\db\Migration;

/**
 * Handles the creation for table `admin_table`.
 */
class m160619_165317_create_admin_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%admin}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        // New admin to login with the first time
        $admin = new \common\models\Admin();
        $admin->setAttribute('username','Demo');
        $admin->setAttribute('email', 'demo@example.com');
        $admin->generateAuthKey();
        $admin->setPassword('123456');
        $admin->save();
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%admin}}');
    }
}
