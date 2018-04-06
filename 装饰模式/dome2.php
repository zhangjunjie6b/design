<?php
/**
 * 装饰模式装饰一个输出
 * Created by PhpStorm.
 * User: zhangjunjie
 * Date: 2018/4/5
 * Time: 下午11:47
 */

/**
 * 抽象一个画画的过程
 * Class painting
 */
abstract class painting
{
    abstract public function addFront($painting);//头部插入修饰
    abstract public function hua();
}

/**
 * 创作一幅名画（被装饰者）
 * Class famousPaintings
 */
class famousPaintings extends painting
{
    private $front = array();
    private $end = PHP_EOL;
    private $_name = '';

    public function setName($name)
    {
        $this->_name = $name;
    }

    /**
     * 画的加工过程
     * @param $painting
     * @return mixed
     */
    public function addFront($painting)
    {
        $this->front[] = $painting;
    }


    public function hua()
    {
        $fronts = array_reverse($this->front);
        $str = "";

        foreach ($fronts as $front){
            $str .= $front->hua();
        }

        return $str;
    }

    public function show()
    {
        echo $this->hua(). $this->_name. $this->end;
    }
}

/**
 * Class color
    none         = "\033[0m"
    black        = "\033[0;30m"
    dark_gray    = "\033[1;30m"
    blue         = "\033[0;34m"
    light_blue   = "\033[1;34m"
    green        = "\033[0;32m"
    light_green -= "\033[1;32m"
    cyan         = "\033[0;36m"
    light_cyan   = "\033[1;36m"
    red          = "\033[0;31m"
    light_red    = "\033[1;31m"
    purple       = "\033[0;35m"
    light_purple = "\033[1;35m"
    brown        = "\033[0;33m"
    yellow       = "\033[1;33m"
    light_gray   = "\033[0;37m"
    white        = "\033[1;37m"
 */

class color extends famousPaintings
{
    private $color;

    public function __construct($color)
    {
        $this->color = $color;
    }

    public function hua()
    {

        return "\033[".$this->color;

    }
}

/**
 * 设置前景色 40-47
 * Class bcColor
 */
class bcColor extends famousPaintings{
    private $color;

    public function __construct($color)
    {
        $this->color = $color;
    }

    public function hua()
    {
        return " \033[".$this->color."m";


    }
}

/**
 * 设置下划线
 * Class underline
 */
class underline extends famousPaintings
{

    public function hua()
    {
        return "\033[4m";

    }
}


$a = new famousPaintings();
$a->setName('裸女');
$a->addFront(new underline());
$a->addFront(new color("1;33m"));
$a->addFront(new bcColor("40"));
echo $a->show();