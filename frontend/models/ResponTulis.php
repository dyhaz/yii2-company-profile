<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "respon_tulis".
 *
 * @property string $jawaban
 * @property string $dijawab_pada
 * @property string $alamat_ip
 * @property string $id_respon_tulis
 * @property string $id_tamu
 * @property string $id_pertanyaan
 *
 * @property Pertanyaan $idPertanyaan
 * @property Tamu $idTamu
 */
class ResponTulis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'respon_tulis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dijawab_pada'], 'safe'],
            [['id_tamu', 'id_pertanyaan'], 'integer'],
            [['jawaban'], 'string', 'max' => 100],
            [['alamat_ip'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'jawaban' => 'Jawaban',
            'dijawab_pada' => 'Dijawab Pada',
            'alamat_ip' => 'Alamat Ip',
            'id_respon_tulis' => 'Id Respon Tulis',
            'id_tamu' => 'Id Tamu',
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
    public function getIdTamu()
    {
        return $this->hasOne(Tamu::className(), ['id_tamu' => 'id_tamu']);
    }
}
