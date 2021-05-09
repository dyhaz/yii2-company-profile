<?php
namespace app\models;

use common\models\User;
use yii\base\Model;
use app\models\Pilihan;
use Yii;

/**
 * Signup form
 */
class PilihanForm extends Model
{
    public $pilihan1;
    public $pilihan2;
    public $pilihan3;
	public $pilihan4;
	public $id_pertanyaan;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //['username', 'filter', 'filter' => 'trim'],
            [['pilihan1','pilihan2','pilihan3','pilihan4'], 'required'],
            //['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            //['username', 'string', 'min' => 2, 'max' => 255],,
            [['pilihan1','pilihan2','pilihan3','pilihan4'], 'string', 'max' => 255],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function save()
    {
        if ($this->validate()) {
            for($i = 1 ; $i <= 4 ; $i++) {
				$pilihan = new Pilihan();
				$pilihan->id_pertanyaan = $this->id_pertanyaan;
				$pilihan->isi1 = $i===1?$this->pilihan1:($i==2?$this->pilihan2:
					($i==3?$this->pilihan3:$this->pilihan4));
				$pilihan->urut = $i;
				$pilihan->save();			
			}
			
        }

        return true;
    }
}
