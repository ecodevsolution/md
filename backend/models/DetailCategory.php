<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detail_category".
 *
 * @property integer $iddetail
 * @property integer $idsubcategory
 * @property string $detail_name
 * @property integer $flag
 *
 * @property SubCategory $idsubcategory0
 */
class DetailCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detail_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idsubcategory', 'flag'], 'integer'],
            [['detail_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddetail' => 'Iddetail',
            'idsubcategory' => 'Idsubcategory',
            'detail_name' => 'Detail Name',
            'flag' => 'Flag',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubCategory()
    {
        return $this->hasOne(SubCategory::className(), ['idsubcategory' => 'idsubcategory']);
    }
}
