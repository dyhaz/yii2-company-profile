<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "pengembang".
 *
 * @property string $id_pengembang
 * @property string $id_admin
 * @property string $nama_lengkap
 * @property string $foto
 * @property string $deskripsi
 * @property string $peran
 * @property string $status
 *
 * @property Admin $idAdmin
 */
class Pengembang extends \yii\db\ActiveRecord
{

	public $imageFile;
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pengembang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_lengkap', 'deskripsi', 'peran'], 'required'],
            [['id_admin'], 'integer'],
            [['nama_lengkap'], 'string', 'max' => 50],
            [['foto'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
            [['deskripsi'], 'string', 'max' => 100],
            [['peran'], 'string', 'max' => 30],
            [['status'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pengembang' => 'Id Pengembang',
            'id_admin' => 'Id Admin',
            'nama_lengkap' => 'Nama Lengkap',
            'foto' => 'Foto',
            'deskripsi' => 'Deskripsi',
            'peran' => 'Peran',
            'status' => 'Status',
        ];
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
        $this->imageFile->saveAs('uploads/9vkvvvq/' . $filename);
        return $filename;
    }
}
