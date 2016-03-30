<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "invites".
 *
 * @property string $invite
 * @property integer $status
 * @property string $date_status
 */
class Invites extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'invites';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['date_status'], 'required'],
            [['date_status'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'invite' => 'Invite',
            'status' => 'Status',
            'date_status' => 'Date Status',
        ];
    }
}
