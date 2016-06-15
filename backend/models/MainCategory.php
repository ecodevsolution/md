<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "main_category".
 *
 * @property integer $idmain
 * @property string $main_category_name
 * @property integer $flag
 *
 * @property SubCategory[] $subCategories
 */
class MainCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'main_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['flag'], 'integer'],
            [['username'], 'string'],
            [['main_category_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idmain' => 'Idmain',
            'username' => 'Username',
            'main_category_name' => 'Main Category Name',
            'flag' => 'Flag',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubCategories()
    {
        return $this->hasMany(SubCategory::className(), ['idmaincategory' => 'idmain']);
    }
}
