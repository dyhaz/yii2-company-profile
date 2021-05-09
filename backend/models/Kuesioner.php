<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kuesioner".
 *
 * @property string $id_kuesioner
 * @property string $id_admin
 * @property string $waktu_buka
 * @property string $waktu_tutup
 * @property string $judul
 * @property string $deskripsi
 * @property string $dibuat_pada
 * @property string $status
 *
 * @property Admin $idAdmin
 * @property Pertanyaan[] $pertanyaans
 */
class Kuesioner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kuesioner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_admin'], 'integer'],
            [['waktu_buka', 'waktu_tutup', 'judul', 'dibuat_pada'], 'required'],
            [['waktu_buka', 'waktu_tutup', 'dibuat_pada'], 'safe'],
            [['judul'], 'string', 'max' => 50],
            [['deskripsi'], 'string', 'max' => 100],
            [['status'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kuesioner' => 'Id Kuesioner',
            'id_admin' => 'Id Admin',
            'waktu_buka' => 'Waktu Buka',
            'waktu_tutup' => 'Waktu Tutup',
            'judul' => 'Judul',
            'deskripsi' => 'Deskripsi',
            'dibuat_pada' => 'Dibuat Pada',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAdmin()
    {
        return $this->hasOne(Admin::className(), ['id_admin' => 'id_admin']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPertanyaans()
    {
        return $this->hasMany(Pertanyaan::className(), ['id_kuesioner' => 'id_kuesioner']);
    }
}
