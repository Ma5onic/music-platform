<?php

namespace ApiBundle\Controller;

use JMS\Serializer\Serializer;
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
    public function indexAction()
    {
        $dtos = $this->get('api.service.user')->getAllUsers();
        $json = $this->serializer->serialize($dtos, 'json');
        return new Response($json, Response::HTTP_OK, ['Content-Type', 'application/json']);
    }
}
