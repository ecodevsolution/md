<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "navbar".
 *
 * @property integer $idnavbar
 * @property integer $idslider
 * @property string $color
 * @property string $category_nav
 * @property string $nav_name
 * @property string $nav_code
 */
class NavbarForm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'navbar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idslider'], 'integer'],
            [['nav_code'], 'string'],
            [['color', 'nav_name'], 'string', 'max' => 50],
            [['category_nav'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idnavbar' => 'Idnavbar',
            'idslider' => 'Idslider',
            'color' => 'Color',
            'category_nav' => 'Category Nav',
            'nav_name' => 'Nav Name',
            'nav_code' => 'Nav Code',
        ];
    }
}
