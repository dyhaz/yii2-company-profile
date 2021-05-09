<?php

namespace backend\models;

use Yii;
use backend\models\Siswa;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class SiswaSearch extends Siswa
{
    public function rules()
    {
        // only fields in rules() are searchable
        return [
            [['id'], 'integer'],
            [['nama', 'alamat', 'nip'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Siswa::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => array('pageSize' => 5),
            'sort'=> ['defaultOrder' => ['nama'=>SORT_ASC]]
        ]);

        // load the search form data and validate
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        // adjust the query by adding the filters
        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['like', 'nama', $this->nama])
              ->andFilterWhere(['like', 'alamat', $this->alamat])
              ->andFilterWhere(['like', 'nip', $this->nip]);

        return $dataProvider;
    }
}