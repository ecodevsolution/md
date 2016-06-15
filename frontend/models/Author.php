<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "author".
 *
 * @property integer $idauthor
 * @property string $author
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idauthor' => 'Idauthor',
            'author' => 'Author',
        ];
    }
}
