<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gambar".
 *
 * @property string $id_gambar
 * @property string $id_projects
 * @property integer $urut
 * @property string $gambar
 *
 * @property Projects $idProjects
 */
class Gambar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gambar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_projects', 'urut', 'gambar'], 'required'],
            [['id_projects', 'urut'], 'integer'],
            [['gambar'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_gambar' => 'Id Gambar',
            'id_projects' => 'Id Projects',
            'urut' => 'Urut',
            'gambar' => 'Gambar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProjects()
    {
        return $this->hasOne(Projects::className(), ['id_projects' => 'id_projects']);
    }
}
