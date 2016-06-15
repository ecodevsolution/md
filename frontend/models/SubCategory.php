<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "sub_category".
 *
 * @property integer $idsubcategory
 * @property integer $idmaincategory
 * @property string $sub_category_name
 * @property integer $flag
 *
 * @property DetailCategory[] $detailCategories
 * @property MainCategory $idmaincategory0
 */
class SubCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sub_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idmaincategory', 'flag'], 'integer'],
            [['sub_category_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idsubcategory' => 'Idsubcategory',
            'idmaincategory' => 'Idmaincategory',
            'sub_category_name' => 'Sub Category Name',
            'flag' => 'Flag',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailCategories()
    {
        return $this->hasMany(DetailCategory::className(), ['idsubcategory' => 'idsubcategory']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdmaincategory0()
    {
        return $this->hasOne(MainCategory::className(), ['idmain' => 'idmaincategory']);
    }
}
