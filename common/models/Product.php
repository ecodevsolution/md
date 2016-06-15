<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionTrait;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property integer $category_id
 * @property string $price
 *
 * @property Image[] $images
 * @property OrderItem[] $orderItems
 * @property Category $category
 */
class Product extends \yii\db\ActiveRecord implements CartPositionInterface
{
    use CartPositionTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
            ]
        ];
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
       return [
            [['iduser', 'idmain', 'idsub', 'iddetail', 'idbrand', 'sale','condition', 'stock', 'minqty', 'maxqty', 'weight', 'status'], 'integer'],
            [['short_description', 'description'], 'string'],
            [['tax', 'service', 'discount', 'price', 'final_price'], 'number'],
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
        return $this->hasMany(Image::className(), ['product_id' => 'idproduk']);
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
    public function getDetail()
    {
        return $this->hasOne(DetailCategory::className(), ['iddetail' => 'iddetail']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMain()
    {
        return $this->hasOne(MainCategory::className(), ['idmain' => 'idmain']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSub()
    {
        return $this->hasOne(SubCategory::className(), ['idsubcategory' => 'idsub']);
    }

    /**
     * @inheritdoc
     */
	public function getPrice()
    {
        return $this->price;
    }
    public function getId()
    {
        return $this->idproduk;
    }
}
