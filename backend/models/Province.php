<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "province".
 *
 * @property integer $idprovince
 * @property integer $idcity
 * @property string $province_name
 */
class Province extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'province';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcity'], 'integer'],
            [['province_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idprovince' => 'Idprovince',
            'idcity' => 'Idcity',
            'province_name' => 'Province Name',
        ];
    }
}
