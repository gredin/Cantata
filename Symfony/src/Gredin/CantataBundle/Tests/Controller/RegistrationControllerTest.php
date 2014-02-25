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
        return uniqid() . '@functional-test.com';
    }

    private function generateRandomPassword()
    {
        return md5(uniqid());
    }

    public function provideUserDetails()
    {
        $userData = array();

        for ($i=0; $i<2; $i++) {
            $userData[] = array($this->generateRandomEmail(), $this->generateRandomPassword());
        }

        return $userData;
    }

    /**
     * Test sign up form
     *
     * @return void
     *
     * @dataProvider provideUserDetails
     */
    public function testSignup($email, $password)
    {
        $client = $this->createClient();

        // request the sign up page

        $crawler = $client->request('GET', '/signup');

        $this->assertTrue(
            $client->getResponse()->isSuccessful()
        );

        $this->assertEquals(
            1,
            $crawler->filter('form')->count()
        );

        // fill in the sign up form

        $form = $crawler->selectButton('Signup')->form();

        $form->setValues(
            array(
                'user[email]' => $email,
                'user[password]' => $password,
            )
        );

        $crawler = $client->submit($form);

        $this->assertEquals(
            1,
            $crawler->filter('html:contains("BRAVO")')->count()
        );

        // make sure the user was created

        $user = $this->em
            ->getRepository('GredinCantataBundle:User')
            ->findOneBy(
                array(
                    'email' => $email,
                )
            );

        $this->assertTrue($user instanceof User);
    }
}
