<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kontributor".
 *
 * @property string $id_kontributor
 * @property string $id_users
 * @property string $nama_display
 *
 * @property Berita[] $beritas
 * @property Users $idUsers
 */
class Kontributor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kontributor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_users', 'nama_display'], 'required'],
            [['id_users'], 'integer'],
            [['nama_display'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kontributor' => 'Id Kontributor',
            'id_users' => 'Id Users',
            'nama_display' => 'Nama Display',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBeritas()
    {
        return $this->hasMany(Berita::className(), ['id_kontributor' => 'id_kontributor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsers()
    {
        return $this->hasOne(Users::className(), ['id_users' => 'id_users']);
    }
}
