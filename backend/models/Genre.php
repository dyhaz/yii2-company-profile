<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "genre".
 *
 * @property string $id_genre
 * @property string $nama_genre
 *
 * @property GenreProject[] $genreProjects
 * @property Projects[] $idProjects
 */
class Genre extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'genre';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_genre'], 'required'],
            [['nama_genre'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_genre' => 'Id Genre',
            'nama_genre' => 'Nama Genre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenreProjects()
    {
        return $this->hasMany(GenreProject::className(), ['id_genre' => 'id_genre']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProjects()
    {
        return $this->hasMany(Projects::className(), ['id_projects' => 'id_projects'])->viaTable('genre_project', ['id_genre' => 'id_genre']);
    }
}
