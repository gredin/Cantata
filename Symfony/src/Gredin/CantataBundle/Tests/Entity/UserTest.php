<?php

namespace Gredin\CantataBundle\Tests\Entity;
use Gredin\CantataBundle\Entity\User;

/**
 * Class UserTest
 */
class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $user = new User();

        $this->assertTrue($user instanceof User);
    }
}
