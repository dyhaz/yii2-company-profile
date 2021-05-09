<?php
namespace common\models;

use Yii;
use yii\base\Model;
use yii\web\Session;
use app\models\LogAkses;
use app\models\Admin;


/**
 * Login form
 */
class LoginForm extends Model
{
    public $email;
    public $password;
    public $rememberMe = true;
    public $captcha;

    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // email and password are both required
            [['email', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
            // captcha validation rules
            ['captcha', 'required'],
            ['captcha', 'captcha'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect email or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            $session = new Session;
			$session->open();
			$session['user'] = $this->getUser();
			$log_akses = new LogAkses();
			$log_akses->waktu_login = date('Y-m-d h:m:s');
			$log_akses->alamat_ip = $_SERVER['REMOTE_ADDR'];
			$log_akses->id_users = $session['user']->id_users;
			$log_akses->kode_sesi = $session->id;
			$session['id_sesi'] = $session->id;
			$log_akses->agent = $_SERVER['HTTP_USER_AGENT'];
			$log_akses->status = '1';
			if($admin = Admin::findOne(['id_users'=>$session['user']->id_users])) {
				$session['id_akses'] = '1';
			} else {
				$session['id_akses'] = '2';
			}
			
			$log_akses->save();
			return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[email]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByEmail($this->email);
        }

        return $this->_user;
    }

}
