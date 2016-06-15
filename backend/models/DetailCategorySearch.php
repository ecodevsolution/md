<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DetailCategory;

/**
 * DetailCategorySearch represents the model behind the search form about `backend\models\DetailCategory`.
 */
class DetailCategorySearch extends DetailCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iddetail', 'idsubcategory', 'flag'], 'integer'],
            [['detail_name'], 'safe'],
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
        $query = DetailCategory::find();

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
            'iddetail' => $this->iddetail,
            'idsubcategory' => $this->idsubcategory,
            'flag' => $this->flag,
        ]);

        $query->andFilterWhere(['like', 'detail_name', $this->detail_name]);

        return $dataProvider;
    }
}
