<?php
namespace frontend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\LogAkses;
use app\models\Kuesioner;
use yii\web\Session;
use app\models\Projects;
use app\models\Studio;
use app\models\BukuTamu;
use app\models\ResponTulis;
use app\models\ResponPilih;
use app\models\Tamu;
use app\models\Users;

/**
 * Site controller
 */
class KuesionerController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
		$model = new Kuesioner();
		$dataProvider = new ActiveDataProvider([
            'query' => Kuesioner::find()->where(['and',"waktu_buka<=NOW()","waktu_tutup>=NOW()"])->andWhere(['and','status=1']),
            'pagination' => [
            'pageSize' => 20,
            ],
        ]);
		/*if (Yii::$app->request->isPost) {

		}*/		
        return $this->render('index', ['model' => $model, 'dataProvider' => $dataProvider]);
    }
	
	public function actionIsi($id) {
		$kuesioner = Kuesioner::find()->with('pertanyaans')->where(['and','id_kuesioner='.$id])->all();
		$session = new Session;
		$session->open();
		$user = new Users();
		$user->id_users = !is_object($session['user'])?'2':$session['user']->id_users;
		$tamus = $user->getTamus()->all();
		if (!empty($_POST) && sizeof($_POST['jawaban'])>0) {
			$jawabs = $_POST['jawaban'];

			foreach($jawabs as $key=>$jawab) {
				$pertanyaan = $kuesioner[0]->pertanyaans[$key];
				if($pertanyaan->urut <= 0) continue;
				$responTulis = new ResponTulis();
				$responPilih = new ResponPilih();
				if($pertanyaan->jenis === '1') {
					$responTulis->jawaban = $jawab;
					$responTulis->dijawab_pada = date('Y-m-d h:m:s');
					$responTulis->alamat_ip = $_SERVER['REMOTE_ADDR'];
					foreach($tamus as $tamu) {
						$responTulis->id_tamu = $tamu->id_tamu;
					}
					$responTulis->id_pertanyaan = $pertanyaan->id_pertanyaan;
					$responTulis->save();
				} else {
					$responPilih->id_pilihan = $jawab;
					$responPilih->dijawab_pada = date('Y-m-d h:m:s');
					$responPilih->alamat_ip = $_SERVER['REMOTE_ADDR'];
					
					foreach($tamus as $tamu) {
						$responPilih->id_tamu = $tamu->id_tamu;
					}
					$responPilih->save();
				}
			}
			return $this->redirect(['index']);
		} else {
			return $this->render('isi', [
				'model' => $kuesioner[0],
				'id' => $id,
			]);				
		}				
		/*if ($pilihan->load(Yii::$app->request->post()) && $pilihan->save()) {
			$pertanyaan = $this->findModelPertanyaan($id);
			return $this->redirect(['add-pertanyaan', 'id' => $pertanyaan->id_kuesioner]);
        } else {
			return $this->render('pilihan', [
				'model' => $pilihan,
			]);
        }*/
	}
    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

	protected function findModel($id)
    {
        if (($model = Kuesioner::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
}
