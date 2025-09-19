<?php

namespace backend\controllers;

use common\models\Group;
use common\models\GroupSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;
use common\models\Subject;
use Yii;

class GroupController extends Controller
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function actionIndex()
    {
        $searchModel = new GroupSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Group();
        $userId = Yii::$app->user->identity->id;
        $subjects = Subject::find()->where(['created_by' => $userId])->all();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->teacher_id = $userId;

                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'Group has been successfully created.');
                    return $this->redirect(['index']);
                }
            }
        }

        return $this->renderAjax('_form', [
            'model' => $model,
            'subjects' => $subjects,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $userId = Yii::$app->user->identity->id;
        $subjects = Subject::find()->where(['created_by' => $userId])->all();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->teacher_id = $userId;

                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'Group has been successfully updated.');
                    return $this->redirect(['index']);
                }
            }
        }

        return $this->renderAjax('_form', [
            'model' => $model,
            'subjects' => $subjects,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Group has been successfully deleted.');

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Group::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}