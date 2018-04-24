<?php
/**
 * 抽象工厂模式
 * Created by PhpStorm.
 * User: zhangjunjie
 * Date: 2018/4/22
 * Time: 下午9:47
 */


/**
 * 连接数据库
 * Interface db
 */
interface db
{
    public function conn();
}

/**
 * 用户类
 * Interface user
 */
interface user
{
    public function insertUser();
}

/**
 * 工厂
 * Interface Factory
 */
interface Factory
{
    /**
     * 创建连接
     * @return mixed
     */
    function createDB();

    /**
     * 写入数据
     * @return mixed
     */
    function createUser();
}

/**
 * Class Dome
 */
class mysqlDome implements db
{
    function conn()
    {
        echo '成功连接mysql'.PHP_EOL;
    }
}

/**
 * Class mysqli
 */
class mysqliDome implements db
{
    function conn()
    {
        echo '成功连接mysqli'.PHP_EOL;
    }
}

class userMysql implements user
{
    public function insertUser()
    {
        echo "向mysql数据库写入一条数据".PHP_EOL;
    }
}

class userMysqli implements user
{
    public function insertUser()
    {
        echo "向mysqli数据库写入一条数据".PHP_EOL;
    }
}

class mysqlFactory implements factory
{
    public function createDB()
    {
       return new mysqlDome();
    }
    public function createUser()
    {
        return new userMysql();
    }
}

class mysqliFactory implements factory
{
    public function createDB()
    {
        return new mysqliDome();
    }
    public function createUser()
    {
        return new userMysqli();
    }
}

//mysql 写入数据
$mysql = new mysqlFactory();
$mysql->createDB()->conn();
$mysql->createUser()->insertUser();

//mysqli 写入数据
echo '----------'.PHP_EOL;
$mysql = new mysqlFactory();//只用更换这
$mysql->createDB()->conn();
$mysql->createUser()->insertUser();