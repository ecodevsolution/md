<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "banner_sale".
 *
 * @property integer $idbanner
 * @property string $sale_slider
 * @property string $tag
 */
class BannerSale extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banner_sale';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sale_slider', 'tag'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idbanner' => 'Idbanner',
            'sale_slider' => 'Sale Slider',
            'tag' => 'Tag',
        ];
    }
}
