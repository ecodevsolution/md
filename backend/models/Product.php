<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $idproduk
 * @property integer $iduser
 * @property integer $idmain
 * @property integer $idsub
 * @property integer $iddetail
 * @property integer $idbrand
 * @property string $title
 * @property string $tag
 * @property string $sku
 * @property integer $stock
 * @property integer $minqty
 * @property integer $maxqty
 * @property integer $weight
 * @property string $short_description
 * @property string $description
 * @property double $tax
 * @property double $service
 * @property string $price
 * @property string $final_price
 * @property integer $status
 *
 * @property Image[] $images
 * @property OrderItem[] $orderItems
 * @property Brand $idbrand0
 * @property DetailCategory $iddetail0
 * @property MainCategory $idmain0
 * @property SubCategory $idsub0
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iduser', 'idmain', 'idsub', 'iddetail', 'idbrand', 'stock', 'minqty', 'maxqty', 'weight', 'sale', 'discount', 'condition','status'], 'integer'],
            [['short_description', 'description'], 'string'],
            [['tax', 'service', 'price', 'final_price'], 'number'],
            [['title'], 'string', 'max' => 255],
            [['tag', 'sku'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idproduk' => 'Idproduk',
            'iduser' => 'Iduser',
            'idmain' => 'Idmain',
            'idsub' => 'Idsub',
            'iddetail' => 'Iddetail',
            'idbrand' => 'Idbrand',
            'title' => 'Title',
			'sale' => 'Sale',
			'condition' => 'Condition',
            'tag' => 'Tag',
            'sku' => 'Sku',
            'stock' => 'Stock',
            'minqty' => 'Minqty',
            'maxqty' => 'Maxqty',
            'weight' => 'Weight',
            'short_description' => 'Short Description',
            'description' => 'Description',
            'tax' => 'Tax',
            'service' => 'Service',
			'discount' => 'Discount',
            'price' => 'Price',
            'final_price' => 'Final Price',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Images::className(), ['product_id' => 'idproduk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['product_id' => 'idproduk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::className(), ['idbrand' => 'idbrand']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIddetail0()
    {
        return $this->hasOne(DetailCategory::className(), ['iddetail' => 'iddetail']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMainCategory()
    {
        return $this->hasOne(MainCategory::className(), ['idmain' => 'idmain']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdsub0()
    {
        return $this->hasOne(SubCategory::className(), ['idsubcategory' => 'idsub']);
    }
}
