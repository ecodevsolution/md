<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "kurir".
 *
 * @property string $idkurir
 * @property string $name
 * @property integer $price
 */
class Kurir extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kurir';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idkurir'], 'required'],
            [['price'], 'integer'],
            [['idkurir', 'name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idkurir' => 'Idkurir',
            'name' => 'Name',
            'price' => 'Price',
        ];
    }
}
