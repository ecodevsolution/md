<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property integer $idimage
 * @property integer $product_id
 * @property string $image_name
 * @property string $title
 * @property integer $is_cover
 *
 * @property Product $product
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'is_cover'], 'integer'],
            [['image_name', 'title'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idimage' => 'Idimage',
            'product_id' => 'Product ID',
            'image_name' => 'Image Name',
            'title' => 'Title',
            'is_cover' => 'Is Cover',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['idproduk' => 'product_id']);
    }
}
