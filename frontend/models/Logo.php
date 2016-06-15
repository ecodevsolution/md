<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "logo".
 *
 * @property integer $idlogo
 * @property string $title
 * @property string $username
 * @property string $logo
 */
class Logo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'logo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'username', 'logo'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idlogo' => 'Idlogo',
            'title' => 'Title',
            'username' => 'Username',
            'logo' => 'Logo',
        ];
    }
}
