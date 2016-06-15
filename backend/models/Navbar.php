<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "navbar".
 *
 * @property integer $idnavbar
 * @property integer $idslider
 * @property integer $idcolor
 * @property string $category_nav
 * @property string $nav_name
 * @property string $nav_code
 */
class Navbar extends \yii\db\ActiveRecord
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
            [['idslider', 'idcolor'], 'integer'],
            [['category_nav', 'nav_code'], 'string'],
            [['nav_name'], 'string', 'max' => 50]
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
            'idcolor' => 'Idcolor',
            'category_nav' => 'Category Nav',
            'nav_name' => 'Nav Name',
            'nav_code' => 'Nav Code',
        ];
    }
}
