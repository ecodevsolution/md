<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "order_item".
 *
 * @property integer $iddetail
 * @property integer $order_id
 * @property string $product_id
 * @property integer $qty
 * @property double $discount
 * @property double $price
 */
class OrderItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'qty'], 'integer'],
            [['discount', 'price'], 'number'],
            [['product_id'], 'string', 'max' => 50],
			[['qty'], 'integer', 'min'=>1, 'max'=>10],
			[['qty'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddetail' => 'Iddetail',
            'order_id' => 'Order ID',
            'product_id' => 'Product ID',
            'qty' => 'Qty',
            'discount' => 'Discount',
            'price' => 'Price',
        ];
    }
}
