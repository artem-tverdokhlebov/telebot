<?php

namespace WeStacks\TeleBot\Tests\Feature;

use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Bot;
use WeStacks\TeleBot\Objects\Stickers\StickerSet;

class StickersTest extends TestCase
{
    /**
     * @var Bot
     */
    private $bot;

    protected function setUp(): void
    {
        global $bot;
        $this->bot = $bot;
    }

    public function testGetStickerSet()
    {
        $set = $this->bot->getStickerSet([
            'name' => 'pappy_fox'
        ]);

        $this->assertInstanceOf(StickerSet::class, $set);
    }
}