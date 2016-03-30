<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "countries".
 *
 * @property string $id_country
 * @property string $country_name
 */
class Countries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'countries';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_name'], 'required'],
            [['country_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_country' => 'Id Country',
            'country_name' => 'Country Name',
        ];
    }
}
