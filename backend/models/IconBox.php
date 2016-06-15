<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "icon_box".
 *
 * @property integer $idicon
 * @property string $name_icon
 * @property string $icon_code
 */
class IconBox extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'icon_box';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_icon', 'icon_code'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idicon' => 'Idicon',
            'name_icon' => 'Name Icon',
            'icon_code' => 'Icon Code',
        ];
    }
}
