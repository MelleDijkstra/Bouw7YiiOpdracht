<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Activity */
/* @var $categories array The categories to choose from see common/models/Category */

$this->title = 'Nieuwe Activiteit';
$this->params['breadcrumbs'][] = ['label' => 'Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('activity_form', [
        'model' => $model,
    ]) ?>

</div>
