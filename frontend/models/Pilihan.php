<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pilihan".
 *
 * @property string $isi1
 * @property integer $urut
 * @property string $id_pilihan
 * @property string $id_pertanyaan
 *
 * @property Pertanyaan $idPertanyaan
 * @property ResponPilih[] $responPilihs
 */
class Pilihan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pilihan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['isi1'], 'string'],
            [['urut', 'id_pertanyaan'], 'integer'],
            [['id_pertanyaan'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'isi1' => 'Isi1',
            'urut' => 'Urut',
            'id_pilihan' => 'Id Pilihan',
            'id_pertanyaan' => 'Id Pertanyaan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPertanyaan()
    {
        return $this->hasOne(Pertanyaan::className(), ['id_pertanyaan' => 'id_pertanyaan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponPilihs()
    {
        return $this->hasMany(ResponPilih::className(), ['id_pilihan' => 'id_pilihan']);
    }
}
