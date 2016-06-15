<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Theme;

/**
 * ThemeSearch represents the model behind the search form about `backend\models\Theme`.
 */
class ThemeSearch extends Theme
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idtheme', 'idheader', 'idfont_paragraph', 'idfont_title', 'idfooter', 'idnavbar', 'idlogo', 'flag'], 'integer'],
            [['theme_name', 'user_name', 'width'], 'safe'],
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
        $query = Theme::find();

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
            'idtheme' => $this->idtheme,
            'idheader' => $this->idheader,
            'idfont_paragraph' => $this->idfont_paragraph,
            'idfont_title' => $this->idfont_title,
            'idfooter' => $this->idfooter,
            'idnavbar' => $this->idnavbar,
            'idlogo' => $this->idlogo,
            'flag' => $this->flag,
        ]);

        $query->andFilterWhere(['like', 'theme_name', $this->theme_name])
            ->andFilterWhere(['like', 'user_name', $this->user_name])
            ->andFilterWhere(['like', 'width', $this->width]);

        return $dataProvider;
    }
}
