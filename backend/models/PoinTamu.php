<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "poin_tamu".
 *
 * @property string $id_poin
 * @property string $id_tamu
 *
 * @property Poin $idPoin
 * @property Tamu $idTamu
 */
class PoinTamu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'poin_tamu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_poin', 'id_tamu'], 'required'],
            [['id_poin', 'id_tamu'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_poin' => 'Id Poin',
            'id_tamu' => 'Id Tamu',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPoin()
    {
        return $this->hasOne(Poin::className(), ['id_poin' => 'id_poin']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTamu()
    {
        return $this->hasOne(Tamu::className(), ['id_tamu' => 'id_tamu']);
    }
}
