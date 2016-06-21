<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ActivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Activiteiten';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nieuwe Activiteit', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'type',
                'value' => function($model) {
                    /**
                     * @var $model \common\models\Activity
                     */
                    return $model->getActivityTypes()[$model->type];
                },
            ],
            [
                'attribute'=>'owner',
                'value'=> function($model) {
                    /**
                     * @var $model \common\models\User
                     */
                    if($model->getOwner0()->one()) {
                        return $model->getOwner0()->one()->username;
                    } else {
                        return '';
                    }
                },
            ],
            [
                'attribute' => 'description',
                'format' => 'raw',
            ],
            [
                'attribute' => 'categories',
                'value' => function($model) {
                    /**
                     * @var $model \common\models\Activity
                     */
                    return $model->getCategoryBadges();
                },
                'format' => 'raw',
            ],
            'image:image',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
