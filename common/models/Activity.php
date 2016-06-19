<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "activities".
 *
 * @property integer $id
 * @property string $name
 * @property string $type
 * @property integer $owner
 * @property string $description
 * @property string $image
 *
 * @property User $owner0
 * @property ActivitiesCategories[] $activitiesCategories
 * @property Category[] $categories
 */
class Activity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type', 'owner', 'description'], 'required'],
            [['owner'], 'integer'],
            [['description'], 'string'],
            [['name', 'type', 'image'], 'string', 'max' => 255],
            [['owner'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['owner' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Naam',
            'type' => 'Type',
            'description' => 'Beschrijving',
            'categories' => 'Categorien',
            'image' => 'Plaatje',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwner0()
    {
        return $this->hasOne(User::className(), ['id' => 'owner']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivitiesCategories()
    {
        return $this->hasMany(ActivitiesCategories::className(), ['activity_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['id' => 'category_id'])->viaTable('activities_categories', ['activity_id' => 'id']);
    }
}