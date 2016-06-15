<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "metadescription".
 *
 * @property integer $idmetadesc
 * @property string $description
 */
class Metadescription extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'metadescription';
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
            'idmetadesc' => 'Idmetadesc',
            'description' => 'Description',
        ];
    }
}
