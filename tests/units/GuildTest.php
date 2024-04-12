<?php

declare(strict_types=1);

namespace Entities\Guild;

use PHPUnit\Framework\TestCase;
use Entities\Guild\User;

class GuildTest extends TestCase
{

    public function test_1()
    {
        $user = new User(nickname: 'FreeZyBabe');
        $this->assertSame("", $user->getNickname());
    }
    public function test_2()
    {
        $user = new User(email: 'iudviusd@gmail.com');
        $this->assertSame('Testing user class', $user->getEmail());
    }

    public function test_3()
    {
        $user = new User(email: 'jidjvifdjv@gmail.com');
        $user->setEmail('Testing setEmail');
        $this->assertSame('Testing setEmail', $user->getEmail());
    }
}
