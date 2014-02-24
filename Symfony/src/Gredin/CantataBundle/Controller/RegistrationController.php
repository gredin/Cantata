<?php

namespace Gredin\CantataBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class RegistrationController
 *
 * @author    Mathieu Louafi <mathieu.louafi@gmail.com>
 * @copyright 2013 Gutenberg Technology (http://gutenberg-technology.com)
 */
class RegistrationController extends Controller
{
    public function signupAction()
    {
        return $this->render(
            'GredinCantataBundle:Registration:signup.html.twig',
            array()
        );
    }
}
