<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "bank".
 *
 * @property string $idbank
 * @property string $bank_name
 * @property string $account_no
 * @property string $account_name
 * @property string $branch
 */
class Bank extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bank';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idbank', 'account_name'], 'required'],
            [['idbank', 'bank_name', 'account_no', 'account_name', 'branch'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idbank' => 'Idbank',
            'bank_name' => 'Bank Name',
            'account_no' => 'Account No',
            'account_name' => 'Account Name',
            'branch' => 'Branch',
        ];
    }
}
