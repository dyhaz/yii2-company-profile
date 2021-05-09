<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tamu".
 *
 * @property string $id_tamu
 * @property string $id_users
 * @property string $alamat
 * @property string $jenis_kelamin
 * @property string $no_hp
 * @property integer $poin
 *
 * @property Penukaran[] $penukarans
 * @property ItemToko[] $idItemTokos
 * @property Pesan[] $pesans
 * @property PoinTamu[] $poinTamus
 * @property Poin[] $idPoins
 * @property ResponPilih[] $responPilihs
 * @property ResponTulis[] $responTulis
 * @property Users $idUsers
 */
class Tamu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tamu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_users', 'no_hp', 'poin'], 'required'],
            [['id_users', 'poin'], 'integer'],
            [['alamat'], 'string', 'max' => 100],
            [['jenis_kelamin'], 'string', 'max' => 1],
            [['no_hp'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tamu' => 'Id Tamu',
            'id_users' => 'Id Users',
            'alamat' => 'Alamat',
            'jenis_kelamin' => 'Jenis Kelamin',
            'no_hp' => 'No Hp',
            'poin' => 'Poin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenukarans()
    {
        return $this->hasMany(Penukaran::className(), ['id_tamu' => 'id_tamu']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdItemTokos()
    {
        return $this->hasMany(ItemToko::className(), ['id_item_toko' => 'id_item_toko'])->viaTable('penukaran', ['id_tamu' => 'id_tamu']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPesans()
    {
        return $this->hasMany(Pesan::className(), ['id_tamu' => 'id_tamu']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPoinTamus()
    {
        return $this->hasMany(PoinTamu::className(), ['id_tamu' => 'id_tamu']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPoins()
    {
        return $this->hasMany(Poin::className(), ['id_poin' => 'id_poin'])->viaTable('poin_tamu', ['id_tamu' => 'id_tamu']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponPilihs()
    {
        return $this->hasMany(ResponPilih::className(), ['id_tamu' => 'id_tamu']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponTulis()
    {
        return $this->hasMany(ResponTulis::className(), ['id_tamu' => 'id_tamu']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsers()
    {
        return $this->hasOne(Users::className(), ['id_users' => 'id_users']);
    }
	
}
