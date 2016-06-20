<?php

use yii\db\Migration;

class m160619_201444_bouw7_init extends Migration
{
    public function up()
    {
        $this->createTable('activities', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'type' => $this->integer()->notNull()->defaultValue(0),
            'owner' => $this->integer()->notNull(),
            'description' => $this->text()->notNull(),
            'image' => $this->string()
        ], 'ENGINE=InnoDB CHARSET=utf8');

        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ], 'ENGINE=InnoDB CHARSET=utf8');

        $this->addForeignKey('fk_owner_to_user','activities','owner','user','id','CASCADE','CASCADE');

        $this->createTable('activities_categories', [
            'activity_id' => $this->integer(),
            'category_id' => $this->integer(),
            'PRIMARY KEY(activity_id, category_id)',
        ]);

        // creates index for column `activity_id`
        $this->createIndex(
            'idx-activities_categories-activity_id',
            'activities_categories',
            'activity_id'
        );

        // add foreign key for table `activities`
        $this->addForeignKey(
            'fk-activities_categories-activity_id',
            'activities_categories',
            'activity_id',
            'activities',
            'id',
            'CASCADE'
        );

        // creates index for column `category_id`
        $this->createIndex(
            'idx-activities_categories-category_id',
            'activities_categories',
            'category_id'
        );

        // add foreign key for table `categories`
        $this->addForeignKey(
            'fk-activities_categories-category_id',
            'activities_categories',
            'category_id',
            'categories',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        // drops foreign key for table `activities`
        $this->dropForeignKey(
            'fk-activities_categories-activity_id',
            'activities_categories'
        );

        // drops index for column `activity_id`
        $this->dropIndex(
            'idx-activities_categories-activity_id',
            'activities_categories'
        );

        // drops foreign key for table `categories`
        $this->dropForeignKey(
            'fk-activities_categories-category_id',
            'activities_categories'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-activities_categories-category_id',
            'activities_categories'
        );

        $this->dropTable('activities_categories');

        $this->dropForeignKey('fk_owner_to_user','activities');
        $this->dropTable('activities');
        $this->dropTable('categories');
    }
}
