<?php

namespace backend\models;
use yii\base\Model;
use Yii;
use yii\db\ActiveRecord;
use app\models\PoinTamu;
use app\models\Poin;
use app\models\Tamu;
use backend\models\Admin;
use app\models\Users;
use yii\web\Session;

/**
 * This is the model class for table "siswa".
 *
 * @property integer $id
 * @property string $nip
 * @property string $nama
 * @property string $alamat
 * @property string $telepon
 * @property string $created_at
 * @property string $updated_at
 */
class IsiKredit extends Model
{
	public $id_tamu;
    public $nama;
    public $jumlah;
    public $diberikan_pada;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tamu', 'nama', 'jumlah'], 'required'],
			[['jumlah'], 'integer'],
            [['nama'], 'string'],
            [['diberikan_pada'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tamu' => 'Pengguna',
            'nama' => 'Nama Kredit',
            'jumlah' => 'Jumlah',
            'diberikan_pada' => 'Status',
        ];
    }
	
	public function isi() {
        if ($this->validate()) {
			$poin = new Poin();
			$poin->dibuat_pada = date('Y-m-d h:m:s');
			$poin_tamu = new PoinTamu();
			if($tamu = Tamu::findOne($this->id_tamu)) {
				$poin->jumlah = $this->jumlah;
				if(!empty($this->diberikan_pada)) {
					$tamu->poin = $tamu->poin + $poin->jumlah;
					$poin->diberikan_pada = $this->diberikan_pada;
				}
				$poin->nama = $this->nama;
				$session = new Session;
				$session->open();
				$user = new Users();
				$user->id_users = is_object($session['user'])?$session['user']->id_users:'1';
				$admins = $user->getAdmins()->all();
				foreach($admins as $admin) {
					$poin->id_admin = $admin->id_admin;
				}
				if(empty($poin->id_admin)) $poin->id_admin = '1';
				$poin_tamu->id_tamu = $this->id_tamu;
				$tamu->update();
				$poin->save();
				$poin_tamu->id_poin = $poin->id_poin;
				$poin_tamu->save();
				return $poin;
			}
		}
		return null;
	}
	
	public static function find() {
		$sql = 'SELECT poin.id_poin,nama,jumlah,dibuat_pada,diberikan_pada FROM poin,poin_tamu,
					tamu WHERE poin.id_poin=poin_tamu.id_poin and tamu.id_tamu=poin_tamu.id_tamu';
		$data = Poin::findBySql($sql, []);
		return $data;
	}
}
