<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BannerBottom;

/**
 * BannerBottomSearch represents the model behind the search form about `backend\models\BannerBottom`.
 */
class BannerBottomSearch extends BannerBottom
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idbanner', 'flag'], 'integer'],
            [['ads', 'tag'], 'safe'],
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
        $query = BannerBottom::find();

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
            'flag' => $this->flag,
        ]);

        $query->andFilterWhere(['like', 'ads', $this->ads])
            ->andFilterWhere(['like', 'tag', $this->tag]);

        return $dataProvider;
    }
}
