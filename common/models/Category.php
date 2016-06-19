<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "categories".
 *
 * @property integer $id
 * @property string $name
 *
 * @property ActivitiesCategories[] $activitiesCategories
 * @property Activities[] $activities
 */
class Category extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * Gets all category names from database
     * @return array
     */
    public static function getCategoryNames() {
        $categories = [];
        foreach(self::find()->all() as $category) {
            /** @var $category Category */
            $categories[] = $category->name;
        }
        return $categories;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Naam categorie',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivitiesCategories()
    {
        return $this->hasMany(ActivitiesCategories::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::className(), ['id' => 'activity_id'])->viaTable('activities_categories', ['category_id' => 'id']);
    }
}
