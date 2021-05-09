<?php

namespace backend\controllers\admin;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Projects;
use backend\models\Admin;
use app\models\Users;
use yii\web\Session;
use app\models\UploadForm;
use yii\web\UploadedFile;

/**
 * SiswaController implements the CRUD actions for Siswa model.
 */
class ProjectsController extends Controller
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
        $model = new Projects();
        $dataProvider = new ActiveDataProvider([
            'query' => Projects::find(),
            'pagination' => [
            'pageSize' => 20,
            ],
        ]);
        return $this->render('index', ['model' => $model, 'dataProvider' => $dataProvider]);
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
     * Creates a new Siswa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Projects();
		$session = new Session;
		$session->open();
		$user = new Users();
		$user->id_users = $session['user']->id_users;
		$admins = $user->getAdmins()->all();
		foreach($admins as $admin) {
			$model->id_admin = $admin->id_admin;
		}
		$model->dibuat_pada = date('Y-m-d h:m:s');
		if (Yii::$app->request->isPost) {
			$model->imageFile = UploadedFile::getInstance($model, 'foto');
            if ($foto = $model->upload()) {
                // file is uploaded successfully
            }
        }
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			$project = Projects::findOne($model->id_projects);
			$project->foto = $foto;
			$project->update();
			return $this->redirect(['view', 'id' => $model->id_projects]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Siswa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		if (Yii::$app->request->isPost) {
			$model->imageFile = UploadedFile::getInstance($model, 'foto');
            if ($foto = $model->upload()) {
                // file is uploaded successfully
            }
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			$project = Projects::findOne($model->id_projects);
			$project->foto = $foto;
			$project->update();
            return $this->redirect(['view', 'id' => $model->id_projects]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Siswa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionTim_pengembang() {

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
        if (($model = Projects::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}
