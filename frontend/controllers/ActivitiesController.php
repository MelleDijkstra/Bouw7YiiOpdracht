<?php

namespace frontend\controllers;

use common\models\ActivitiesCategories;
use yii;
use common\models\Activity;
use frontend\models\ActivitySearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ActivitiesController implements the CRUD actions for Activity model.
 */
class ActivitiesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Activity models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ActivitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Activity model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Activity model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Activity();
        $model->owner = Yii::$app->user->id;

        if(Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            if($model->save()) {
                foreach($_POST['Activity']['categories'] as $categoryId) {
                    $activityCategory = new ActivitiesCategories();
                    $activityCategory->activity_id = $model->id;
                    $activityCategory->category_id = $categoryId;
                    $activityCategory->save();
                }
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                foreach($model->getErrors() as $attribute) {
                    foreach($attribute as $error) {
                        Yii::$app->session->addFlash($error);
                    }
                }
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Activity model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if(Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            if($model->save()) {
                foreach(ActivitiesCategories::find()->where(['activity_id'=>$model->id])->all() as $activityCategory) {
                    $activityCategory->delete();
                }
                foreach($_POST['Activity']['categories'] as $categoryId) {
                    $activityCategory = new ActivitiesCategories();
                    $activityCategory->activity_id = $model->id;
                    $activityCategory->category_id = $categoryId;
                    $activityCategory->save();
                }
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                foreach($model->getErrors() as $attribute) {
                    foreach($attribute as $error) {
                        Yii::$app->session->addFlash($error);
                    }
                }
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Activity model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Activity model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Activity the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Activity::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
