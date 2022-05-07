<?php
namespace Taoran\DataInterface\Test;

ini_set('display_errors', 'on');

class BaiduIndexTest
{
    public function index()
    {
        //搜索词
        $word = [
            [
                [
                    'name' => 'php',
                    'wordType' => 1
                ],
                [
                    'name' => 'java',
                    'wordType' => 1
                ],
                [
                    'name' => 'golang',
                    'wordType' => 1
                ]

            ]
        ];

        //日期
        $startDate = '2011-01-01';
        $endDate = '2022-04-30';
        //地区：0 表示全国
        $area = 0;
        //cookie：这里添加上自己的cookie即可访问查看效果； cookie有时效，当无法访问出现请求阻塞时更换cookie可解决
        $cookie = '';

        //多年查询会出现数据异常，这里拆分年份后在查询
        $yearScope = \Taoran\DataInterface\Util::getDateByInterval($startDate, $endDate, 'year');

        $baiduIndex = new \Taoran\DataInterface\BaiduIndex();
        foreach ($yearScope as $key => $val) {

            $result = $baiduIndex->setCookie($cookie)->search($word, $val['startDate'], $val['endDate'], $area);

            // TODO: 这里可以添加自己的代码，比如写入到数据库，导出成csv
             var_dump($result);exit;

            sleep(3);
        }

        return true;
    }
}

require '../vendor/autoload.php';
$baiduIndexTest = new BaiduIndexTest();
$baiduIndexTest->index();

