<?php

namespace AppBundle\Controller;

use ApiBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Role\Role;

class HomeController extends Controller
{
    /**
     * @Route("/", name="app_home")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $createUser = $request->query->get('createUser');
        if ($createUser) {
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
        }

        $admin = $this->getDoctrine()->getRepository('ApiBundle:User')->findAll()[0];
        $albums = $this->getDoctrine()->getRepository('ApiBundle:Album')->findAll();
        $songs = $this->getDoctrine()->getRepository('ApiBundle:Music')->findBy(['album' => null]);

        return $this->render(':home:index.html.twig', [
            'albums' => $albums,
            'admin' => $admin,
            'songs' => $songs
        ]);
    }
}
