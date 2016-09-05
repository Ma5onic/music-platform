<?php

namespace ApiBundle\Controller;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class MusicController
 * @package ApiBundle\Controller
 * @Route("/musics")
 */
class MusicController extends ApiController
{
    /**
     * This resource is useful to get all the musics in the database.
     *
     * @Route("")
     * @Method("GET")
     * @ApiDoc(
     *     description="Return all the musics in the database",
     *     statusCodes={
     *         200={
     *             "Returned when successful",
     *             "Returned when the array is empty"
     *         }
     *     },
     *     output="ApiBundle\DTO\Music"
     * )
     *
     * @return Response
     */
    public function getMusicsAction()
    {
        $dtos = $this->get('api.service.music')->getAllMusics();
        $json = $this->serializer->serialize($dtos, 'json');

        return new Response(
            $json,
            Response::HTTP_OK,
            ['Content-Type' => ApiController::CONTENT_TYPE]
        );
    }

    /**
     * This resource is useful to get a music in the database.
     *
     * @Route("/{id}")
     * @Method("GET")
     * @ApiDoc(
     *     description="Return the musics that match the identifier given in the route",
     *     statusCodes={
     *         200={
     *             "Returned when successful",
     *             "Returned when the array is empty"
     *         },
     *         404="Returned when not found"
     *     },
     *     output="ApiBundle\DTO\Music"
     * )
     * @param $id integer The numeric identifier of the music.
     * @return Response The response with the data from the database.
     */
    public function getMusicAction($id)
    {
        $dtos = $this->get('api.service.music')->getMusic($id);
        $json = $this->serializer->serialize($dtos, 'json');

        return new Response(
            $json,
            Response::HTTP_OK,
            ['Content-Type' => ApiController::CONTENT_TYPE]
        );
    }
}
