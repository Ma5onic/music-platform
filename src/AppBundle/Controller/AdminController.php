<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 * @Method("GET")
 * @Security("has_role('ROLE_ADMIN')")
 *
 * Class AdminController
 * @package AppBundle\Controller
 */
class AdminController extends Controller
{
    /**
     * @Route("")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render(':admin:index.html.twig');
    }

    /**
     * @Route("/music")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function musicAction() {
        return $this->render(':admin:music.html.twig');
    }

    /**
     * @Route("/profile")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function profileAction() {
        return $this->render(':admin:profile.html.twig');
    }

    /**
     * @Route("/seo")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function seoAction() {
        return $this->render(':admin:seo.html.twig');
    }
}
