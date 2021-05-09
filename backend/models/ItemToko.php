<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item_toko".
 *
 * @property string $id_item_toko
 * @property string $id_admin
 * @property string $gambar
 * @property string $judul
 * @property string $deskripsi
 * @property string $berakhir_pada
 * @property string $dibuat_pada
 * @property string $file
 * @property string $status
 *
 * @property Admin $idAdmin
 * @property Penukaran[] $penukarans
 * @property Tamu[] $idTamus
 */
class ItemToko extends \yii\db\ActiveRecord
{

	public $imageFile;
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item_toko';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_admin'], 'integer'],
            [['judul', 'deskripsi', 'berakhir_pada'], 'required'],
            [['berakhir_pada', 'dibuat_pada'], 'safe'],
            [['gambar'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
            [['judul'], 'string', 'max' => 50],
            [['deskripsi'], 'string', 'max' => 100],
            [['file'], 'string', 'max' => 255],
            [['harga'], 'integer'],
            [['status'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_item_toko' => 'Id Item Toko',
            'id_admin' => 'Id Admin',
            'gambar' => 'Gambar',
            'judul' => 'Judul',
            'deskripsi' => 'Deskripsi',
            'berakhir_pada' => 'Berakhir Pada',
            'dibuat_pada' => 'Dibuat Pada',
            'file' => 'File',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenukarans()
    {
        return $this->hasMany(Penukaran::className(), ['id_item_toko' => 'id_item_toko']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTamus()
    {
        return $this->hasMany(Tamu::className(), ['id_tamu' => 'id_tamu'])->viaTable('penukaran', ['id_item_toko' => 'id_item_toko']);
    }
	
	public function upload()
    {
		if(!is_object($this->imageFile)) return '';
		$filename = $this->imageFile->baseName . '.' . $this->imageFile->extension;
        $this->imageFile->saveAs('uploads/shop/' . $filename);
        return $filename;
    }
}
