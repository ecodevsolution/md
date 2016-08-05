<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_bank".
 *
 * @property integer $iduserbank
 * @property string $bank
 * @property string $name
 * @property string $rekening
 */
class UserBank extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_bank';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bank', 'name', 'rekening'], 'required'],
            [['bank', 'name', 'rekening'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iduserbank' => 'Iduserbank',
            'bank' => 'Bank',
            'name' => 'Name',
            'rekening' => 'Rekening',
        ];
    }
}
