<?php

namespace Gredin\CantataBundle\Tests\Controller;
use Gredin\CantataBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class RegistrationControllerTest
 */
class RegistrationControllerTest extends WebTestCase
{
    /**
     * Entity manager
     *
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    public function setUp()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();
        $this->em = static::$kernel->getContainer()->get('doctrine.orm.entity_manager');
    }

    private function generateRandomEmail()
    {
        return uniqid() . '@email.com';
    }

    public function provideUserDetails()
    {
        return array(
            array($this->generateRandomEmail(), 'password12345'),
            array($this->generateRandomEmail(), 'password12345'),
        );
    }

    /**
     * @return void
     *
     * @dataProvider provideUserDetails
     */
    public function testSignup($email, $password)
    {
        /*
        $client = $this->createClient();

        // sign up page

        $crawler = $client->request('GET', '/signup');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("form")')->count()
        );

        // sign up form


*/
        // user creation

        $user = $this->em
            ->getRepository('GredinCantataBundle:User')
            ->findBy(
                array(
                    'email' => 'your@email.com',
                )
            );

        $this->assertTrue($user instanceof User);

        $this->assertTrue(strlen($email) > 2);
    }
}
