<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\UserBank;

/**
 * UserBankSearch represents the model behind the search form about `backend\models\UserBank`.
 */
class UserBankSearch extends UserBank
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iduserbank'], 'integer'],
            [['bank', 'name', 'rekening'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = UserBank::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'iduserbank' => $this->iduserbank,
        ]);

        $query->andFilterWhere(['like', 'bank', $this->bank])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'rekening', $this->rekening]);

        return $dataProvider;
    }
}
