<?php

namespace Gredin\CantataBundle\Controller;

use Gredin\CantataBundle\Entity\User;
use Gredin\CantataBundle\Form\Type\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class RegistrationController
 */
class RegistrationController extends Controller
{
    public function signupAction(Request $request)
    {
        $user = new User();
        $user->setEmail('your@email.com')
            ->setPassword('12345');

        $form = $this->createForm(new UserType(), $user);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->render(
                'GredinCantataBundle:Registration:success.html.twig',
                array()
            );
        }

        return $this->render(
            'GredinCantataBundle:Registration:signup.html.twig',
            array(
                'form' => $form->createView(),
            )
        );
    }
}
