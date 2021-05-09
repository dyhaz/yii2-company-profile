<?php

namespace app\models;

use Yii;
use app\models\ItemToko;
use app\models\Tamu;

/**
 * This is the model class for table "penukaran".
 *
 * @property string $id_tamu
 * @property string $id_item_toko
 * @property string $ditukarkan_pada
 * @property string $status
 *
 * @property ItemToko $idItemToko
 * @property Tamu $idTamu
 */
class Penukaran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'penukaran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tamu', 'id_item_toko', 'ditukarkan_pada'], 'required'],
            [['id_tamu', 'id_item_toko'], 'integer'],
            [['ditukarkan_pada'], 'safe'],
            [['status'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tamu' => 'Id Tamu',
            'id_item_toko' => 'Id Item Toko',
            'ditukarkan_pada' => 'Ditukarkan Pada',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdItemToko()
    {
        return $this->hasOne(ItemToko::className(), ['id_item_toko' => 'id_item_toko']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTamu()
    {
        return $this->hasOne(Tamu::className(), ['id_tamu' => 'id_tamu']);
    }
	
	public static function getJumlahPenukaran($id_item_toko) {
		$penukaran = ItemToko::find()->with('penukarans')->where(['id_item_toko' => $id_item_toko])->all();
		return sizeof($penukaran[0]->penukarans);
	}
}
