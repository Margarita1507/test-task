<?php

namespace Tests\Unit;

use App\Services\Win\WinCreateService;
use App\Services\Win\WinHistoryService;
use App\Services\Win\WinLuckyService;
use PHPUnit\Framework\TestCase;

class WinTest extends TestCase
{
    /**
     * @dataProvider additionGetWinOrLoseProvider
     */
    public function testGetWinOrLose($expectedWin, $value)
    {
        $win = WinLuckyService::getWinOrLose($value);
        $this->assertEquals($expectedWin, $win);
    }

    public static function additionGetWinOrLoseProvider()
    {
        return [
            ['450', '900'],
            ['0', '737'],
            ['30', '300'],
            ['0', '1'],
            ['180','600'],
            ['700', '1000']
        ];
    }
}
