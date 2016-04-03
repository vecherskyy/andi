<?php
/**
 * Created by PhpStorm.
 * User: vecherskyy
 * Date: 02.04.16
 * Time: 16:55
 */
namespace app\components;
class Singleton
{
    /**
     * @var array
     * внутренний массив значений класса
     */
    private $props = [];

    /**
     * @var
     * экземпляр самого себя
     */
    private static $_instance;

    /**
     * защищает класс от new
     */
    private function __construct(){}

    /**
     * защищает класс от клонирования
     */
    private function __clone(){}

    /**
     * защищает класс от unserialize
     */
    private function __wakeup(){}

    /**
     * @return Sigleton
     * получаем объект
     */
    public static function getInstance()
    {

        if(self::$_instance === null){
            self::$_instance = new self();
            echo 'create obj';
        }
        echo 'repeat';
        return self::$_instance;
    }

    /**
     * @param $key
     * @param $val
     * устанавливаем значения
     */
    public function setProperty($key, $val)
    {
        $this->props[$key] = $val;
    }

    /**
     * @param $key
     * @return mixed
     * получаем значения
     */
    public function getProperty($key)
    {
        return $this->props[$key];
    }

}