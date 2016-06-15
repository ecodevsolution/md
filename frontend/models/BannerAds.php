<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "banner_ads".
 *
 * @property integer $idbannerads
 * @property string $banner
 * @property string $tag
 * @property integer $flag
 */
class BannerAds extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banner_ads';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['flag'], 'integer'],
            [['banner', 'tag'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idbannerads' => 'Idbannerads',
            'banner' => 'Banner',
            'tag' => 'Tag',
            'flag' => 'Flag',
        ];
    }
}
