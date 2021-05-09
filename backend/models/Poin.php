<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "poin".
 *
 * @property string $id_poin
 * @property string $id_admin
 * @property string $nama
 * @property integer $jumlah
 * @property string $dibuat_pada
 * @property string $diberikan_pada
 *
 * @property Admin $idAdmin
 * @property PoinTamu[] $poinTamus
 * @property Tamu[] $idTamus
 */
class Poin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'poin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['id_admin', 'dibuat_pada', 'diberikan_pada'], 'required'],
            //[['id_admin', 'jumlah'], 'integer'],
            //[['dibuat_pada', 'diberikan_pada'], 'safe'],
            //[['nama'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_poin' => 'Id Poin',
            'id_admin' => 'Id Admin',
            'nama' => 'Nama',
            'jumlah' => 'Jumlah',
            'dibuat_pada' => 'Dibuat Pada',
            'diberikan_pada' => 'Diberikan Pada',
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
    public function getPoinTamus()
    {
        return $this->hasMany(PoinTamu::className(), ['id_poin' => 'id_poin']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTamus()
    {
        return $this->hasMany(Tamu::className(), ['id_tamu' => 'id_tamu'])->viaTable('poin_tamu', ['id_poin' => 'id_poin']);
    }
}
