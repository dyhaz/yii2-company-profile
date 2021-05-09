<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "buku_tamu".
 *
 * @property string $id_buku_tamu
 * @property string $nama
 * @property string $email
 * @property string $isi1
 * @property string $dibuat_pada
 * @property string $status
 */
class BukuTamu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'buku_tamu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['isi1'], 'string'],
            [['dibuat_pada'], 'safe'],
            [['nama'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 100],
            [['status'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_buku_tamu' => 'Id Buku Tamu',
            'nama' => 'Nama',
            'email' => 'Email',
            'isi1' => 'Isi1',
            'dibuat_pada' => 'Dibuat Pada',
            'status' => 'Status',
        ];
    }
}
