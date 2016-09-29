<?php

namespace ApiBundle\Controller;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserController
 * @package ApiBundle\Controller
 *
 * @Route("/users")
 */
class UserController extends ApiController
{
    /**
     * This resource is used to get all the users in the database.
     * @Route("")
     * @Method("GET")
     * @ApiDoc(
     *     description="Return all the users in the database",
     *     statusCodes={
     *         200={
     *             "Returned when successful",
     *             "Returned when the array is empty"
     *         }
     *     },
     *     output="ApiBundle\DTO\User"
     * )
     *
     * @return Response
     */
    public function getUsersAction()
    {
        $dtos = $this->get('api.service.user')->getAllUsers();
        $json = $this->serializer->serialize($dtos, 'json');

        return new Response(
            $json,
            Response::HTTP_OK,
            ['Content-Type' => ApiController::CONTENT_TYPE]
        );
    }

    /**
     * This resource is used to get all the users in the database.
     * @Route("/{id}", requirements={"id" : "\d+"})
     * @Method("GET")
     * @ApiDoc(
     *     description="Return the user that match the numeric identifier",
     *     statusCodes={
     *         200={
     *             "Returned when successful",
     *             "Returned when the array is empty"
     *         },
     *         404="Returned when not found"
     *     },
     *     output="ApiBundle\DTO\User"
     * )
     *
     * @param $id integer The numeric identifier of the user.
     * @return Response The response that contains all the data matching the numeric identifier.
     */
    public function getUserAction($id)
    {
        $dtos = $this->get('api.service.user')->getUser($id);
        $json = $this->serializer->serialize($dtos, 'json');

        return new Response(
            $json,
            Response::HTTP_OK,
            ['Content-Type' => ApiController::CONTENT_TYPE]
        );
    }
}
