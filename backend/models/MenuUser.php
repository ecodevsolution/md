<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "menu_user".
 *
 * @property integer $idmenu
 * @property string $menu_name
 * @property string $mod_by
 * @property integer $flag
 * @property string $mod_date
 */
class MenuUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menu_name', 'mod_by', 'flag', 'mod_date'], 'required'],
            [['flag'], 'integer'],
            [['mod_date'], 'safe'],
            [['menu_name', 'mod_by'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idmenu' => 'Idmenu',
            'menu_name' => 'Menu Name',
            'mod_by' => 'Mod By',
            'flag' => 'Flag',
            'mod_date' => 'Mod Date',
        ];
    }
}
