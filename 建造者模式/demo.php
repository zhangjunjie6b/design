<?php
/**
 * Created by PhpStorm.
 * User: zhangjunjie
 * Date: 2018/4/14
 * Time: 下午11:31
 */

/**
 * 人类
 * Class people
 */
class people
{
    public $_heard;
    public $_body;
    public $_hand;
    public $_foot;

    function show()
    {
        echo $this->_heard.'头'.PHP_EOL;
        echo $this->_body.'身'.PHP_EOL;
        echo $this->_hand.'手'.PHP_EOL;
        echo $this->_foot.'脚'.PHP_EOL;
    }

}

/**
 * 人类抽象类构建者
 */
abstract class peopleBuilder
{
    protected $_people;

    function __construct()
    {
        $this->_people = new people();
    }

    abstract function heard();
    abstract function body();
    abstract function hand();
    abstract function foot();
}

/**
 * 胖子
 * Class pangzi
 */
class pangzi extends peopleBuilder
{
    function heard()
    {
        $this->_people->_heard = '大';
    }
    function body()
    {
        $this->_people->_body = '胖';
    }
    function hand()
    {
        $this->_people->_hand = '肥';
    }
    function foot()
    {
        $this->_people->_foot = '大';
    }
    function show()
    {
        $this->_people->show();
    }
}

/**
 * 瘦子
 * Class pangzi
 */
class souzi extends peopleBuilder
{
    function heard()
    {
        $this->_people->_heard = '小';
    }
    function body()
    {
        $this->_people->_body = '小';
    }
    function hand()
    {
        $this->_people->_hand = '小';
    }
    function foot()
    {
        $this->_people->_foot = '小';
    }
    function show()
    {
        $this->_people->show();
    }
}


/**
 * 指挥者
 * Class director
 */
class director
{
   private  $_builder;

   function __construct($builder)
   {
       $this->_builder = $builder;
   }

    function show()
    {
        $this->_builder->heard();
        $this->_builder->body();
        $this->_builder->hand();
        $this->_builder->foot();
        $this->_builder->show();
    }
}

echo "---这是一个胖子---".PHP_EOL;
$pangzi = new pangzi();
$bulid  = new director($pangzi);
$bulid->show();

echo "---这是一个瘦子---".PHP_EOL;
$souzi = new souzi();
$bulid = new director($souzi);
$bulid->show();

