<?php
/**
 * 装饰模式
 * 最简陋的装饰模式实现方便理解
 * Created by PhpStorm.
 * User: zhangjunjie
 * Date: 2018/4/5
 * Time: 下午9:04
 */

abstract class painting
{
    /**
     * 注入的类
     * @var string
     */
    private $component;

    public function __construct($component = '')
    {
        $this->component = $component;
    }

    /**
     * 画部展现方法
     */
    public function show()
    {
        echo "一张美丽的画卷";
    }

}

/**
 * 颜色类
 * Class color
 */
class color extends painting
{

    public function show()
    {
        echo "\033[0;31m";
        parent::show();
        echo "\033[0m\n\"";

    }
}

/**
 * 加一个作者
 * Class by
 */
class by extends painting
{
    private $by = '';

    /**
     * 里氏代换原则,不更改父类
     * by constructor.
     * @param string $component
     * @param $by
     */
    public function __construct($component = '',$by)
    {
        parent::__construct($component);
        $this->by = $by;
    }

    public function show()
    {
        parent::show();
        echo "\n作者：".$this->by;
    }
}



$painting = new color();//加一个红色

$painting = new by($painting,'张俊杰');//落款

$painting->show();//输出画布