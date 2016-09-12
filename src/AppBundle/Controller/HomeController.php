<?php

namespace AppBundle\Controller;

use ApiBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Role\Role;

class HomeController extends Controller
{
    /**
     * @Route("/", name="app_home")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $user->setUsername('alexbc')
            ->setFirstName('Alexandre')
            ->setLastName('Bouin')
            ->setEmail('alexandre.bouin@outlook.com')
            ->setBiography('Wow, amazing. Such wonderful')
            ->setPassword(password_hash('admin', PASSWORD_BCRYPT))
            ->addRole(new Role('ROLE_ADMIN'));

        $em->persist($user);
        $em->flush();

        return $this->render('base.html.twig');
    }
}
