<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class GuildTest extends TestCase{
    
    public function test_1()
    {
        $user = new User();
        $this->assertSame('No title choosen', $user->getTitle());
    }
    public function test_2()
    {
        $user = new User('Testing user class');
        $this->assertSame('Testing user class', $user->getTitle());
    }

}
