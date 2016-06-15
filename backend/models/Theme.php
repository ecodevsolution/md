<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "theme".
 *
 * @property integer $idtheme
 * @property string $theme_name
 * @property string $idheader
 * @property integer $idfont_paragraph
 * @property integer $idfont_title
 * @property integer $idfooter
 * @property integer $idnavbar
 * @property string $user_name
 * @property string $width
 * @property integer $flag
 */
class Theme extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'theme';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idheader', 'idfont_paragraph', 'idfont_title', 'idfooter', 'idnavbar', 'flag'], 'integer'],
            [['theme_name', 'user_name', 'width'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtheme' => 'Idtheme',
            'theme_name' => 'Theme Name',
            'idheader' => 'Idheader',
            'idfont_paragraph' => 'Idfont Paragraph',
            'idfont_title' => 'Idfont Title',
            'idfooter' => 'Idfooter',
            'idnavbar' => 'Idnavbar',
            'user_name' => 'User Name',
            'width' => 'Width',
            'flag' => 'Flag',
        ];
    }
}
