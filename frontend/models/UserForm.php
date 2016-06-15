<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property integer $role
 * @property string $idcity
 * @property string $firstname
 * @property string $lastname
 * @property string $username
 * @property string $nama_toko
 * @property integer $jenis_toko
 * @property string $tipe_toko
 * @property integer $idrange
 * @property string $domain_name
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property double $balanced
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
            [['role', 'idcity', 'firstname', 'lastname', 'username', 'tipe_toko', 'domain_name', 'auth_key', 'password_hash', 'email', 'created_at'], 'required'],
            [['role', 'jenis_toko', 'idrange', 'status', 'created_at', 'updated_at'], 'integer'],
            [['balanced'], 'number'],
            [['idcity', 'firstname', 'lastname', 'username', 'nama_toko', 'domain_name', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['tipe_toko'], 'string', 'max' => 50],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role' => 'Role',
            'idcity' => 'Idcity',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'username' => 'Username',
            'nama_toko' => 'Nama Toko',
            'jenis_toko' => 'Jenis Toko',
            'tipe_toko' => 'Tipe Toko',
            'idrange' => 'Idrange',
            'domain_name' => 'Domain Name',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'balanced' => 'Balanced',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
