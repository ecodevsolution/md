<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "customer_address".
 *
 * @property integer $idaddress
 * @property integer $idcustomer
 * @property string $address
 * @property string $alias
 * @property string $zip
 * @property string $city
 * @property string $province
 * @property string $phone
 */
class CustomerAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer_address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcustomer'], 'integer'],
            [['address'], 'string'],
            [['alias', 'zip', 'city', 'province', 'phone'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idaddress' => 'Idaddress',
            'idcustomer' => 'Idcustomer',
            'address' => 'Address',
            'alias' => 'Alias',
            'zip' => 'Zip',
            'city' => 'City',
            'province' => 'Province',
            'phone' => 'Phone',
        ];
    }
}
