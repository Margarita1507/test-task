<?php

namespace Tests\Feature;

use App\Models\Win;
use App\Services\Win\WinHistoryService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WinTest extends TestCase
{

    public function testAddValueToHistory()
    {
        $win = Win::create();
        $value = 0;
        while ($value < 6) {
            $win = WinHistoryService::addValueToHistory($value, $win);
            $value++;
        }
        $this->assertEquals('3,4,5', $win->win_history);
    }

    public function testAddValueToHistoryFalse()
    {
        $win = Win::create();
        $value = 0;
        while ($value < 6) {
            $win = WinHistoryService::addValueToHistory($value, $win);
            $value++;
        }
        $this->assertNotEquals('0,4,5', $win->win_history);
    }
}
