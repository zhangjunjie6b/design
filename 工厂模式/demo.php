<?php
/**
 * 简单工厂
 * Created by PhpStorm.
 * User: zhangjunjie
 * Date: 2018/3/29
 * Time: 下午10:40
 */

/**
 * 约定一个抽象类
 * Interface operate
 */
interface operate
{
    public function getResult($number1,$number2);
}

/**
 * 加法计算
 * Class addOperate
 */
class addOperate implements operate
{
    public function getResult($number1, $number2)
    {
        return $number1 + $number2;
    }
}

/**
 * 减法计算
 * Class lessOperate
 */
class lessOperate implements operate
{

    public function getResult($number1, $number2)
    {
        return $number1 - $number2;
    }
}

/**
 * 乘法计算
 * Class multiplication
 */
class multiplicationOperate implements operate
{
    public function getResult($number1, $number2)
    {
        return $number1 * $number2;
    }
}

/**
 * 除法计算
 * Class division
 */
class divisionOperate implements operate
{

    private $number1; //被除数
    private $number2; //除数

    /**
     * 除法规则
     * @return bool
     */
    private function rule()
    {
        if($this->number2 == 0 || $this->number2 > $this->number1){
            return false;
        }

    }

    /**
     * 计算
     * @param $number1
     * @param $number2
     * @return bool|float|int
     */
    public function getResult($number1, $number2)
    {
        $this->number1 = $number1;
        $this->number2 = $number2;

        if($this->rule() !== false){
            return $number1/$number2;
        }else{
            return '逻辑错误';
        }

    }

}


/**
 * 抽象工厂方法
 * Interface createOperation
 */
interface create
{
    function createOperation();
}

class add implements  create
{
    function createOperation()
    {
        return new addOperate();
    }
}

class less implements  create
{
    function createOperation()
    {
        return new lessOperate();
    }
}

class multiplication implements  create
{
    function createOperation()
    {
        return new multiplicationOperate();
    }
}

class division implements  create
{
    function createOperation()
    {
        return new divisionOperate();
    }
}


$operate = new division();
$result = $operate->createOperation();
$date = $result->getResult(6,3);
echo $date . "\n";