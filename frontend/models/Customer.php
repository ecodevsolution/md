<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property integer $idcustomer
 * @property integer $is_guest
 * @property string $titles
 * @property string $firstname
 * @property string $lastname
 * @property string $auth_key
 * @property string $bod
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property CustomerAddress[] $customerAddresses
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }
	public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_guest', 'status', 'created_at', 'updated_at'], 'integer'],
            [['titles', 'firstname', 'lastname', 'auth_key', 'password_hash', 'email', 'created_at'], 'required'],
            [['titles'], 'string', 'max' => 25],
            [['firstname', 'lastname', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
			[['email'],'email'],
            [['bod'], 'string', 'max' => 50],
            [['email'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcustomer' => 'Idcustomer',
            'is_guest' => 'Is Guest',
            'titles' => 'Titles',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'auth_key' => 'Auth Key',
            'bod' => 'Bod',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerAddress()
    {
        return $this->hasMany(CustomerAddress::className(), ['idcustomer' => 'idcustomer']);
    }
	public function getOrder()
    {
        return $this->hasMany(Order::className(), ['idcustomer' => 'idcustomer']);
    }
}
