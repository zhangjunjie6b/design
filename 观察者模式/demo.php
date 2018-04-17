<?php
/**
 * Created by PhpStorm.
 * User: zhangjunjie
 * Date: 2018/4/17
 * Time: 下午2:01
 */

/**
 * 抽象一个观察者(员工)
 * Interface employee
 */
interface employee
{
    /**
     * @return mixed
     */
    public function update();
}

/**
 * 写代码的同事
 * Class code
 */
class code implements employee
{
    private $_name = '';

    public function __construct($name)
    {
        $this->_name = $name;
    }
    public function update()
    {
       echo $this->_name.'老板来了,请停止写代码'.PHP_EOL;
    }
}

/**
 * 聊天的同事
 * Class chat
 */
class chat implements employee
{
    public $_name;
    public function __construct($name)
    {
        $this->_name = $name;
    }
    public function update()
    {
        echo $this->_name.'老板来了,请停止聊天'.PHP_EOL;
    }
}

/**
 * 抽象主题角色
 * Interface subject
 */
interface subject
{
    /**
     * 添加一个观察者
     *
     * @return mixed
     */
    public function attach(employee $observers);

    /**
     * 删除一个观察者
     * @return mixed
     */
    public function detach(employee $observers);

    /**
     * 通知观察者
     * @return mixed
     */
    public function notify();
}

/**
 * 前台小姐姐
 * Class qiantai
 */
class qiantai implements subject
{

    private $_observers;//观察者

    public function __construct()
    {
        $this->_observers = array();
    }

    public function attach(employee $observers)
    {
        $this->_observers[] = $observers;
    }
    public function detach(employee $observers)
    {
        $index = array_search($observers,$this->_observers);

        if($index == false || array_key_exists($index,$this->_observers)){
            return false;
        }

        unset($this->_observers[$index]);
    }
    public function notify()
    {
        foreach ($this->_observers as $v){
            $v->update();
        }
    }
}

$qiantai = new qiantai();
$qiantai->attach(new code('张俊杰'));
$qiantai->attach(new chat('颂歌'));
$qiantai->notify();