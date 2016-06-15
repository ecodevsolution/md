<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "banner_right".
 *
 * @property integer $idbaner
 * @property string $baner_ads
 * @property string $tag
 * @property integer $flag
 */
class BannerRight extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banner_right';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['flag'], 'integer'],
            [['baner_ads', 'tag'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idbaner' => 'Idbaner',
            'baner_ads' => 'Baner Ads',
            'tag' => 'Tag',
            'flag' => 'Flag',
        ];
    }
}
