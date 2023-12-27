<?php

namespace Tests\Feature;

use App\Models\Link;
use App\Services\Link\LinkCreateService;
use App\Services\Link\LinkUpdateService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LinkTest extends TestCase
{
    public function testUpdate()
    {
        $link = LinkCreateService::create();
        $firstLink = $link->unique_link;
        $link = LinkUpdateService::update($link);
        $secondLink = $link->unique_link;
        $this->assertNotEquals($firstLink, $secondLink);
    }

    public function testDelete()
    {
        $link = Link::all()
            ->where('updated_at', '<', now()->subWeek());
        $this->assertEmpty($link);
    }
}
