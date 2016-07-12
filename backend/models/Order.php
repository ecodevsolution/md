<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $idorder
 * @property integer $idcustomer
 * @property integer $idaddress
 * @property integer $idinvoice
 * @property string $idshipping
 * @property string $bank
 * @property string $account_name
 * @property double $sub_total
 * @property double $shipping
 * @property double $tax
 * @property double $grandtotal
 * @property integer $status
 * @property string $date
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idorder', 'idcustomer', 'idaddress', 'idinvoice', 'idshipping', 'bank', 'account_name', 'sub_total', 'shipping', 'tax', 'grandtotal', 'status', 'date'], 'required'],
            [['idorder', 'idcustomer', 'idaddress', 'idinvoice', 'status'], 'integer'],
            [['sub_total', 'shipping', 'tax', 'grandtotal'], 'number'],
            [['date'], 'safe'],
            [['idshipping', 'bank', 'account_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idorder' => 'Idorder',
            'idcustomer' => 'Idcustomer',
            'idaddress' => 'Idaddress',
            'idinvoice' => 'Idinvoice',
            'idshipping' => 'Idshipping',
            'bank' => 'Bank',
            'account_name' => 'Account Name',
            'sub_total' => 'Sub Total',
            'shipping' => 'Shipping',
            'tax' => 'Tax',
            'grandtotal' => 'Grandtotal',
            'status' => 'Status',
            'date' => 'Date',
        ];
    }
	public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['idcustomer' => 'idcustomer']);
    }
	public function getInvoice()
    {
        return $this->hasMany(CustomerAddress::className(), ['idaddress' => 'idinvoice']);
    }
	public function getAddress()
    {
        return $this->hasMany(CustomerAddress::className(), ['idaddress' => 'idaddress']);
    }
}
