<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "info_box".
 *
 * @property integer $idbox
 * @property string $logo
 * @property string $tag_info
 * @property string $tag_desc
 */
class InfoBox extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'info_box';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['logo', 'tag_info', 'tag_desc'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idbox' => 'Idbox',
            'logo' => 'Logo',
            'tag_info' => 'Tag Info',
            'tag_desc' => 'Tag Desc',
        ];
    }
}
