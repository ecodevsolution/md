<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "footer".
 *
 * @property integer $idfooter
 * @property integer $idcolor
 * @property string $footer_name
 * @property string $footer_code
 */
class Footer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'footer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcolor'], 'integer'],
            [['footer_code'], 'string'],
            [['footer_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idfooter' => 'Idfooter',
            'idcolor' => 'Idcolor',
            'footer_name' => 'Footer Name',
            'footer_code' => 'Footer Code',
        ];
    }
}
