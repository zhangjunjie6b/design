<?php
/**\
 * 策略模式
 * 场景：购物车
 * 常见的购物车有很多算法如：
 * 1.折扣 2.满减 3.正常付费 等
 * Created by PhpStorm.
 * User: zhangjunjie
 * Date: 2018/4/1
 * Time: 上午10:14
 */

/**
 * Interface strategy
 */
interface strategy
{
    public function arithmetic($pice);
}

/**
 * 满减
 * Class fullCut
 */
class fullCut implements strategy
{
    /**
     * @param $pice
     * @return mixed
     */
    public function arithmetic($pice)
    {
        /**
         * 这数组就想找个刻度尺
         * |——————|——————|——————|———————|———————————|
         * 0     499    599   699      799       ...
         */
        $config = [
            ['pice'=>499, 'reduce'=>0],
            ['pice'=>599, 'reduce'=>100],
            ['pice'=>699,'reduce'=>200],
            ['pice'=>799,'reduce'=>250],
            ['pice'=>899,'reduce'=>400],
        ];//满减额度

        $left  = 0;//左区间
        $spot  = 0;//落点(满减金额)
        $endPice = end($config);

        if($endPice['pice'] < $pice){
            $spot = $endPice['reduce'];//最大金额
        }else{
            foreach ($config as $k=>$v){

                if($left < $pice && $pice <= $v['pice']){
                    $spot = $v['reduce'];
                    break;
                }else{
                    $left = $v['pice'];
                }
            }

        }

        return $pice - $spot;
    }
}

/**
 * 折扣
 * Class discount
 */
class discount implements strategy
{
    private static $discountdRate = '';//打折率

    /**
     * 设置折扣率
     * @param $rate
     */
    public function setRate($rate){
        self::$discountdRate = $rate;
    }

    public function arithmetic($price)
    {
        return round($price * self::$discountdRate,2);
    }
}

/**
 * 实现类
 * Class price
 */
class price
{
    public static $instance = '';

    function __construct($instance)
    {
        self::$instance = $instance;
    }

    /**
     * 获取价格
     * @param $price
     * @return mixed
     */
    function get($price)
    {
        return self::$instance->arithmetic($price);
    }

    /**
     * 返回实例
     * @return string
     */
    function instance()
    {
        return self::$instance;
    }


}

//满减
$strategy = new price(new fullCut());
$pice = $strategy->get(1000);
echo "满减结果：".$pice."\n";

//折扣
$strategy = new price(new discount());
$strategy->instance()->setRate(0.5);//设置折扣
$pice = $pice = $strategy->get(1000);
echo "折扣结果：".$pice."\n";

//满减再折扣
$strategy = new price(new fullCut());
$pice = $strategy->get(1000);
$strategy = new price(new discount());
$strategy->instance()->setRate(0.8);//设置折扣
$pice = $pice = $strategy->get($pice);
echo "满减后再折扣：".$pice."\n";