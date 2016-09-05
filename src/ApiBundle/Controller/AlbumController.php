<?php

namespace ApiBundle\Controller;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AlbumController
 * @package ApiBundle\Controller
 *
 * @Route("/albums")
 */
class AlbumController extends ApiController
{
    /**
     * This resource is useful to get all the albums in the database.
     *
     * @Route("")
     * @Method("GET")
     * @ApiDoc(
     *     description="Return all the albums in the database",
     *     statusCodes={
     *         200={
     *             "Returned when successful",
     *             "Returned when the array is empty"
     *         }
     *     },
     *     output="ApiBundle\DTO\Album"
     * )
     *
     * @return Response
     */
    public function getAlbumsAction()
    {
        $dtos = $this->get('api.service.album')->getAllAlbums();
        $json = $this->serializer->serialize($dtos, 'json');

        return new Response(
            $json,
            Response::HTTP_OK,
            ['Content-Type' => ApiController::CONTENT_TYPE]
        );
    }

    /**
     * This resource is useful to get an album.
     *
     * @Route("/{id}")
     * @Method("GET")
     * @ApiDoc(
     *     description="Return the album matching the parameter",
     *     statusCodes={
     *         200={
     *             "Returned when successful",
     *             "Returned when the array is empty"
     *         },
     *         404="Returned when not found"
     *     },
     *     output="ApiBundle\DTO\Album"
     * )
     *
     * @param $id integer The numeric identifier of the album to get
     * @return Response The HTTP response
     */
    public function getAlbumAction($id)
    {
        $dtos = $this->get('api.service.album')->getAlbum($id);
        $json = $this->serializer->serialize($dtos, 'json');

        return new Response(
            $json,
            Response::HTTP_OK,
            ['Content-Type' => ApiController::CONTENT_TYPE]
        );
    }
}
