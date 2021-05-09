<?php

namespace backend\models;

use Yii;
use backend\models\Pengembang;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class ModelSearch extends Pengembang
{
    public function rules()
    {
        // only fields in rules() are searchable
        return [
            [['nama_lengkap', 'deskripsi', 'peran'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Pengembang::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => array('pageSize' => 5),
            'sort'=> ['defaultOrder' => ['nama_lengkap'=>SORT_ASC]]
        ]);

        // load the search form data and validate
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        // adjust the query by adding the filters
        $query->andFilterWhere(['id_pengembang' => $this->id_pengembang]);
        $query->andFilterWhere(['like', 'nama_lengkap', $this->nama_lengkap])
              ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
              ->andFilterWhere(['like', 'peran', $this->peran]);

        return $dataProvider;
    }
	public function excel($params)
    {
        $query = Pengembang::find();
		$dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => array('pageSize' => 10000),
        ]);
		$this->load($params);
		if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
		$query->andFilterWhere([
            'id_pengembang' => $this->id_pengembang,
            'nama_lengkap' => $this->nama_lengkap,
            'deskripsi' => $this->deskripsi,
            'peran' => $this->peran
        ]);
		return $dataProvider;
    }

}