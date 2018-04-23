<?php
/**
 * 容器实现
 * Created by PhpStorm.
 * User: zhangjunjie
 * Date: 2018/4/23
 * Time: 下午10:25
 */
class LuTai
{
    function roll()
    {
        echo '轮胎在滚动'.PHP_EOL;
    }
}

class BMW
{
    private $_luntai;

    function __construct($luntai)
    {
        $this->_luntai = $luntai;
    }

    function run()
    {
        $this->_luntai->roll();
        echo '去吃烧烤'.PHP_EOL;
    }
}

class Container
{
    static $register = [];

    static function bind($name,Closure $closure)
    {
        self::$register[$name] = $closure;
    }

    static function make($name)
    {
        $closure = self::$register[$name];
        return $closure();
    }
}

Container::bind('luntai',function(){
    return new LuTai();
});

Container::bind('bmw',function(){
    return new BMW(Container::make('luntai'));
});

$bmw = Container::make('bmw');
$bmw->run();