<?php

declare(strict_types=1);

namespace Entities\Guild;

use DateTime;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use Entities\Guild\User;

class GuildTest extends TestCase
{
    // vendor/bin/phpunit --testsuite units (commande Debian)
    /**
     * Test class User isValid;
     */
    public function testUser1()
    {
        $user = new User(nickname: "FreeZyBabe");
        $this->assertSame("FreeZyBabe", $user->getNickname());
    }
    public function testUser2()
    {
        $user = new User(email: "iudviusd@gmail.com");
        $this->assertSame("iudviusd@gmail.com", $user->getEmail());
    }

    public function testUser3()
    {
        $user = new User(email: "jidjvifdjv@gmail.com");
        $user->setEmail("Testing setEmail");
        $this->assertSame("Testing setEmail", $user->getEmail());
    }
    /**
     * Test class Rank isValid;
     */
    public function testRank1()
    {
        $rank = new Rank(name: "");
        $this->assertSame("", $rank->getName());
    }

    public function testRank2()
    {
        $rank = new Rank(name: "");
        $rank->setName("Rank's name must be at least 3 characters long!");
        $this->assertSame("Rank's name must be at least 3 characters long!", $rank->getName());
    }
    /**
     * Test class Message isValid;
     */
    public function testMessage1()
    {
        $message = new Message(title: '');
        $this->assertSame('', $message->getTitle());
    }

    public function testMessage2()
    {
        $message = new Message(date: new DateTimeImmutable('2000-01-01'));
        $this->assertEquals(new DateTimeImmutable('2000-01-01'), $message->getDate());
    }        //Use "assertequals" for testing object//
    /**
     * Test class Instance_type isValid;
     */
    public function testInstance_Type1()
    {
        $instanceType = new Instance_type(description: "");
        $this->assertSame("", $instanceType->getDescription());
    }

    public function testInstance_Type2()
    {
        $instanceType = new Instance_type(description: "");
        $instanceType->setDescription("Description's name must be at least 3 characters long!");
        $this->assertSame("Description's name must be at least 3 characters long!", $instanceType->getDescription());
    }

    public function testEquipment1()
    {
        $equipment = new Equipment(id: 0);
        $this->assertSame(0,$equipment->getId());
    }

    public function testequipment2()
    {
        $equipment = new Equipment(name:"");
        $this->assertSame("", $equipment->getName());
    }
}
