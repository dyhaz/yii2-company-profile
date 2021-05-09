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
use app\models\Kuesioner;
use app\models\Pertanyaan;
use app\models\Pilihan;
use app\models\PilihanForm;
use yii\web\UploadedFile;

/**
 * SiswaController implements the CRUD actions for Siswa model.
 */
class KuesionerController extends Controller
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
        $model = new Kuesioner();
        $dataProvider = new ActiveDataProvider([
            'query' => Kuesioner::find()->where(['status' => '1']),
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
            'model' => $this->findModel($id)
		]);
    }

    /**
     * Creates a new Siswa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Kuesioner();
		$session = new Session;
		$session->open();
		$user = new Users();
		$user->id_users = $session['user']->id_users;
		$admins = $user->getAdmins()->all();
		foreach($admins as $admin) {
			$model->id_admin = $admin->id_admin;
		}
		$model->status = '1';
		$model->dibuat_pada = date('Y-m-d h:m:s');
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['add-pertanyaan', 'id' => $model->id_kuesioner]);
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

    public function actionAddPertanyaan($id) {
		$pertanyaan = new Pertanyaan();
		$dataProvider = new ActiveDataProvider([
           'query' => Pertanyaan::find()->with('idKuesioner')->where(['and','id_kuesioner='.$id,'urut >= 1']),
           'pagination' => [
				'pageSize' => 20,
			],
        ]);
		$pertanyaan->urut = rand(1,100);
		$pertanyaan->id_kuesioner = $id;
		if ($pertanyaan->load(Yii::$app->request->post()) && $pertanyaan->save()) {
			if($pertanyaan->jenis=='2') {
				return $this->redirect(['add-pilihan', 'id' => $pertanyaan->id_pertanyaan]);
			} else {
				return $this->redirect(['add-pertanyaan', 'id' => $id]);
			}
        } else {
			return $this->render('pertanyaan', [
				'model' => $this->findModel($id),
				'dataProvider' => $dataProvider,
				'pertanyaan' => $pertanyaan
			]);
        }
    }
	
	public function actionAddPilihan($id) {
		$pilihan = new PilihanForm();
		$pilihan->id_pertanyaan = $id;
		if ($pilihan->load(Yii::$app->request->post()) && $pilihan->save()) {
			$pertanyaan = $this->findModelPertanyaan($id);
			return $this->redirect(['add-pertanyaan', 'id' => $pertanyaan->id_kuesioner]);
        } else {
			return $this->render('pilihan', [
				'model' => $pilihan,
			]);
        }
	}
	
	public function actionDeletePertanyaan($id) {
		$model = $this->findModelPertanyaan($id);
		$model->urut = 0;
		$model->update();
		return $this->redirect(['add-pertanyaan', 'id' => $model->id_kuesioner]);
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
        if (($model = Kuesioner::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelPertanyaan($id)
    {
        if (($model = Pertanyaan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
}
