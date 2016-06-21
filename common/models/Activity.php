<?php

namespace common\models;

use yii;
use yii\db\ActiveRecord;

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
class Activity extends ActiveRecord
{
    /**
     * @var yii\web\UploadedFile
     */
    public $file;

    public static $activityTypes = ['Actief','Inspannend','Relaxed','Denkvermogen'];

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
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, gif'],
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
            'categories' => 'Categorieën',
            'image' => 'Plaatje',
        ];
    }

    public static function getActivityTypes() {
        return self::$activityTypes;
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

    /**
     * Shows categories in bootstrap badges
     */
    public function getCategoryBadges() {
        $badges = '';
        foreach($this->getCategories()->all() as $category) {
            /**
             * @var $category Category
             */
            $badges .= "<span id=\"category-{$category->id}\" class=\"badge\">{$category->name}</span>";
        }
        return $badges;
    }
}
