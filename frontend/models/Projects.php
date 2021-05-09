<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "projects".
 *
 * @property string $id_projects
 * @property string $id_admin
 * @property string $judul
 * @property integer $tahun
 * @property string $foto
 * @property string $keterangan
 * @property string $dibuat_pada
 * @property string $rating
 * @property string $platform
 * @property string $link_demo
 * @property string $status
 *
 * @property Gambar[] $gambars
 * @property GenreProject[] $genreProjects
 * @property Genre[] $idGenres
 * @property Admin $idAdmin
 */
class Projects extends \yii\db\ActiveRecord
{

	public $imageFile;
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_admin', 'judul', 'tahun', 'dibuat_pada', 'platform'], 'required'],
            [['id_admin', 'tahun'], 'integer'],
            [['keterangan'], 'string'],
            [['dibuat_pada'], 'safe'],
            [['judul'], 'string', 'max' => 50],
            [['foto'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
            [['rating', 'platform', 'status'], 'string', 'max' => 1],
            [['link_demo'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_projects' => 'Id Projects',
            'id_admin' => 'Id Admin',
            'judul' => 'Judul',
            'tahun' => 'Tahun',
            'foto' => 'Foto',
            'keterangan' => 'Keterangan',
            'dibuat_pada' => 'Dibuat Pada',
            'rating' => 'Rating',
            'platform' => 'Platform',
            'link_demo' => 'Link Demo',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGambars()
    {
        return $this->hasMany(Gambar::className(), ['id_projects' => 'id_projects']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenreProjects()
    {
        return $this->hasMany(GenreProject::className(), ['id_projects' => 'id_projects']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGenres()
    {
        return $this->hasMany(Genre::className(), ['id_genre' => 'id_genre'])->viaTable('genre_project', ['id_projects' => 'id_projects']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAdmin()
    {
        return $this->hasOne(Admin::className(), ['id_admin' => 'id_admin']);
    }
	
	public function upload()
    {
		if(!is_object($this->imageFile)) return '';
		$filename = $this->imageFile->baseName . '.' . $this->imageFile->extension;
        $this->imageFile->saveAs('uploads/g7yrgfk/' . $filename);
        return $filename;
    }
}
