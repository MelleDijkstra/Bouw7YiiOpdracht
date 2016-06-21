<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Activity */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Activiteiten', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Aanpassen', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Verwijderen', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Weet je zeker dat je dit item wilt verwijderen?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'attribute' => 'type',
                'value' => $model->getActivityTypes()[$model->type],
            ],
            [
                'attribute' => 'owner',
                'value' => $model->getOwner0()->one()->username,
            ],
            [
                'attribute'=>'categories',
                'value'=> $model->getCategoryBadges(),
                'format' => 'raw',
            ],
            'description:raw',
            'image:image',
        ],
    ]) ?>

</div>
