<?php

namespace AdDimension\Controller;

use Doctrine\ORM\EntityManager;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

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


    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return mixed
     */
    public function fetch($request, $response, $args) {
        $adSurfaces = $this->em->getRepository('AdDimension\Entity\AdSurface')->findAll();
        return  $response->withJSON(array($adSurfaces));
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return mixed
     */
    public function fetchOne($request, $response, $args) {
        $photo = $this->em->getRepository('AdDimension\Entity\AdSurface')->findBy(array('id' => $args['id']));
        if ($photo) {
            return $response->withJSON($photo->getArrayCopy());
        }
        return $response->withStatus(404, 'No photo found with slug '.$args['id']);
    }

}