<?php

namespace backend\controllers\admin;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ItemToko;
use backend\models\Admin;
use app\models\Users;
use yii\web\Session;
use app\models\UploadForm;
use app\models\Penukaran;
use yii\web\UploadedFile;

/**
 * SiswaController implements the CRUD actions for Siswa model.
 */
class ItemTokoController extends Controller
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
        $model = new ItemToko();
        $dataProvider = new ActiveDataProvider([
            'query' => ItemToko::find()->where(['status' => '1']),
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
		$penukaran = Penukaran::getJumlahPenukaran($id);
        return $this->render('view', [
            'model' => $this->findModel($id), 'penukaran' => $penukaran
        ]);
    }

    /**
     * Creates a new Siswa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ItemToko();
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
			$model->imageFile = UploadedFile::getInstance($model, 'gambar');
            if ($gambar = $model->upload()) {
                // file is uploaded successfully
            }
        }
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			$item = ItemToko::findOne($model->id_item_toko);
			$item->gambar = $gambar;
			$item->status = '1';
			$item->update();
			return $this->redirect(['view', 'id' => $model->id_item_toko]);
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
			$model->imageFile = UploadedFile::getInstance($model, 'gambar');
            if ($gambar = $model->upload()) {
                // file is uploaded successfully
            }
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			$item = ItemToko::findOne($model->id_item_toko);
			$item->gambar = $gambar;
			$item->update();
            return $this->redirect(['view', 'id' => $model->id_item_toko]);
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
        $item = $this->findModel($id);
		$item->status = '2';
		$item->update();
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
        if (($model = ItemToko::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}
