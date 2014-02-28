<?php

namespace Gredin\CantataBundle\Controller;

use Gredin\CantataBundle\Entity\User;
use Gredin\CantataBundle\Form\Type\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormError;

/**
 * Class HomeController
 */
class HomeController extends Controller
{
    public function welcomeAction()
    {
        return $this->render('GredinCantataBundle:Home:welcome.html.twig');
    }
}
