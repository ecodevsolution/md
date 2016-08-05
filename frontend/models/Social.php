<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "social".
 *
 * @property integer $idsocial
 * @property string $name
 * @property string $position
 * @property string $class
 */
class Social extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'social';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'position', 'class'], 'required'],
            [['name', 'position', 'class'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idsocial' => 'Idsocial',
            'name' => 'Name',
            'position' => 'Position',
            'class' => 'Class',
        ];
    }
}
