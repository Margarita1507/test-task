<?php

namespace Tests\Feature;

use App\Models\Link;
use App\Services\Link\LinkService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LinkTest extends TestCase
{
    public function testUpdate()
    {
        $link = LinkService::create();
        $firstLink = $link->unique_link;
        $link = LinkService::update($link);
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
