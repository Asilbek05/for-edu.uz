<?php

namespace backend\controllers;

use common\models\Group;
use common\models\GroupSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * GroupController implements the CRUD actions for Group model.
 */
class GroupController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Group models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new GroupSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Group model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Group model.
     * If creation is successful, the browser will be redirected to the 'index' page.
     *
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Group();
        $userId = \Yii::$app->user->identity->id;
        $userRole = \Yii::$app->user->identity->role;

        // Faqat hozirgi foydalanuvchi yaratgan fanlarni olish
        $subjects = Subject::find()->where(['created_by' => $userId])->all();

        if ($this->request->isPost) {
            // ... (qolgan qismi o'zgarishsiz qoladi) ...
            if ($model->load($this->request->post())) {
                // Avtomatik ravishda teacher_id ni kiritish
                // Bu joyda `teacher_id` maydonini o'zgarishdan himoya qilish kerak, shuning uchun yuklashdan so'ng kiritamiz
                $model->teacher_id = $userId;
                if ($model->save()) {
                    \Yii::$app->response->format = Response::FORMAT_JSON;
                    return ['success' => true];
                }
            }
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ['success' => false, 'errors' => ActiveForm::validate($model)];

        } else {
            return $this->renderPartial('_form', [
                'model' => $model,
                'subjects' => $subjects, // Fanlar ro'yxatini formaga yuborish
            ]);
        }
    }

    /**
     * Updates an existing Group model.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Group model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Group model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Group the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Group::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}