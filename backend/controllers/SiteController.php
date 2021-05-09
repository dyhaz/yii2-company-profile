<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use backend\models\ModelSearch;
use mPDF;
use app\models\LogAkses;
use yii\web\Session;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */


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
                'foreColor' => 115006,
                'backColor' => 333333,
                'height' => 30,
                'maxLength' => 4,
                'minLength' => 3,
                'offset' => 2,
                'testLimit' => 1
            ],
        ];
    }

    public function beforeAction($action) {
        $route = \Yii::$app->getRequest()->getQueryParam('r');
        if ($route !== 'site/login' &&
            \Yii::$app->user->isGuest &&
            strpos($route, 'captcha') === false
        ) {
            \Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl);
        }
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        //return $this->redirect(['admin/dashboard']);
		$session = new Session;
		$session->open();
		$id = $session['id_akses'];
		$session->close();
		if($id == '1') {
			return $this->render('../admin/index');
		} else {
			return $this->render('../kontributor/index');
		}
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
		$session = new Session;
		$session->open();
		if(!empty($session['id_sesi']) && $log = LogAkses::getByIdSesi($session['id_sesi'])) {
			$log->waktu_logout = date('Y-m-d h:m:s');
			$log->update();
		}
        Yii::$app->user->logout();
        return $this->goHome();
    }

	public function actionChart()
    {
        return $this->render('chart');
    }
	
	public function actionPdf() {
 
        $mpdf = new mPDF;
        $mpdf->WriteHTML('<p>Hello World</p>');
        $mpdf->Output();
        exit;
    }
}
