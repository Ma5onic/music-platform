<?php
/**
 * Created by PhpStorm.
 * User: yoann
 * Date: 15/08/2016
 * Time: 20:20
 */

namespace ApiBundle\Controller;


use JMS\Serializer\Serializer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ApiController extends Controller
{
    /** @var Serializer */
    protected $serializer;

    public function setContainer(ContainerInterface $container = null)
    {
        parent::setContainer($container);
        $this->serializer = $this->get('jms_serializer');
    }
}
