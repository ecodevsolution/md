<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "keyword".
 *
 * @property integer $idkeyword
 * @property string $keyword
 */
class Keyword extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'keyword';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['keyword'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idkeyword' => 'Idkeyword',
            'keyword' => 'Keyword',
        ];
    }
}
