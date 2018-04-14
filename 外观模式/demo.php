<?php
/**
 * Created by PhpStorm.
 * User: zhangjunjie
 * Date: 2018/4/14
 * Time: 下午5:12
 */

class stock1
{
    /**
     * 卖出
     */
    public function sell()
    {
        echo '卖出股票1'.PHP_EOL;
    }

    /**
     * 买入
     */
    public function buy()
    {
        echo '买入股票1'.PHP_EOL;
    }
}

class stock2
{
    /**
     * 卖出
     */
    public function sell()
    {
        echo '卖出股票1'.PHP_EOL;
    }

    /**
     * 买入
     */
    public function buy()
    {
        echo '买入股票1'.PHP_EOL;
    }
}

class stock3
{
    /**
     * 卖出
     */
    public function sell()
    {
        echo '卖出股票1'.PHP_EOL;
    }

    /**
     * 买入
     */
    public function buy()
    {
        echo '买入股票1'.PHP_EOL;
    }
}

/**
 * 门面
 * Class facade
 */
class facade
{
    private $stock1;
    private $stock2;
    private $stock3;

    function __construct()
    {
        $this->stock1 = new stock1();
        $this->stock2 = new stock1();
        $this->stock3 = new stock1();
    }

    /**
     * 方案一 买入股票1,3
     */
    function method1()
    {
        $this->stock1->buy();
        $this->stock3->buy();
    }

    /**
     * 方案二 卖出股票1,3 买入2
     */
    function method2()
    {
        $this->stock1->sell();
        $this->stock3->sell();
        $this->stock2->buy();
    }
}

$xiaoming = new facade();
echo '小明执行了方案1'.PHP_EOL;
$xiaoming->method1();
echo '小明执行了方案2'.PHP_EOL;
$xiaoming->method2();