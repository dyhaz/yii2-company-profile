<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pengunjung".
 *
 * @property string $id_pengunjung
 * @property string $alamat_ip
 * @property string $waktu
 * @property string $landing
 */
class Pengunjung extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pengunjung';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alamat_ip', 'waktu', 'landing'], 'required'],
            [['waktu'], 'safe'],
            [['alamat_ip'], 'string', 'max' => 50],
            [['landing'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pengunjung' => 'Id Pengunjung',
            'alamat_ip' => 'Alamat Ip',
            'waktu' => 'Waktu',
            'landing' => 'Landing',
        ];
    }
}
