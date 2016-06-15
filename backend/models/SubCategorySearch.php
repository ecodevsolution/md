<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SubCategory;

/**
 * SubCategorySearch represents the model behind the search form about `backend\models\SubCategory`.
 */
class SubCategorySearch extends SubCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idsubcategory', 'idmaincategory', 'flag'], 'integer'],
            [['sub_category_name'], 'safe'],
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
        $query = SubCategory::find();

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
            'idsubcategory' => $this->idsubcategory,
            'idmaincategory' => $this->idmaincategory,
            'flag' => $this->flag,
        ]);

        $query->andFilterWhere(['like', 'sub_category_name', $this->sub_category_name]);

        return $dataProvider;
    }
}
