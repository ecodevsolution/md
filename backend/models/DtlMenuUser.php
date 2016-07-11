<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "dtl_menu_user".
 *
 * @property integer $urutan
 * @property integer $id_dtl_menu
 * @property integer $id_menu
 * @property string $menu_detail_name
 * @property string $mod_by
 * @property string $mod_date
 */
class DtlMenuUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dtl_menu_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_dtl_menu', 'id_menu', 'menu_detail_name', 'mod_by', 'mod_date'], 'required'],
            [['id_dtl_menu', 'id_menu'], 'integer'],
            [['mod_date'], 'safe'],
            [['menu_detail_name', 'mod_by'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'urutan' => 'Urutan',
            'id_dtl_menu' => 'Id Dtl Menu',
            'id_menu' => 'Id Menu',
            'menu_detail_name' => 'Menu Detail Name',
            'mod_by' => 'Mod By',
            'mod_date' => 'Mod Date',
        ];
    }
}
