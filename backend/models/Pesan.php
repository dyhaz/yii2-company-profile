<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pesan".
 *
 * @property string $id_pesan
 * @property string $id_tamu
 * @property string $id_admin
 * @property string $isi1
 * @property string $waktu_dikirim
 * @property string $waktu_dibaca
 * @property string $status
 *
 * @property Tamu $idTamu
 * @property Admin $idAdmin
 */
class Pesan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pesan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tamu', 'id_admin', 'isi1', 'waktu_dikirim'], 'required'],
            [['id_tamu', 'id_admin'], 'integer'],
            [['isi1'], 'string'],
            [['waktu_dikirim', 'waktu_dibaca'], 'safe'],
            [['status'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pesan' => 'Id Pesan',
            'id_tamu' => 'Id Tamu',
            'id_admin' => 'Id Admin',
            'isi1' => 'Isi1',
            'waktu_dikirim' => 'Waktu Dikirim',
            'waktu_dibaca' => 'Waktu Dibaca',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTamu()
    {
        return $this->hasOne(Tamu::className(), ['id_tamu' => 'id_tamu']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAdmin()
    {
        return $this->hasOne(Admin::className(), ['id_admin' => 'id_admin']);
    }
}
