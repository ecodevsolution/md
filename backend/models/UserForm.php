<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property integer $idrole
 * @property integer $idcity
 * @property integer $idprovince
 * @property string $courier
 * @property string $province
 * @property string $city
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $nama_toko
 * @property integer $paket
 * @property string $domain
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property double $balanced
 * @property string $address
 * @property string $phone
 * @property string $work_hour
 * @property string $description
 * @property string $logo
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class UserForm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idrole', 'firstname', 'lastname', 'email', 'password_hash', 'status'], 'required'],
            [['idrole', 'idcity', 'idprovince', 'paket', 'status', 'created_at', 'updated_at'], 'integer'],
            [['balanced'], 'number'],
            [['description'], 'string'],
            [['courier'], 'string', 'max' => 25],
            [['province', 'city', 'firstname', 'lastname', 'email', 'nama_toko', 'work_hour', 'logo'], 'string', 'max' => 50],
			[['email'],'email'],
            [['domain'], 'string', 'max' => 100],
			[['password_hash'],'string', 'min'=>6],
			['email', 'unique', 'targetAttribute' => ['email'], 'message' => 'Your Email Already Exist !.'],
            [['auth_key'], 'string', 'max' => 32],
            [['password_hash', 'password_reset_token', 'address'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 20],
			['logo', 'image', 'extensions' => ['jpg'], 
				'minWidth' =>111, 'minHeight' => 51,
			],
        ];
    }

    /**
     * @inheritdoc
     */
	public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idrole' => 'Idrole',
            'idcity' => 'Idcity',
            'idprovince' => 'Idprovince',
            'courier' => 'Courier',
            'province' => 'Province',
            'city' => 'City',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'nama_toko' => 'Nama Toko',
            'paket' => 'Paket',
            'domain' => 'Domain',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'balanced' => 'Balanced',
            'address' => 'Address',
            'phone' => 'Phone',
            'work_hour' => 'Work Hour',
            'description' => 'Description',
            'logo' => 'Logo',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
