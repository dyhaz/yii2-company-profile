<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "genre_project".
 *
 * @property string $id_genre
 * @property string $id_projects
 *
 * @property Genre $idGenre
 * @property Projects $idProjects
 */
class GenreProject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'genre_project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_genre', 'id_projects'], 'required'],
            [['id_genre', 'id_projects'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_genre' => 'Id Genre',
            'id_projects' => 'Id Projects',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGenre()
    {
        return $this->hasOne(Genre::className(), ['id_genre' => 'id_genre']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProjects()
    {
        return $this->hasOne(Projects::className(), ['id_projects' => 'id_projects']);
    }
}
