<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "image".
 *
 * @property integer $id
 * @property integer $product_id
 *
 * @property Product $product
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idimage' => 'Id Image',
            'product_id' => 'Product ID',
			'image_name' => 'Image Name',
			'title' => 'Title',
			'is_cover' => 'Is Cover',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['idproduk' => 'product_id']);
    }

    /**
     * @return string image hash
     */
    protected function getHash()
    {
		return ($this->image_name);
        //return md5($this->product_id . '-' . $this->idimage);
    }

    /**
     * @return string path to image file
     */
    public function getPath()
    {
        return Yii::getAlias('img/cart/300x/' . $this->getHash() );
    }

    /**
     * @return string URL of the image
     */
    public function getUrl()
    {
        return Yii::getAlias('img/cart/300x/' . $this->getHash());
    }

    public function afterDelete()
    {
        unlink($this->getPath());
        parent::afterDelete();
    }
}
