<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cities".
 *
 * @property string $id_city
 * @property string $id_country
 * @property string $city_name
 */
class Cities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_country', 'city_name'], 'required'],
            [['id_country'], 'integer'],
            [['city_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_city' => 'Id City',
            'id_country' => 'Id Country',
            'city_name' => 'City Name',
        ];
    }
}
