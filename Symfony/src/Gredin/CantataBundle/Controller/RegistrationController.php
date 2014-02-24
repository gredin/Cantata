<?php

namespace Gredin\CantataBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class RegistrationController
 */
class RegistrationController extends Controller
{
    public function signupAction()
    {
        $this->render(
            'GredinCantataBundle:Registration:index.html.twig',
            array()
        );
    }
}
