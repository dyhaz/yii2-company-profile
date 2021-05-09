<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "respon_pilih".
 *
 * @property string $dijawab_pada
 * @property string $alamat_ip
 * @property string $id_respon_pilih
 * @property string $id_tamu
 * @property string $id_pilihan
 *
 * @property Pilihan $idPilihan
 * @property Tamu $idTamu
 */
class ResponPilih extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'respon_pilih';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dijawab_pada'], 'safe'],
            [['id_tamu', 'id_pilihan'], 'integer'],
            [['alamat_ip'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dijawab_pada' => 'Dijawab Pada',
            'alamat_ip' => 'Alamat Ip',
            'id_respon_pilih' => 'Id Respon Pilih',
            'id_tamu' => 'Id Tamu',
            'id_pilihan' => 'Id Pilihan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPilihan()
    {
        return $this->hasOne(Pilihan::className(), ['id_pilihan' => 'id_pilihan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTamu()
    {
        return $this->hasOne(Tamu::className(), ['id_tamu' => 'id_tamu']);
    }
}
