<?php
/**
 * 状态模式
 * 一天24小时,工作时长8小时.21点后为睡觉时间
 * 早9晚6
 * ------------------------
 * 9-12  | 精力充沛     | job1
 * 12-13  | 战力十足     | job2
 * 15-18   | 困得不行     | job3
 * 18-21  | 老板说不加班  | job4
 * 21以后 | 睡觉        | job5
 * ------------------------
 * Created by PhpStorm.
 * User: zhangjunjie
 * Date: 2018/4/24
 * Time: 下午4:17
 */


interface state
{
    /**
     * 获取状态
     * @return mixed
     */
    public function get($w);
}

class job1 implements  state
{
    public function get($w)
    {

        if( 9 <= $w->time && $w->time  < 12){
            echo '精力充沛'.PHP_EOL;
        }else{
            $w->setState(new job2());
            $w->get();
        }

    }

}

class job2 implements  state
{
    public function get($w)
    {

        if( 12 <= $w->time  && $w->time  < 15){
            echo '战力十足'.PHP_EOL;
        }else{
            $w->setState(new job3());
            $w->get();
        }
    }
}

class job3 implements  state
{
    public function get($w)
    {

        if( 15 <= $w->time  && $w->time  < 18){
            echo '困得不行'.PHP_EOL;
        }else{
            $w->setState(new job4());
            $w->get();
        }
    }
}

class job4 implements  state
{
    public function get($w)
    {

        if( 18 <= $w->time  && $w->time  < 21){
            echo '老板说不加班'.PHP_EOL;
        }else{
            $w->setState(new job5());
            $w->get();
        }
    }
}

class job5 implements  state
{
    public function get($w)
    {
        if( 21 <= $w->time ){
            echo '睡觉'.PHP_EOL;
        }
    }
}


class work
{
    public   $time;
    private  $_job;

    function __construct()
    {
        $this->_job = new job1();
    }

    /**
     * 依赖注入一个job方法
     * @param $obj
     */
    function setState($obj)
    {
        $this->_job =  $obj;
    }

    function setTime($time)
    {
        $this->time = $time;
    }

    function get()
    {
        $this->_job->get($this);
    }
}

$work = new work();
$work->setTime(9);
$work->get();

$work->setTime(10);
$work->get();

$work->setTime(15);
$work->get();

$work->setTime(21);
$work->get();