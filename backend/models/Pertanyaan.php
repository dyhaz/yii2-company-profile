<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pertanyaan".
 *
 * @property string $id_pertanyaan
 * @property string $id_kuesioner
 * @property string $pertanyaan
 * @property integer $urut
 * @property string $jenis
 *
 * @property Kuesioner $idKuesioner
 * @property Pilihan[] $pilihans
 * @property ResponTulis[] $responTulis
 */
class Pertanyaan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pertanyaan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pertanyaan', 'jenis'], 'required'],
            [['id_kuesioner', 'urut'], 'integer'],
            [['pertanyaan'], 'string'],
            [['jenis'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pertanyaan' => 'Id Pertanyaan',
            'id_kuesioner' => 'Id Kuesioner',
            'pertanyaan' => 'Pertanyaan',
            'urut' => 'Urut',
            'jenis' => 'Jenis',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKuesioner()
    {
        return $this->hasOne(Kuesioner::className(), ['id_kuesioner' => 'id_kuesioner']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPilihans()
    {
        return $this->hasMany(Pilihan::className(), ['id_pertanyaan' => 'id_pertanyaan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponTulis()
    {
        return $this->hasMany(ResponTulis::className(), ['id_pertanyaan' => 'id_pertanyaan']);
    }
}
