<?php

namespace backend\models;
use yii\base\Model;
use yii\behaviors\TimestampBehavior;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "siswa".
 *
 * @property integer $id
 * @property string $nip
 * @property string $nama
 * @property string $alamat
 * @property string $telepon
 * @property string $created_at
 * @property string $updated_at
 */
class Siswa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'siswa';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nip', 'nama', 'alamat', 'telepon'], 'required'],
            [['alamat'], 'string'],
            [['nip'], 'string', 'max' => 10],
            [['nama'], 'string', 'max' => 50],
            [['telepon'], 'string', 'max' => 12]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nip' => 'Nip',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'telepon' => 'Telepon',
        ];
    }
}
