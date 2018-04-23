<?php
/**
 * 依赖注入
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

$bmw = new BMW(new LuTai());
$bmw->run();