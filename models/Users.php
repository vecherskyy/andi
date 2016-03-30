<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use app\models\Cities;
/**
 * This is the model class for table "users".
 *
 * @property string $id_user
 * @property string $login
 * @property string $password
 * @property string $phone
 * @property string $id_city
 * @property string $invite
 */
class Users extends \yii\db\ActiveRecord
{
    public $password_repeat;
    public $country;
    public $phone_number;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login', 'password','password_repeat', 'phone', 'invite'], 'required'],
            [['login'], 'unique'],
            [['id_city', 'country', 'phone'], 'integer'],
            [['login','password_repeat'], 'string', 'min' => 5, 'max' => 20],
            ['password', 'compare', 'message' => 'Пароли не совпадают'],
            [['login', 'password'], 'match', 'pattern' => '/^[a-zA-Z0-9]+$/', 'message' => 'Допускаются большие и маленькие буквы латинского алфавита и цифры'],
            [['phone_number'], 'match', 'pattern' => '/^[-0-9\s\(\)\+]+$/', 'message' => 'Допускаются цифры, пробелы и знаки +,-,(,)'],
            [['invite'], 'match', 'pattern' => '/^[0-9]+$/', 'message' => 'Допускаются только цифры'],
            [['invite'], 'string', 'min' => 6, 'max' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'login' => 'Логин',
            'password' => 'Еще раз пароль',
            'password_repeat' => 'Пароль',
            'phone' => 'Телефон',
            'country' => 'Страна',
            'id_city' => 'Город',
            'invite' => 'Инвайт',
        ];
    }

}
