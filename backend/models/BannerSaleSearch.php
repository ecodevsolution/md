<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BannerSale;

/**
 * BannerSaleSearch represents the model behind the search form about `backend\models\BannerSale`.
 */
class BannerSaleSearch extends BannerSale
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idbanner'], 'integer'],
            [['sale_slider', 'tag'], 'safe'],
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
        $query = BannerSale::find();

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
            'idbanner' => $this->idbanner,
        ]);

        $query->andFilterWhere(['like', 'sale_slider', $this->sale_slider])
            ->andFilterWhere(['like', 'tag', $this->tag]);

        return $dataProvider;
    }
}
