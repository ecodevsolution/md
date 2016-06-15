<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "color".
 *
 * @property integer $idcolor
 * @property string $color_name
 * @property string $color
 */
class Color extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'color';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['color_name', 'color'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcolor' => 'Idcolor',
            'color_name' => 'Color Name',
            'color' => 'Color',
        ];
    }
}
