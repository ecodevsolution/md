<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property integer $idslider
 * @property string $category
 * @property string $slider_img
 * @property string $tag
 * @property string $tag_highligt
 */
class Slider extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category', 'slider_img', 'tag', 'tag_highligt'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idslider' => 'Idslider',
            'category' => 'Category',
            'slider_img' => 'Slider Img',
            'tag' => 'Tag',
            'tag_highligt' => 'Tag Highligt',
        ];
    }
	 public function getMainCategory()
    {
        return $this->hasOne(MainCategory::className(), ['idmain' => 'category']);
    }
}
