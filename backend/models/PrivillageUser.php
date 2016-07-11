<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "privillage_user".
 *
 * @property integer $idprivillage
 * @property integer $idrole
 * @property integer $idmenu
 * @property integer $iddtlmenu
 * @property string $name
 * @property string $status
 * @property integer $flag
 */
class PrivillageUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'privillage_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idrole', 'idmenu', 'iddtlmenu', 'flag'], 'integer'],
            [['name', 'status'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idprivillage' => 'Idprivillage',
            'idrole' => 'Idrole',
            'idmenu' => 'Idmenu',
            'iddtlmenu' => 'Iddtlmenu',
            'name' => 'Name',
            'status' => 'Status',
            'flag' => 'Flag',
        ];
    }
}
