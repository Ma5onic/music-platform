<?php

namespace AppBundle\Controller;

use ApiBundle\Entity\Album;
use ApiBundle\Entity\Genre;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/music/album/add")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function musicAlbumAddAction() {
//        $album = new Album();
//        $album->set
//
//        $form = $this->createFormBuilder($album)
//            ->add('album', TextType::class)
//            ->add('dueDate', DateType::class)
//            ->add('save', SubmitType::class, array('label' => 'Create Task'))
//            ->getForm();
//
//        return $this->render('default/new.html.twig', array(
//            'form' => $form->createView(),
//        ));
    }

    /**
     * @Route("/music/genre")
     * @Method({"GET", "POST"})
     * @param Request $request The request that contains the data to insert
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function musicGenreAction(Request $request) {
        $genre = new Genre();
        $form = $this->createFormBuilder($genre)
            ->add('name', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Créer le genre'))
            ->getForm();

        if ($request->getMethod() == Request::METHOD_POST) {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $genre = $form->getData();

                $em = $this->getDoctrine()->getManager();
                $em->persist($genre);
                $em->flush();

                $this->addFlash("success", "");
                return $this->redirectToRoute('app_admin_musicgenre');
            }
        }

        return $this->render(':admin/music:genre.html.twig', array(
            'form' => $form->createView(),
            'genres' => $this->getDoctrine()->getRepository('ApiBundle:Genre')->findAll()
        ));
    }

    /**
     * @Route("/music/genre/remove/{id}")
     * @param Genre $genre The genre that match the identifier in the route.
     * @return \Symfony\Component\HttpFoundation\RedirectResponse The response that is a redirection to the
     * administration panel.
     * @see http://symfony.com/doc/current/best_practices/controllers.html#using-the-paramconverter
     */
    public function musicGenreRemoveAction(Genre $genre) {
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($genre);
        $em->flush();

        return $this->redirectToRoute('app_admin_musicgenre');
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
