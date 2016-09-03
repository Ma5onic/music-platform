<?php

namespace AppBundle\Controller;

use Alchemy\Zippy\Zippy;
use ApiBundle\Entity\Album;
use ApiBundle\Entity\Genre;
use AppBundle\Utils\FlashType;
use Cocur\Slugify\Slugify;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
     * @Method({"GET", "POST"})
     * @param Request $request The request that contains the data to insert
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function musicAlbumAddAction(Request $request) {
        $album = new Album();
        $album->setYear(new \DateTime());

        $form = $this->createFormBuilder($album)
            ->add('name', TextType::class)
            ->add('file', FileType::class, ['label' => 'Archive'])
            ->add('cover', FileType::class, ['label' => 'Image de couverture'])
            ->add('genre', EntityType::class, array(
                'class' => 'ApiBundle\Entity\Genre',
                'choice_label' => 'name'
            ))
            ->add('year', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'Téléverser'))
            ->getForm();

        if ($request->getMethod() == Request::METHOD_POST) {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                /** @var UploadedFile $file */
                $file = $album->getFile();
                /** @var UploadedFile $cover */
                $cover = $album->getCover();

                $zippy = Zippy::load();
                $slugify = new Slugify();

                $album->setFile($slugify->slugify($album->getName()) . '.' . $file->guessExtension());
                $album->setCover($slugify->slugify($album->getName()) . '.' . $cover->guessExtension());

                $file->move(
                    $this->getParameter('zips_directory'),
                    $album->getFile()
                );
                $cover->move(
                    $this->getParameter('covers_directory'),
                    $album->getCover()
                );

                $dest = $this->getParameter('albums_directory') . DIRECTORY_SEPARATOR . $slugify->slugify($album->getName());

                $fs = new Filesystem();
                try {
                    $fs->mkdir($dest);
                } catch (IOExceptionInterface $e) {
                    echo "An error occurred while creating your directory at " . $e->getPath();
                }

                $archive = $zippy->open($this->getParameter('zips_directory') . DIRECTORY_SEPARATOR . $album->getFile());
                $archive->extract($dest);

                $em = $this->getDoctrine()->getManager();
                $em->persist($album);
                $em->flush();

                $this->addFlash(FlashType::SUCCESS, "{$album->getName()} ajouté avec succès !");
                return $this->redirectToRoute('app_admin_musicalbumadd');
            }
        }

        return $this->render(':admin/music:album_add.html.twig', array(
            'form' => $form->createView(),
            'albums' => $this->getDoctrine()->getManager()->getRepository('ApiBundle:Album')->findAll()
        ));
    }

    /**
     * @Route("/music/album/remove/{id}", requirements={"id": "\d+"})
     * @param Album $album The album that match the identifier in the route.
     * @return RedirectResponse
     */
    public function musicAlbumRemoveAction(Album $album) {
        $slugify = new Slugify();
        try {
            $fs = new Filesystem();
            $fs->remove($this->getParameter('albums_directory') . DIRECTORY_SEPARATOR . $slugify->slugify($album->getName()));
            $fs->remove($this->getParameter('zips_directory') . DIRECTORY_SEPARATOR . $album->getFile());
            $fs->remove($this->getParameter('covers_directory') . DIRECTORY_SEPARATOR . $album->getCover());
        } catch (IOException $IOException) {
            $this->get('logger')->alert($IOException->getMessage());
            $this->addFlash(
                FlashType::DANGER,
                'There is a problem between the files and the database. Please contact your administrator'
            );

            $this->redirectToRoute('app_admin_musicalbumadd');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($album);
        $em->flush();

        $this->addFlash(FlashType::SUCCESS, "Album {$album->getName()} supprimé avec succès");

        return $this->redirectToRoute('app_admin_musicalbumadd');
    }

    /**
     * @Route("/music/genre")
     * @Method({"GET", "POST"})
     * @param Request $request The request that contains the data to insert.
     * @return RedirectResponse|Response A redirection if it is a POST request, a classic response instead.
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
                $em = $this->getDoctrine()->getManager();
                $em->persist($genre);
                $em->flush();

                $this->addFlash(FlashType::SUCCESS, "{$genre->getName()} ajouté avec succès !");
                return $this->redirectToRoute('app_admin_musicgenre');
            }
        }

        return $this->render(':admin/music:genre.html.twig', array(
            'form' => $form->createView(),
            'genres' => $this->getDoctrine()->getRepository('ApiBundle:Genre')->findAll()
        ));
    }

    /**
     * @Route("/music/genre/remove/{id}", requirements={"id": "\d+"})
     * @param Genre $genre The genre that match the identifier in the route.
     * @return RedirectResponse The response that is a redirection to the administration panel.
     * @see http://symfony.com/doc/current/best_practices/controllers.html#using-the-paramconverter
     */
    public function musicGenreRemoveAction(Genre $genre) {
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($genre);
        $em->flush();

        $this->addFlash(FlashType::SUCCESS, "Genre {$genre->getName()} supprimé avec succès");

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
