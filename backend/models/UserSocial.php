<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_social".
 *
 * @property integer $idsocial
 * @property string $icon
 * @property string $name
 * @property string $link
 */
class UserSocial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_social';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['icon', 'name', 'link'], 'required'],
            [['icon', 'name', 'link'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idsocial' => 'Idsocial',
            'icon' => 'Icon',
            'name' => 'Name',
            'link' => 'Link',
        ];
    }
}
