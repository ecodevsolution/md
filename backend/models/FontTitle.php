<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "font_title".
 *
 * @property integer $idfont_title
 * @property integer $idcolor
 * @property string $font_name
 * @property string $font_code
 */
class FontTitle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'font_title';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcolor'], 'integer'],
            [['font_code'], 'string'],
            [['font_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idfont_title' => 'Idfont Title',
            'idcolor' => 'Idcolor',
            'font_name' => 'Font Name',
            'font_code' => 'Font Code',
        ];
    }
}
