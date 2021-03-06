<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "brand".
 *
 * @property integer $idbrand
 * @property string $brand_name
 *
 * @property Product[] $products
 */
class Brand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'brand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brand_name','brand_logo'], 'string', 'max' => 50],
			['brand_logo', 'image', 'extensions' => ['png', 'jpg'], 
				'minWidth' => 140, 'minHeight' => 29,
			],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idbrand' => 'Idbrand',
			'brand_logo' => 'Brand Logo',
            'brand_name' => 'Brand Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['idbrand' => 'idbrand']);
    }
}
