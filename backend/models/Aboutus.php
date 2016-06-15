<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "aboutus".
 *
 * @property integer $idabout
 * @property string $description
 */
class Aboutus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aboutus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idabout' => 'Idabout',
            'description' => 'Description',
        ];
    }
}
