<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BannerAds;

/**
 * BannerAdsSearch represents the model behind the search form about `backend\models\BannerAds`.
 */
class BannerAdsSearch extends BannerAds
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idbannerads', 'flag'], 'integer'],
            [['banner', 'tag'], 'safe'],
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
        $query = BannerAds::find();

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
            'idbannerads' => $this->idbannerads,
            'flag' => $this->flag,
        ]);

        $query->andFilterWhere(['like', 'banner', $this->banner])
            ->andFilterWhere(['like', 'tag', $this->tag]);

        return $dataProvider;
    }
}
