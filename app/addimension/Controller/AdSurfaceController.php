<?php

namespace AdDimension\Controller;

use Doctrine\ORM\EntityManager;
use Slim\Container;

class AdSurfaceController
{
    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(Container $container)
    {
        $this->em = $container->get("em");
    }

    public function fetch($request, $response, $args) {

        $adSurfaces = $this->em->getRepository('AdDimension/Entity/AdSurfsace')->findAll();
        return  $response->withJSON(array($adSurfaces));
    }



}