<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "metatitle".
 *
 * @property integer $idtitle
 * @property string $titleweb
 */
class Metatitle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'metatitle';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titleweb'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtitle' => 'Idtitle',
            'titleweb' => 'Titleweb',
        ];
    }
}
