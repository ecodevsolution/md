<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "banner_bottom".
 *
 * @property integer $idbanner
 * @property string $ads
 * @property string $tag
 * @property integer $flag
 */
class BannerBottom extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banner_bottom';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['flag'], 'integer'],
            [['ads', 'tag'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idbanner' => 'Idbanner',
            'ads' => 'Ads',
            'tag' => 'Tag',
            'flag' => 'Flag',
        ];
    }
}
