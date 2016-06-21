<?php

namespace AdDimension\Controller;

use Doctrine\ORM\EntityManager;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

class AdvertController
{
    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(Container $container)
    {
        $this->em = $container->get("em");
    }


    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return mixed
     */
    public function fetch($request, $response, $args) {
        $adSurfaces = $this->em->getRepository('AdDimension\Entity\Advert')->findAll();
        return  $response->withJSON($adSurfaces);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return mixed
     */
    public function fetchOne($request, $response, $args) {
        $advert = $this->em->getRepository('AdDimension\Entity\Advert')->findBy(array('id' => $args['id']));
        if ($advert) {
            return $response->withJSON($advert);
        }
        return $response->withStatus(404, 'No photo found with slug '.$args['id']);
    }
    
}