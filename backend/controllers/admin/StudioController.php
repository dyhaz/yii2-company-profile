<?php

namespace backend\controllers\admin;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Studio;
use backend\models\Admin;
use app\models\Users;
use yii\web\Session;

/**
 * SiswaController implements the CRUD actions for Siswa model.
 */
class StudioController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
      
                ],
            ],
        ];
    }
	
	public function beforeAction($action) {
        if (\Yii::$app->user->isGuest) {
            \Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl);
        }
        return parent::beforeAction($action);
    }
    /**
     * Lists all Siswa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Studio();
        $dataProvider = new ActiveDataProvider([
            'query' => Studio::find()->where(['id'=>'1']),
            'pagination' => [
            'pageSize' => 1,
            ],
        ]);
        //return $this->render('index', ['model' => $model, 'dataProvider' => $dataProvider]);
		return $this->redirect(['update']);
    }

    /**
     * Displays a single Siswa model.
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
     * Updates an existing Siswa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate()
    {
		$id = 1;
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_studio]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Finds the Siswa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Siswa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Studio::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}
