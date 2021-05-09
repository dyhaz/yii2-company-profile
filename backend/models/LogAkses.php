<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "log_akses".
 *
 * @property string $id_log_akses
 * @property string $id_users
 * @property string $waktu_login
 * @property string $alamat_ip
 * @property string $waktu_logout
 * @property string $kode_sesi
 * @property string $agent
 * @property string $status
 *
 * @property Users $idUsers
 */
class LogAkses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'log_akses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_log_akses' => 'Id Log Akses',
            'id_users' => 'Id Users',
            'waktu_login' => 'Waktu Login',
            'alamat_ip' => 'Alamat Ip',
            'waktu_logout' => 'Waktu Logout',
            'kode_sesi' => 'Kode Sesi',
            'agent' => 'Agent',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsers()
    {
        return $this->hasOne(Users::className(), ['id_users' => 'id_users']);
    }
	
	public static function getByIdSesi($id) {
		return LogAkses::findOne(['kode_sesi' => $id]);
	}
}
