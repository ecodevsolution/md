<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "bank".
 *
 * @property string $bankid
 * @property string $logo
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
            [['bankid'], 'required'],
            [['bankid', 'logo'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bankid' => 'Bankid',
            'logo' => 'Logo',
        ];
    }
}
