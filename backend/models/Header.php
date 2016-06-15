<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "header".
 *
 * @property integer $idheader
 * @property integer $idcolor
 * @property string $header_name
 * @property string $header_code
 */
class Header extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'header';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcolor'], 'integer'],
            [['header_code'], 'string'],
            [['header_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idheader' => 'Idheader',
            'idcolor' => 'Idcolor',
            'header_name' => 'Header Name',
            'header_code' => 'Header Code',
        ];
    }
}
