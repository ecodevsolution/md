<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "order_status".
 *
 * @property integer $idstatus
 * @property integer $idorder
 * @property integer $status
 * @property string $date
 * @property string $updateby
 */
class OrderStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idorder', 'status', 'date', 'updateby'], 'required'],
            [['idorder', 'status'], 'integer'],
            [['date'], 'safe'],
            [['updateby'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idstatus' => 'Idstatus',
            'idorder' => 'Idorder',
            'status' => 'Status',
            'date' => 'Date',
            'updateby' => 'Updateby',
        ];
    }
}
