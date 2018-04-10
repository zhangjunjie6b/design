<?php
/**
 * Created by PhpStorm.
 * User: zhangjunjie
 * Date: 2018/4/10
 * Time: 下午9:03
 */

class prototype
{
    private $_str = array();
    private $width = '';
    private $height = '';
    /**
     * 初始化一个10x10的正方形
     */
    public function init($width,$height)
    {
        $this->width = $width;
        $this->height = $height;

        for ($i = 0; $i <=$width ; $i++){
            for ($j = 0; $j <=$height ; $j++){
                $this->_str[$i][$j] =  '*  ';
            }
        }
        echo "重复循环了很多次".PHP_EOL;
    }

    public function getClone()
    {
        return serialize($this); //序列化深拷贝
        return clone $this;//魔术方法深拷贝 ，自己选都可以的
    }
    /**
     * 追加一个图形
     * @param $str
     * @param $x
     * @param $y
     */
    public function addHollow($x1,$x2,$y1,$y2)
    {
        foreach ($this->_str as $k=>$v){
            foreach ($v as $kk=>$vv){

                if($k >=$y1 and $k<=$y2) {
                    if($kk >=$x1 and $kk<=$x2) {
                        $this->_str[$k][$kk] = '1  ';
                    }
                }

            }

        }
    }

    /**
     * 展示
     */
    public function show()
    {
        foreach ($this->_str as $v){
            foreach ($v as $vv){
                echo $vv;
            }
            echo PHP_EOL;
        }
    }

}

$prototype = new  prototype();
$prototype->init(8,8);

echo '---方法A---'.PHP_EOL;
$prototype->addHollow(1,7,1,7);
$prototype->show();

echo '---克隆A的方法B---'.PHP_EOL;

$prototype2 = unserialize($prototype->getClone());

$prototype2->addHollow(0,7,0,7);
$prototype2->show();

echo '---克隆后的方法A---'.PHP_EOL;

$prototype->show();
