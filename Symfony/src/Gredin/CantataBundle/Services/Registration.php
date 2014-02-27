<?php

namespace Gredin\CantataBundle\Services;

use Doctrine\Bundle\DoctrineBundle\Registry;

/**
 * Class Registration
 */
class Registration
{
    private $doctrine;
    private $logger;
    private $mailer;

    public function __construct(Registry $doctrine, Logger $logger, $mailer) // TODO: type hinting for $mailer
    {
        $this->doctrine = $doctrine;
        $this->logger = $logger;
        $this->mailer = $mailer;
    }

    public function createAccount($user)
    {
        $em = $this->doctrine->getManager();
        $em->persist($user);
        $em->flush();

        $this->logger->log('Registration: ' . $user->getEmail());

        // TODO: send activation mail

        return $user;
    }

    public function activateAccount($user)
    {

    }

    public function resetPassword()
    {

    }

    public function deleteAccount($user)
    {

    }
}
