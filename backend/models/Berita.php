<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "berita".
 *
 * @property string $id_berita
 * @property string $id_kontributor
 * @property string $judul
 * @property string $isi1
 * @property string $isi2
 * @property string $dibuat_pada
 * @property string $diterbitkan_pada
 * @property string $preview
 * @property integer $views
 * @property string $status
 *
 * @property Kontributor $idKontributor
 */
class Berita extends \yii\db\ActiveRecord
{

	public $imageFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'berita';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kontributor', 'judul', 'isi1', 'isi2'], 'required'],
            [['id_kontributor', 'views'], 'integer'],
            [['isi1', 'isi2'], 'string'],
            [['dibuat_pada', 'diterbitkan_pada'], 'safe'],
            [['judul'], 'string', 'max' => 50],
            [['preview'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
            [['status'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_berita' => 'Id Berita',
            'id_kontributor' => 'Id Kontributor',
            'judul' => 'Judul',
            'isi1' => 'Isi1',
            'isi2' => 'Isi2',
            'dibuat_pada' => 'Dibuat Pada',
            'diterbitkan_pada' => 'Diterbitkan Pada',
            'preview' => 'Preview',
            'views' => 'Views',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKontributor()
    {
        return $this->hasOne(Kontributor::className(), ['id_berita' => 'id_berita']);
    }
	
		public function upload()
    {
		if(!is_object($this->imageFile)) return '';
		$filename = $this->imageFile->baseName . '.' . $this->imageFile->extension;
        $this->imageFile->saveAs('uploads/58rhkk8/' . $filename);
        return $filename;
    }
}
