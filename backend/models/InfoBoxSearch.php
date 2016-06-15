<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\InfoBox;

/**
 * InfoBoxSearch represents the model behind the search form about `backend\models\InfoBox`.
 */
class InfoBoxSearch extends InfoBox
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idbox'], 'integer'],
            [['logo', 'tag_info', 'tag_desc'], 'safe'],
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
        $query = InfoBox::find();

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
            'idbox' => $this->idbox,
        ]);

        $query->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'tag_info', $this->tag_info])
            ->andFilterWhere(['like', 'tag_desc', $this->tag_desc]);

        return $dataProvider;
    }
}
