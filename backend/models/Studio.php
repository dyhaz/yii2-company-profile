<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "studio".
 *
 * @property integer $id_studio
 * @property string $alamat_1
 * @property string $alamat_2
 * @property string $kode_pos
 * @property string $lat
 * @property string $lng
 * @property string $tel
 * @property string $email
 * @property string $des_perusahaan
 * @property string $fb
 * @property string $twitter
 */
class Studio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'studio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_studio', 'alamat_1', 'alamat_2'], 'required'],
            [['id_studio'], 'integer'],
            [['des_perusahaan'], 'string'],
            [['alamat_1', 'alamat_2'], 'string', 'max' => 50],
            [['kode_pos'], 'string', 'max' => 10],
            [['lat', 'lng'], 'string', 'max' => 45],
            [['tel'], 'string', 'max' => 15],
            [['email'], 'string', 'max' => 100],
            [['fb', 'twitter'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_studio' => 'Id Studio',
            'alamat_1' => 'Alamat 1',
            'alamat_2' => 'Alamat 2',
            'kode_pos' => 'Kode Pos',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'tel' => 'Tel',
            'email' => 'Email',
            'des_perusahaan' => 'Des Perusahaan',
            'fb' => 'Fb',
            'twitter' => 'Twitter',
        ];
    }
}
