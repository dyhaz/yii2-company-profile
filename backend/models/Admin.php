<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property string $id_admin
 * @property string $id_users
 *
 * @property Users $idUsers
 * @property ItemToko[] $itemTokos
 * @property Kuesioner[] $kuesioners
 * @property Pengembang[] $pengembangs
 * @property Pesan[] $pesans
 * @property Poin[] $poins
 * @property Projects[] $projects
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_users'], 'required'],
            [['id_users'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_admin' => 'Id Admin',
            'id_users' => 'Id Users',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsers()
    {
        return $this->hasOne(Users::className(), ['id_users' => 'id_users']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemTokos()
    {
        return $this->hasMany(ItemToko::className(), ['id_admin' => 'id_admin']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKuesioners()
    {
        return $this->hasMany(Kuesioner::className(), ['id_admin' => 'id_admin']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengembangs()
    {
        return $this->hasMany(Pengembang::className(), ['id_admin' => 'id_admin']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPesans()
    {
        return $this->hasMany(Pesan::className(), ['id_admin' => 'id_admin']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPoins()
    {
        return $this->hasMany(Poin::className(), ['id_admin' => 'id_admin']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Projects::className(), ['id_admin' => 'id_admin']);
    }
}
