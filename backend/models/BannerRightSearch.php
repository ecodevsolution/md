<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BannerRight;

/**
 * BannerRightSearch represents the model behind the search form about `backend\models\BannerRight`.
 */
class BannerRightSearch extends BannerRight
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idbaner', 'flag'], 'integer'],
            [['baner_ads', 'tag'], 'safe'],
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
        $query = BannerRight::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idbaner' => $this->idbaner,
            'flag' => $this->flag,
        ]);

        $query->andFilterWhere(['like', 'baner_ads', $this->baner_ads])
            ->andFilterWhere(['like', 'tag', $this->tag]);

        return $dataProvider;
    }
}
