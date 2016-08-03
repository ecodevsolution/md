<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "seo".
 *
 * @property integer $idseo
 * @property string $meta_title
 * @property string $meta_keyword
 * @property string $meta_description
 * @property string $meta_author
 */
class Seo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['meta_title', 'meta_keyword', 'meta_description', 'meta_author'], 'required'],
            [['meta_title', 'meta_author'], 'string', 'max' => 50],
            [['meta_keyword'], 'string', 'max' => 255],
            [['meta_description'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idseo' => 'Idseo',
            'meta_title' => 'Meta Title',
            'meta_keyword' => 'Meta Keyword',
            'meta_description' => 'Meta Description',
            'meta_author' => 'Meta Author',
        ];
    }
}
