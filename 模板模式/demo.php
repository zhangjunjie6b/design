<?php
/**
 * 模板模式
 * Created by PhpStorm.
 * User: zhangjunjie
 * Date: 2018/4/13
 * Time: 上午11:39
 */

/**
 * 问题类
 * Class template
 */
class template
{
    final function problem_1()
    {
        echo '1+1=';
        echo $this->answer_1().PHP_EOL;
    }
    final function problem_2()
    {
        echo '2+2=';
        echo $this->answer_2().PHP_EOL;
    }
    final function problem_3()
    {
        echo '3+2=';
        echo $this->answer_3().PHP_EOL;
    }
    /**
     * 调用这个答案
     * @return string
     */
    protected function answer_1()
    {
        return '未提交';
    }
    protected function answer_2()
    {
        return '未提交';
    }
    protected function answer_3()
    {
        return '未提交';
    }
}

/**
 * 小明的试卷
 * Class xiaoming
 */
class xiaoming extends template
{
    public function answer_1()
    {
        return '1';
    }
    public function answer_2()
    {
        return '2';
    }
    public function answer_3()
    {
        return '3';
    }
}

/**
 * 小红的试卷
 * Class xiaohong
 */
class xiaohong extends template
{
    public function answer_1()
    {
        return '5';
    }
    public function answer_2()
    {
        return '2';
    }
    public function answer_3()
    {
        return '9';
    }
}

echo '小明的试卷:'.PHP_EOL;
$xiaoming = new xiaoming();
$xiaoming->problem_1();
$xiaoming->problem_2();
$xiaoming->problem_3();

echo '小红的试卷:'.PHP_EOL;
$xiaoming = new xiaohong();
$xiaoming->problem_1();
$xiaoming->problem_2();
$xiaoming->problem_3();