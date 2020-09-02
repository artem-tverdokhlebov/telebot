<?php

namespace WeStacks\TeleBot\Tests\Feature;

use GuzzleHttp\Promise;
use WeStacks\TeleBot\Bot;
use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Exception\TeleBotMehtodException;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\Objects\User;

class SendMessageTest extends TestCase
{
    /**
     * @var Bot
     */
    private $bot;

    protected function setUp(): void
    {
        $this->bot = new Bot(getenv('TELEGRAM_BOT_TOKEN'));
    }

    public function testCallUndefinedMethod()
    {
        $this->expectException(TeleBotMehtodException::class);
        $this->bot->getYou();
    }

    public function testExecuteMethod()
    {
        $botUser = $this->bot->getMe();
        $this->assertInstanceOf(User::class, $botUser);
    }

    public function testSendMessageAsync()
    {
        $promises = [];

        $promises[] = $this->bot->async(true)->sendMessage([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'text' => 'Unit test message'
        ]);

        $promises[] = $this->bot->async(true)->exceptions(false)->sendMessage([
            'chat_id' => getenv('TELEGRAM_USER_ID'),
            'text' => ''
        ]);

        $responses = Promise\unwrap($promises);
        $this->assertInstanceOf(Message::class, $responses[0]);
        $this->assertFalse($responses[1]);
    }
}