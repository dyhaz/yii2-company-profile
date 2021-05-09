<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property string $id_users
 * @property string $nama_lengkap
 * @property string $foto
 * @property string $email
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $dibuat_pada
 * @property string $status
 *
 * @property Admin[] $admins
 * @property Kontributor[] $kontributors
 * @property LogAkses[] $logAkses
 * @property Tamu[] $tamus
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_lengkap', 'foto', 'email', 'auth_key', 'password_hash', 'status'], 'required'],
            [['dibuat_pada'], 'safe'],
            [['nama_lengkap'], 'string', 'max' => 50],
            [['foto'], 'string', 'max' => 10],
            [['email'], 'string', 'max' => 100],
            [['auth_key'], 'string', 'max' => 32],
            [['password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 1],
            [['email'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_users' => 'Id Users',
            'nama_lengkap' => 'Nama Lengkap',
            'foto' => 'Foto',
            'email' => 'Email',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'dibuat_pada' => 'Dibuat Pada',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmins()
    {
        return $this->hasMany(Admin::className(), ['id_users' => 'id_users']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKontributors()
    {
        return $this->hasMany(Kontributor::className(), ['id_users' => 'id_users']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogAkses()
    {
        return $this->hasMany(LogAkses::className(), ['id_users' => 'id_users']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTamus()
    {
        return $this->hasMany(Tamu::className(), ['id_users' => 'id_users']);
    }
}
