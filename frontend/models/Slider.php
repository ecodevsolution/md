<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property integer $idslider
 * @property string $category
 * @property string $slider_img
 * @property string $tag
 * @property string $tag_highligt
 * @property string $tag_end
 * @property string $short_description
 * @property string $more_description
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
            [['category', 'slider_img', 'tag', 'tag_highligt', 'tag_end', 'short_description', 'more_description'], 'string', 'max' => 50]
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
            'tag_end' => 'Tag End',
            'short_description' => 'Short Description',
            'more_description' => 'More Description',
        ];
    }
}
