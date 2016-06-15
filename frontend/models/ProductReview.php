<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "product_review".
 *
 * @property integer $idreview
 * @property integer $idcustomer
 * @property integer $idproduct
 * @property string $nickname
 * @property integer $rating
 * @property string $description
 * @property string $date
 */
class ProductReview extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_review';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcustomer', 'idproduct', 'rating'], 'integer'],
            [['idproduct', 'nickname', 'rating', 'description'], 'required'],
            [['description'], 'string'],
            [['date'], 'safe'],
            [['nickname'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
	public function getProduct()
    {
        return $this->hasMany(Product::className(), ['idproduk' => 'idproduct']);
    }
    public function attributeLabels()
    {
        return [
            'idreview' => 'Idreview',
            'idcustomer' => 'Idcustomer',
            'idproduct' => 'Idproduct',
            'nickname' => 'Nickname',
            'rating' => 'Rating',
            'description' => 'Description',
            'date' => 'Date',
        ];
    }
}
