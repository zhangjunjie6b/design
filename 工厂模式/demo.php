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
interface operate{
    public function getResult($number1,$number2);
}

/**
 * 加法计算
 * Class addOperate
 */
class addOperate implements operate{
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
class multiplication implements operate
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
class division implements operate
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
 * 工厂类调度方法
 * Class factory
 */
class factory
{
    public static function createOperate($operate)
    {
        switch ($operate){
            case '+' :
                $oper = new addOperate();
                break;

            case '-' :
                $oper = new lessOperate();
                break;

            case '*' :
                $oper = new multiplication();
                break;

            case '/' :
                $oper = new division();
                break;
            default :
                return false;
                break;
        }
        return $oper;

    }
}

$operate = factory::createOperate('/');
$result = $operate->getResult(6,3);
echo $result . "\n";