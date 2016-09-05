<?php

namespace ApiBundle\Controller;

use JMS\Serializer\Serializer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class ApiController
 * @package ApiBundle\Controller
 */
class ApiController extends Controller
{
    const CONTENT_TYPE = 'application/vnd.api+json';

    /** @var Serializer */
    protected $serializer;

    public function setContainer(ContainerInterface $container = null)
    {
        parent::setContainer($container);
        $this->serializer = $this->get('jms_serializer');
    }
}
