<?php

namespace Gredin\CantataBundle\Controller;

use Gredin\CantataBundle\Entity\User;
use Gredin\CantataBundle\Form\Type\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormError;

/**
 * Class RegistrationController
 */
class RegistrationController extends Controller
{
    public function signupAction(Request $request)
    {
        $user = new User();
        /*
        $user
            ->setEmail('your@email.com')
            ->setPassword('12345');
        */

        $form = $this->createForm(new UserType(), $user);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $users = $em
                ->getRepository('GredinCantataBundle:User')
                ->findBy(
                    array(
                        'email' => $user->getEmail(),
                    )
                );

            if (0 === count($users)) {
                $user = $this
                    ->get('gredin_cantata.registration')
                    ->createAccount($user);

                return $this->render(
                    'GredinCantataBundle:Registration:success.html.twig',
                    array()
                );
            } else {
                $form->addError(
                    new FormError('This email is already registered.')
                );
            }
        }

        return $this->render(
            'GredinCantataBundle:Registration:signup.html.twig',
            array(
                'form' => $form->createView(),
            )
        );
    }
}
